<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<section>
  <div class="jumbotron mt-5">
    <div id="response" class="col-8"></div>
    <h5>Dados do perfil</h5>
    <div class="row mt-4">
      <label class="form-label ml-3"><strong>Usuário:&nbsp;</strong><?php echo $user->nome ?></label>
    </div>

    <div class="row">
      <label class="form-label ml-3"><strong>Email:&nbsp;</strong><?php echo $user->email ?></label>
    </div>
    <hr>
    <form method="post">
      <div class="row">
        <div class="col-lg-3">
          <label for="senha" class="form-label">Resetar senha</label>
          <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a nova senha">
        </div>
        <div class="col-lg-3">
          <label for="senha" class="form-label">Confirme a senha</label>
          <input type="password" class="form-control" name="confsenha" id="confsenha" placeholder="Redigite a senha">
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-sm mt-3">Salvar</button>
    </form>
  </div>
</section>

<?php $this->endSection(); ?>