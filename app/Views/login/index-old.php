<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logar - Atendimento Clientes</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>
  <div class="container mt-5">
    <div class="jumbotron mt-5">
      <div class="text-center">
        <p></p>
      </div>
      <form action="<?= base_url('logar'); ?>" method="post">
        <span class="login100-form-title">
          <h3>Agência Certificadora</h3>
        </span>
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

        <div class="form-group col-6">
          <label for="email">Login</label>
          <input class="form-control" type="text" name="email" placeholder="Email">
          <?php echo session()->getFlashdata('erros')['email'] ?? '' ?>
        </div>

        <div class="form-group col-6">
          <label for="senha">senha</label>
          <input class="form-control" type="password" name="senha" placeholder="Senha">
          <?php echo session()->getFlashdata('erros')['senha'] ?? '' ?>
        </div>

        <div class="text-danger my-2">
          <?php echo session()->getFlashdata('error') ?? '' ?>
        </div>
        <div class="container">
          <button class="btn btn-primary">
            Logar
          </button>
        </div>

      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>