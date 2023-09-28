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
