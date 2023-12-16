$("#vendas").DataTable({
  oLanguage: DATATABLE_PTBR,
  ajax: {
    url: "certificados_get_all",
    beforeSend: function () {
      $("#card-vendas").LoadingOverlay("show", {
        background: "rgba(165, 190, 100, 0.5)",
      });
    },
    complete: function () {
      $("#card-vendas").LoadingOverlay("hide");
    },
  },
  columns: [
    {
      data: "emissao",
    },
    {
      data: "nome",
    },
    {
      data: "tipo",
    },
  ],
  deferRender: true,
  processing: false,
  language: {
    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
  },
  responsive: true,
  autoWidth: false,
  pagingType: $(window).width() < 768 ? "simple" : "simple_numbers",
  pageLength: 8,
  lengthChange: false,
  columnDefs: [
    {
      width: "65px",
      type: "date", // Defina o tipo de dados como "date" para a coluna de datas
      targets: [0], // Especifique a coluna de datas
      render: function (data, type, row) {
        // Renderizar a data no formato "YYYY-MM-DD" para ordenação
        if (type === "sort" || type === "type") {
          return data.replace(/(\d{2})\/(\d{2})\/(\d{4})/, "$3-$2-$1");
        }
        return data;
      },
    },
    {
      width: "100px",
      className: "text-center",
      targets: [0],
    },
    {
      width: "120px",
      className: "text-left",
      targets: [2],
    },
  ],
  order: [[0, "desc"]],
});

function carregarGraficos() {
  chartClientes();
  chartEscritorios();
  chartCertificados();
}

function chartClientes() {
  google.charts.load("current", {
    packages: ["corechart"],
  });
  google.charts.setOnLoadCallback(function () {
    let jsonData = $.ajax({
      url: "/home/clientes",
      dataType: "json",
      async: false,
    }).responseJSON;

    let data = google.visualization.arrayToDataTable([
      ["Status", "Quantidade"],
      ["Ativos", parseInt(jsonData.ativos)],
      ["Inativos", parseInt(jsonData.inativos)],
    ]);

    let options = {
      title: "Situação dos clientes",
      is3D: true,
      legend: {
        position: "right",
        // alignment: 'end'
      },
      pieSliceText: "value",
      pieSliceTextStyle: {
        color: "black", // Definindo a cor da fonte das fatias como branca
      },
      colors: [
        "#CCE0FF",
        "#99C2FF",
        "#66A3FF",
        "#3385FF",
        "#0066FF",
        "#0055E6",
        "#0044CC",
        "#003399",
        "#002266",
        "#001133",
      ],
      chartArea: {
        width: "80%",
        height: "80%",
      },
    };

    let chart = new google.visualization.PieChart(
      document.getElementById("chart_clientes")
    );
    chart.draw(data, options);
  });
}

function chartEscritorios() {
  google.charts.load("current", {
    packages: ["corechart"],
  });
  google.charts.setOnLoadCallback(function () {
    let jsonData = $.ajax({
      url: "/home/escritorios",
      dataType: "json",
      async: false,
    }).responseJSON;

    let data = google.visualization.arrayToDataTable([
      ["Status", "Quantidade"],
      ["Ativos", parseInt(jsonData.ativos)],
      ["Inativos", parseInt(jsonData.inativos)],
    ]);

    let options = {
      title: "Situação dos escritórios",
      is3D: true,
      legend: {
        position: "right",
        // alignment: 'end'
      },
      pieSliceText: "value",
      pieSliceTextStyle: {
        color: "black", // Definindo a cor da fonte das fatias como branca
      },
      colors: [
        "#CCE0CC",
        "#99C299",
        "#66A366",
        "#338533",
        "#006600",
        "#005500",
        "#004400",
        "#003300",
        "#002200",
        "#001100",
      ],
      chartArea: {
        width: "80%",
        height: "80%",
      },
    };

    let chart = new google.visualization.PieChart(
      document.getElementById("chart_escritorios")
    );
    chart.draw(data, options);
  });
}

function chartCertificados() {
  google.charts.load("current", {
    packages: ["corechart"],
  });
  google.charts.setOnLoadCallback(function () {
    let jsonData = $.ajax({
      url: "/home/certificados",
      dataType: "json",
      async: false,
    }).responseJSON;

    let data = google.visualization.arrayToDataTable([
      ["Status", "Quantidade"],
      ["Vencidos", parseInt(jsonData.vencidos)],
      ["Vigentes", parseInt(jsonData.vigentes)],
      ["Prox. renovação", parseInt(jsonData.renovar)],
    ]);

    let options = {
      title: "Situação dos certificados",
      is3D: true,
      legend: {
        position: "right",
        // alignment: 'end'
      },
      pieSliceText: "value",
      pieSliceTextStyle: {
        color: "black", // Definindo a cor da fonte das fatias como branca
      },
      colors: [
        "#FFD9B3",
        "#FFA64D",
        "#FF8226",
        "#FF5C00",
        "#E64D00",
        "#CC4400",
        "#993300",
        "#662200",
        "#331100",
        "#000B00",
      ],
      chartArea: {
        width: "80%",
        height: "80%",
      },
    };

    let chart = new google.visualization.PieChart(
      document.getElementById("chart_certificados")
    );
    chart.draw(data, options);
  });
}

