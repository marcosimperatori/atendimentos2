<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="pagetitle">
  <h1>Cadastro de escritório parceiro</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url("escritorios"); ?>">Escritórios</a></li>
      <li class="breadcrumb-item active" aria-current="page">Exclusão</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section>
  <div class="card">
    <div class="card-body">
      <p class="card-title lead font-weight-bolder"><i class="fas fa-trash-alt text-danger"></i>&nbsp;Dados do registro:</p>
      <h3 class="font-weight-bolder text-danger"><?= $escritorio->nome ?></h3>
      <hr class="my-4">
      <div class="text-center">
        <p class="lead">Confirma a exclusão do registro acima?</p>
        <a class="btn btn-secondary" href="<?= base_url('escritorios'); ?>" role="button">Cancelar</a>
        <a class="btn btn-danger" href="<?= base_url('escritorios/confirma_exclusao/' . encrypt($escritorio->id)); ?>" role="button">Excluir</a>
      </div>
    </div>
  </div>

</section>

<?php $this->endSection(); ?>