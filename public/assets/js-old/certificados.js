$("#certificados-emitidos").DataTable({
  oLanguage: DATATABLE_PTBR,
  ajax: {
    url: "certificados_get_all",
    beforeSend: function () {
      $("#tab-emissoes").LoadingOverlay("show", {
        background: "rgba(165, 190, 100, 0.5)",
      });
    },
    complete: function () {
      $("#tab-emissoes").LoadingOverlay("hide");
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
    {
      data: "validade",
    },
    {
      data: "ativo",
    },
    {
      data: "acoes",
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
  pageLength: 10,
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
      width: "360px",
      targets: [1],
    },
    {
      width: "25px",
      className: "text-center",
      targets: [2],
    },
    {
      width: "30px",
      className: "text-center",
      targets: [3],
    },
    {
      width: "75px",
      targets: [4],
    },
    {
      width: "50px",
      targets: [5],
    },
  ],
  order: [[0, "desc"]],
});

$("#form_cad_certificado").on("submit", function (e) {
  e.preventDefault();
  const selectValue = $("#idcliente").val();
  if (selectValue === "") {
    $("#response").html(
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
        "Por favor, selecione um cliente" +
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">' +
        "</button>" +
        "</div>"
    );

    return false; // Impede o envio do formulário
  } else {
    var baseUrl = window.location.href;

    if ($(this).hasClass("insert")) {
      var url = baseUrl.replace(
        "certificados/emitir",
        "certificados/cadastrar"
      );
    } else if ($(this).hasClass("update")) {
      var url = "/certificados/atualizar"; //baseUrl.replace("escritorios/editar", "escritorios/atualizar");
    }

    $.ajax({
      type: "POST",
      url: url,
      data: new FormData(this),
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#response").html("");
        $("#form_cad_cliente").LoadingOverlay("show", {
          background: "rgba(165, 190, 100, 0.5)",
        });
      },
      success: function (response) {
        $("[name=csrf_test_name]").val(response.token);

        if (!response.erro) {
          if (response.info) {
            $("#response").html(
              '<div class="alert alert-warning alert-dismissible fade show" role="alert">' +
                response.info +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">' +
                "</button>" +
                "</div>"
            );
          } else {
            //tudo certo na atualização, redirecionar o usuário
            window.location.href = response.redirect_url;
          }
        } else {
          if (response.erros_model) {
            exibirErros(response.erros_model);
          }
        }
      },
      error: function () {
        alert("falha ao executar a operação");
      },
      complete: function () {
        $("#form_cad_certificado").LoadingOverlay("hide");
      },
    });
  }
});

$("#idtipo").change(function () {
  var selectedOption = $(this).find("option:selected");
  var valor = selectedOption.data("valor");

  if (typeof valor !== "undefined") {
    $("#preco_venda").val(valor);
    $("#preco_venda").focus();
    calcularValidade($("#emissao_em"));
  } else {
    $("#preco_venda").val("");
  }
});

function calcularValidade(emissaoEm) {
  var selectedDate = new Date($(emissaoEm).val());
  var selectedOption = $("#idtipo").find("option:selected");
  var anos = selectedOption.data("anos");

  if (!isNaN(selectedDate.getTime())) {
    selectedDate.setFullYear(selectedDate.getFullYear() + anos);
    var formattedDate = selectedDate.toISOString().slice(0, 10);

    $("#validade").val(formattedDate);
  } else {
    //alert("Data inválida!");
  }
}

$("#emissao_em").change(function () {
  calcularValidade(this);
});

$("#escritorio").change(function () {
  /*var selectedValue = $(this).val();

  if (selectedValue !== "") {
    alert("Você selecionou o valor: " + selectedValue);
  }*/
});

$("#final").change(function () {
  /* var selectedDate = $(this).val();

  if (selectedDate !== "") {
    alert("Você selecionou a data: " + selectedDate);
  }*/
});

$("#form_pesquisa").on("submit", function (e) {
  e.preventDefault();

  if (
    $("#escritorio").val() !== "" &&
    $("#inicio").val() !== "" &&
    $("#final").val() !== ""
  ) {
    /*var dados = {
      escritorio: $("#escritorio").val(),
      inicio: $("#inicio").val(),
      final: $("#final").val(),
    };*/

    $.ajax({
      type: "POST",
      url: "/certificados/buscar",
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      data: new FormData(this),
      beforeSend: function () {
        $("#resp-consulta").html("");
        $("#resultado").html("");
        $("#consulta").LoadingOverlay("show", {
          background: "rgba(165, 190, 100, 0.5)",
        });
      },
      success: function (data) {
        $("[name=csrf_test_name]").val(data.token);

        if (data.info) {
          $("#response").html(
            '<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">' +
              data.info +
              '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">' +
              "</button>" +
              "</div>"
          );
        }

        if (data.redirect_url) {
          $("#response").html(
            '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">' +
              data.redirect_url +
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
              '<span aria-hidden="true">&times;</span>' +
              "</button>" +
              "</div>"
          );
        }

        if (data.data) {
          const items = [];

          data.data.forEach((item) => {
            const div = $('<div class="item mt-3">');
            div.append(
              $("<h6>").text(
                "Vecto: " +
                  item.validade +
                  " - " +
                  item.tipo +
                  " - " +
                  item.nome
              )
            );
            items.push(div);
          });

          const div = $('<div class="container">');
          div.append(items);

          const link = $('<a href="#">Limpar&nbsp;</a>');
          link.css("float", "right");
          //const linkGerarPDF = $('<button id="gerarPDF">Gerar PDF</button>');
          // linkGerarPDF.css("float", "right");

          div.prepend(link);
          //div.prepend(linkGerarPDF);

          link.on("click", () => {
            div.empty();
          });

          $("#resultado").append(div);

          /*  linkGerarPDF.on("click", () => {
            const divResultado = document.getElementById("resultado");

            const pdf = new jsPDF("p", "mm", "a4");
            pdf.addHTML(divResultado, () => {
              const nomeDoArquivo = "meu_relatorio.pdf";
              // Abrir o PDF em uma nova página
              const blob = pdf.output("blob");
              const url = URL.createObjectURL(blob);
              window.open(url, "_blank");
            });
          });*/
        }
      },
      error: function () {
        console.log("Erro na requisição:");
      },
      complete: function () {
        $("#consulta").LoadingOverlay("hide");
        $("#resp-consulta").html("");
        /* $("#escritorio").html("");
        $("#inicio").html("");
        $("#final").html("");*/
      },
    });
  } else {
    alert(
      "Por favor, selecione um escritório e preencha as datas de início e fim."
    );
  }
});

$("#gerarPDF2").on("click", () => {
  const divResultado = document.getElementById("resultado");

  const pdf = new jsPDF();
  pdf.addHTML(divResultado, () => {
    // Abrir o PDF em uma nova página
    const blob = pdf.output("blob");
    const url = URL.createObjectURL(blob);
    window.open(url);
  });
});

function buscaCNPJ() {
  $("#cnpjInput").on("blur", function (event) {
    console.log("estou aqui");
    var cnpj = $(this).val();
    if (cnpj) {
      // Faz a chamada à API usando o $.get()
      $.get("https://brasilapi.com.br/api/cnpj/v1/" + cnpj, function (data) {
        console.log(data); // Exibe os dados retornados pela API no console
        // Você pode manipular os dados aqui conforme necessário
      });
    }
  });
}
