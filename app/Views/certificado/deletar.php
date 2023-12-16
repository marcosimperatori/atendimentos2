<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>


<div class="pagetitle">
  <h1>Lançar certificado</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url("certificados"); ?>">Certificados</a></li>
      <li class="breadcrumb-item active" aria-current="page">Exclusão</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section>
  <div class="card">
    <div class="card-body">
      <p class="card-title lead font-weight-bolder"><i class="fas fa-trash-alt text-danger"></i>&nbsp;Dados do registro:</p>
      <h3 class="font-weight-bolder text-danger"><?= $certificado->nomecli ?></h3>

      <div class="text-center">
        <div class="row">
          <div class="col">
            <p>Tipo: <?php echo $certificado->descricao; ?></p>
          </div>
          <div class="col">
            <p>Emitido em: <?php echo  date('d/m/Y', strtotime($certificado->emissao_em)); ?></p>
          </div>
          <div class="col">
            <p>Válido até: <?php echo  date('d/m/Y', strtotime($certificado->validade)); ?></p>
          </div>
        </div>
        <hr class="my-4">
        <p class="lead">Confirma a exclusão do registro acima?</p>
        <a class="btn btn-secondary" href="<?= base_url('certificados'); ?>" role="button">Cancelar</a>
        <a class="btn btn-danger" href="<?= base_url('certificados/confirma_exclusao/' . encrypt($certificado->id)); ?>" role="button">Excluir</a>
      </div>
    </div>
  </div>

</section>

<?php $this->endSection(); ?>