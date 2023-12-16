$("#lista-tipos").DataTable({
  oLanguage: DATATABLE_PTBR,
  ajax: {
    url: "tipos-all",
    beforeSend: function () {
      $("#tab-tipos").LoadingOverlay("show", {
        background: "rgba(165, 190, 100, 0.5)",
      });
    },
    complete: function () {
      $("#tab-tipos").LoadingOverlay("hide");
    },
  },
  columns: [
    {
      data: "descricao",
    },

    {
      data: "custo",
      render: $.fn.dataTable.render.number(",", ".", 2, "R$ "),
      className: "text-right",
    },
    {
      data: "venda",
      render: $.fn.dataTable.render.number(",", ".", 2, "R$ "),
      className: "text-right",
    },
    {
      data: "obs",
    },
    {
      data: "acoes",
    },
  ],
  deferRender: false,
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
      width: "250px",
      targets: [0],
    },
    {
      width: "110px",
      className: "filter",
      targets: [1, 2],
    },
    {
      targets: [3],
    },
    {
      className: "text-center",
      width: "30px",
      targets: [4],
    },
  ],
});

$("#form_cad_tipo").on("submit", function (e) {
  e.preventDefault();
  var baseUrl = window.location.href;

  if ($(this).hasClass("insert")) {
    var url = baseUrl.replace("tipos/criar", "tipos/cadastrar");
  } else if ($(this).hasClass("update")) {
    var url = "/tipos/atualizar"; //baseUrl.replace("escritorios/editar", "escritorios/atualizar");
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
      $("#form_cad_tipo").LoadingOverlay("show", {
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
      $("#form_cad_tipo").LoadingOverlay("hide");
    },
  });
});

$("#lista-escritorios").on("click", "#excluir-esc", function () {
  var registro = $(this).data("id");
  $("#excluir-controle").attr("data-iduser", registro);
});

$("#excluir-controle").on("click", function () {
  var idControle = $("#excluir-controle").data("iduser");
  csrfToken = $('input[name="csrf_test_name"]').val();

  $.ajax({
    type: "POST",
    headers: {
      "X-CSRF-Token": csrfToken,
    },
    url: "/clientes/item/excluir",
    data: { id: idControle },
    beforeSend: function () {},
    success: function (response) {
      $("[name='csrf_test_name']").val(response.token);
      listarControlesCliente();
    },
    error: function () {
      alert("Falha ao tentar excluir o registro!");
    },
    complete: function () {
      fecharModal("#cancela-exclusao");
    },
  });
});

function fecharModal(idModal) {
  var botao = $(idModal);
  // Simulando o clique no botão
  botao.trigger("click");
}
