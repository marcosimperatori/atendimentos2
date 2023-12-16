<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="pagetitle">
  <h1>Tipo de certificado</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo site_url("home"); ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url("tipos"); ?>">Tipos de certificados</a></li>
      <li class="breadcrumb-item active" aria-current="page">Inclusão de tipo de certificado
    </ol>
  </nav>
</div><!-- End Page Title -->

<section>
  <div id="response" class="col-8"></div>

  <div class="col-lg-8">
    <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title">Cadastro</h5>
        <?php echo form_open('/', ['id' => 'form_cad_tipo', 'class' => 'insert'], ['id' => "$tipo->id"]) ?>

        <?php echo $this->include('tipo/_form'); ?>

        <div class="d-flex justify-content-center mt-4">
          <a href="<?php echo site_url("tipos"); ?>" id="btn-cancelar" class="btn btn-secondary btn-sm mb-2 mx-2">Cancelar</a>
          <input id="btn-salvar" type="submit" value="Gravar" class="btn btn-success btn-sm mb-2">
        </div>

        <?php form_close(); ?>

      </div>
    </div>

  </div>

</section>

<?php $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js-old/tipo.js") ?>"></script>
<?php echo $this->endSection(); ?>