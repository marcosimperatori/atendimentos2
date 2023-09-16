<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="nav">
  <ol class="breadcrumb my-3">
    <li class="breadcrumb-item"><a href="<?php echo site_url("home"); ?>"><i class="fa-solid fa-house text-success">&nbsp;</i></a></li>
    <li class="breadcrumb-item"><a href="<?php echo site_url("certificados"); ?>">Certificados emitidos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Lançar emissão de certificado
</div>

<section>
  <div class="jumbotron">
    <div id="response" class="col-8"></div>

    <div class="col-10">
      <div class="card border-secondary mt-5">
        <div class="card-header bg-light">
          <h4 class="text-primary">Cadastro de certificado</h4>
        </div>
        <div class="card-body">
          <?php echo form_open('/', ['id' => 'form_cad_certificado', 'class' => 'insert'], ['id' => "$certificado->id"]) ?>

          <?php echo $this->include('certificado/_form'); ?>

          <div class="d-flex justify-content-center mt-4">
            <a href="<?php echo site_url("certificados"); ?>" id="btn-cancelar" class="btn btn-secondary btn-sm mb-2 mx-2">Cancelar</a>
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
<script src="<?php echo base_url("assets/js/certificados.js") ?>"></script>
<?php echo $this->endSection(); ?>