<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatório de vencimentos por escritório</title>


</head>

<body>
  <p style="font-size: 16px; color: #333;">Relatório de certificados vencidos e próximos de vencer</p>
  <p><?php echo $dados[0]->nome ?></p>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dados as $dado) : ?>
        <tr>
          <td><?= $dado->id ?></td>
          <td><?= $dado->nomecli ?></td>
          <td><?= $dado->validade ?></td>
          <!-- Adicione mais colunas conforme necessário -->
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>