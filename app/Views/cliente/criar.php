<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="pagetitle">
  <h1>Cadastro de cliente</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url("clientes"); ?>">Clientes</a></li>
      <li class="breadcrumb-item active" aria-current="page">Inserção</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section>

  <div class="jumbotron">
    <div id="response" class="col-8"></div>

    <div class="col-8">
      <div class="card mt-3">
        <div class="card-body">
          <div class="card-title">
            <h4>Dados do cliente</h4>
          </div>

          <?php echo form_open('/', ['id' => 'form_cad_cliente', 'class' => 'insert'], ['id' => "$cliente->id"]) ?>

          <?php echo $this->include('cliente/_form'); ?>



          <div class="d-flex justify-content-center mt-4">
            <a href="<?php echo site_url("clientes"); ?>" id="btn-cancelar" class="btn btn-secondary btn-sm mb-2 mx-2">Cancelar</a>
            <input id="btn-salvar" type="submit" value="Gravar" class="btn btn-success btn-sm mb-2">
          </div>

          <?php form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js-old/cliente.js") ?>"></script>
<?php echo $this->endSection(); ?>