<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="pagetitle">
  <h1>Cadastro de cliente</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url("clientes"); ?>">Clientes</a></li>
      <li class="breadcrumb-item active" aria-current="page">Exclusão</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section>
  <div class="card">
    <div class="card-body">
      <p class="card-title lead font-weight-bolder"><i class="fas fa-trash-alt text-danger"></i>&nbsp;Exclusão do registro:</p>
      <h3 class="font-weight-bolder text-danger"><?= $cliente->nomecli ?></h3>
      <hr class="my-4">
      <div class="text-center">
        <p class="lead">Confirma a exclusão do registro acima?</p>
        <a class="btn btn-secondary" href="<?= base_url('clientes'); ?>" role="button">Cancelar</a>
        <a class="btn btn-danger" href="<?= base_url('clientes/confirma_exclusao/' . encrypt($cliente->id)); ?>" role="button">Excluir</a>
      </div>
    </div>
  </div>

</section>

<?php $this->endSection(); ?>