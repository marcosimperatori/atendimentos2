$("#lista-escritorios").DataTable({
  oLanguage: DATATABLE_PTBR,
  ajax: {
    url: "escritorios-all",
    beforeSend: function () {
      $("#tab-escritorio").LoadingOverlay("show", {
        background: "rgba(165, 190, 100, 0.5)",
      });
    },
    complete: function () {
      $("#tab-escritorio").LoadingOverlay("hide");
    },
  },
  columns: [
    {
      data: "nome",
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
      width: "70px",
      targets: [1],
    },
    {
      className: "text-center",
      targets: [1],
    },
    {
      width: "40px",
      targets: [2],
    },
    {
      className: "text-center",
      targets: [1],
    },
  ],
});

$("#form_cad_escritorio").on("submit", function (e) {
  e.preventDefault();
  var baseUrl = window.location.href;

  if ($(this).hasClass("insert")) {
    var url = baseUrl.replace("escritorios/criar", "escritorios/cadastrar");
  } else if ($(this).hasClass("update")) {
    var url = "/escritorios/atualizar"; //baseUrl.replace("escritorios/editar", "escritorios/atualizar");
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
