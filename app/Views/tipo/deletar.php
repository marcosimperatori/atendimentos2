<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="pagetitle">
  <h1>Tipo de certificado</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo site_url("home"); ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url("tipos"); ?>">Tipos de certificados</a></li>
      <li class="breadcrumb-item active" aria-current="page">Exclusão
    </ol>
  </nav>
</div><!-- End Page Title -->

<section>
  <div class="card">
    <div class="card-body">
      <p class=" card-title lead font-weight-bolder"><i class="fas fa-trash-alt text-danger"></i>&nbsp;Dados do registro:</p>
      <h3 class="font-weight-bolder text-danger"><?= $tipo->descricao; ?></h3>
      <hr class="my-4">
      <div class="text-center">
        <p class="lead">Confirma a exclusão do registro acima?</p>
        <a class="btn btn-secondary" href="<?= base_url('tipos'); ?>" role="button">Cancelar</a>
        <a class="btn btn-danger" href="<?= base_url('tipos/confirma_exclusao/' . encrypt($tipo->id)); ?>" role="button">Excluir</a>
      </div>
    </div>
  </div>

</section>

<?php $this->endSection(); ?>