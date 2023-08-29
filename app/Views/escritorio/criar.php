<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>
<div class="nav">
  <ol class="breadcrumb my-3">
    <li class="breadcrumb-item"><a href="<?php echo site_url("/"); ?>"><i class="fa-solid fa-house text-success">&nbsp;</i></a></li>
    <li class="breadcrumb-item"><a href="<?php echo site_url("escritorios"); ?>">Escritórios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Inclusão de escritório</li>
  </ol>
</div>

<section>
  <div id="response" class="col-8"></div>

  <?php echo form_open('/', ['id' => 'form_cad_escritorio', 'class' => 'insert'], ['id' => "$escritorio->id"]) ?>

  <?php echo $this->include('escritorio/_form'); ?>

  <div class="d-flex justify-content-center mt-4">
    <a href="<?php echo site_url("escritorios"); ?>" id="btn-cancelar" class="btn btn-secondary btn-sm mb-2 mx-2">Cancelar</a>
    <input id="btn-salvar" type="submit" value="Gravar" class="btn btn-success btn-sm mb-2">
  </div>

  <?php form_close(); ?>

</section>

<?php $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js/escritorio.js") ?>"></script>
<?php echo $this->endSection(); ?>