<style>
  body {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }

  table {
    width: 100%;
    /* Define a largura total da tabela */
    border-collapse: collapse;
    /* Mescla as bordas das células */
  }

  th,
  td {
    padding: 3px;
    /* Adiciona um espaçamento interno para as células */
    text-align: left;
    /* Alinha o texto à esquerda nas células */
  }

  th {
    background-color: #f2f2f2;
    /* Define uma cor de fundo para as células de cabeçalho */
  }

  /* Define as larguras desejadas para cada coluna */
  td.col-id {
    width: 150px;
    /* Largura da coluna de ID */
  }

  td.col-nomecli {
    width: 230px;
    /* Largura da coluna de Cliente */
  }

  td.col-validade {
    width: 100px;
    text-align: center;
  }

  vecto {
    text-align: center;
  }

  p.titulo {
    padding: 10px;
    background-color: #0181c7;
    text-align: center;
    color: white;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }

  .sub {
    padding: 12px;
    color: #0181c7;
    font-size: 15;
    font-weight: 300;
  }
</style>



<body>
  <p class="titulo">Relatório de certificados vencidos e próximos de vencer</p>
  <p class="sub"><?php echo $dados[0]->nome ?></p>

  <table class="table">
    <thead>
      <tr>
        <th scope="col" class="col-nomecli">Cliente</th>
        <th scope="col" class="col-nomecli">Certificado</th>
        <th scope="col" class="col-validade text-center">Vencimento</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dados as $dado) : ?>
        <tr>
          <td class="col-nomecli"><?= $dado->nomecli; ?></td>
          <td class="col-id"><?= $dado->descricao; ?></td>
          <td class="col-validade vecto" style="color:red;"><?= $dado->validade; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>