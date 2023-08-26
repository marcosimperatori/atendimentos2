const DATATABLE_PTBR = {
  sEmptyTable: "Nenhum registro encontrado",
  sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
  sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
  sInfoFiltered: "(Filtrados de _MAX_ registros)",
  sInfoPostFix: "",
  sInfoThousands: ".",
  sLengthMenu: "_MENU_ resultados por página",
  sLoadingRecords: "Carregando...",
  sProcessing: "Processando...",
  sZeroRecords: "Nenhum registro encontrado",
  sSearch: "Pesquisar",
  oPaginate: {
    sNext: "Próximo",
    sPrevious: "Anterior",
    sFirst: "Primeiro",
    sLast: "Último",
  },
  oAria: {
    sSortAscending: ": Ordenar colunas de forma ascendente",
    sSortDescending: ": Ordenar colunas de forma descendente",
  },
  select: {
    rows: {
      _: "Selecionado %d linhas",
      0: "Nenhuma linha selecionada",
      1: "Selecionado 1 linha",
    },
  },
};

//$(document).ready(function () {});

function exibirErros(erros_model) {
  $.each(erros_model, function (key, value) {
    var errorElement = $('[name="' + key + '"]');
    if (errorElement.length) {
      var errorContainer = errorElement.next(".error");
      if (errorContainer.length === 0) {
        errorContainer = $(
          '<div class="error text-danger" style="font-size: 13px"></div>'
        );
        errorElement.after(errorContainer);
      }
      errorContainer.text(value);

      errorElement.on("input", function () {
        errorContainer.remove();
      });
    }
  });
}