function filtrarPor(periodo) {
  $("#resumo-vendas").text("| " + periodo);
  $.ajax({
    url: "resumo-vendas",
    type: "GET",
    data: { periodo: periodo },
    beforeSend: function () {
      $("#total-vendas").LoadingOverlay("show", {
        background: "rgba(165, 190, 100, 0.5)",
      });
    },
    success: function (data) {
      $("#total-vendas").text(data.valor);

      if (data.resultado) {
        console.log(data.resultado);
      }
    },
    complete: function () {
      $("#total-vendas").LoadingOverlay("hide");
    },
    error: function (error) {
      console.error("Erro na chamada AJAX:", error);
    },
  });
}

function filtrarEscritorios(periodo) {
  if (periodo == "1") {
    $("#resumo-esc").text("| Ativos");
  } else {
    $("#resumo-esc").text("| Inativos");
  }
  $.ajax({
    url: "resumo-escritorios",
    type: "GET",
    data: { periodo: periodo },
    beforeSend: function () {
      $("#total-esc").LoadingOverlay("show", {
        background: "rgba(165, 190, 100, 0.5)",
      });
    },
    success: function (data) {
      $("#total-esc").text(data.valor);

      if (data.resultado) {
        console.log(data.resultado);
      }
    },
    complete: function () {
      $("#total-esc").LoadingOverlay("hide");
    },
    error: function (error) {
      console.error("Erro na chamada AJAX:", error);
    },
  });
}

function filtrarClientes(periodo) {
  if (periodo == "1") {
    $("#resumo-cli").text("| Ativos");
  } else {
    $("#resumo-cli").text("| Inativos");
  }
  $.ajax({
    url: "resumo-clientes",
    type: "GET",
    data: { periodo: periodo },
    beforeSend: function () {
      $("#total-cli").LoadingOverlay("show", {
        background: "rgba(165, 190, 100, 0.5)",
      });
    },
    success: function (data) {
      $("#total-cli").text(data.valor);

      if (data.resultado) {
        console.log(data.resultado);
      }
    },
    complete: function () {
      $("#total-cli").LoadingOverlay("hide");
    },
    error: function (error) {
      console.error("Erro na chamada AJAX:", error);
    },
  });
}

function carregarAnoVendas() {
  $.ajax({
    url: "lista-anos-vendas",
    type: "GET",
    dataType: "json",
    beforeSend: function () {
      $("#anos").LoadingOverlay("show", {
        background: "rgba(165, 190, 100, 0.5)",
      });
    },
    success: function (data) {
      var selectAnos = $("#select-anos");

      $.each(data, function (index, value) {
        selectAnos.append(
          '<option value="' + value.ano + '">' + value.ano + "</option>"
        );
      });
    },
    complete: function () {
      $("#anos").LoadingOverlay("hide");
    },
    error: function () {
      console.error("Erro ao obter anos.");
    },
  });
}

$("#select-anos").on("change", function () {
  var valorSelecionado = $(this).val();
  if (valorSelecionado != "Selecione") {
    obterVendasAgrupadasPorMes(valorSelecionado);
  }
});

function obterVendasAgrupadasPorMes(ano) {
  $.ajax({
    url: "vendas-por-ano",
    type: "GET",
    data: { ano: ano },
    dataType: "json",
    success: function (data) {
      console.log(data);

      var meses = Object.keys(data);
      var totais = Object.values(data);
      preencherGrafico(meses, totais);
    },
    error: function () {
      console.error("Erro ao obter total de vendas por mês.");
    },
  });
}

function preencherGrafico(meses, totais) {
  if (window.grafico) {
    window.grafico.destroy();
  }

  window.grafico = new ApexCharts(document.querySelector("#reportsChart"), {
    series: [
      {
        name: "Vendas",
        data: totais,
      },
    ],
    chart: {
      height: 350,
      type: "area",
      toolbar: {
        show: false,
      },
    },
    markers: {
      size: 4,
    },
    colors: ["#2eca6a", "#4154f1", "#ff771d"],
    fill: {
      type: "gradient",
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.3,
        opacityTo: 0.4,
        stops: [0, 90, 100],
      },
    },
    dataLabels: {
      enabled: true,
    },
    stroke: {
      curve: "smooth",
      width: 2,
    },
    xaxis: {
      type: "Mês",
      categories: meses,
    },
    /* tooltip: {
        x: {
          format: "MM",
        },
      },*/
  });
  grafico.render();
}
