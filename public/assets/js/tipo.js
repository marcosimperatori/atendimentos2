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
      data: "midia",
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
      width: "150px",
      targets: [1],
    },
    {
      className: "text-center",
      targets: [1],
    },
    {
      width: "90px",
      targets: [2],
    },
    {
      className: "text-center",
      targets: [1],
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
      $("#form_cad_escritorio").LoadingOverlay("show", {
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
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
              '<span aria-hidden="true">&times;</span>' +
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
      $("#form_cad_escritorio").LoadingOverlay("hide");
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
