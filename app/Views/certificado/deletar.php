<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<section class="container">
  <div class="nav">
    <ol class="breadcrumb my-3">
      <li class="breadcrumb-item"><a href="<?php echo site_url("home"); ?>"><i class="fa-solid fa-house text-success">&nbsp;</i></a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url("certificados"); ?>">Certificados emitidos</a></li>
      <li class="breadcrumb-item active" aria-current="page">Exclusão de certificado</li>
    </ol>
  </div>

  <div class="jumbotron">
    <p class="lead font-weight-bolder"><i class="fas fa-trash-alt text-danger"></i>&nbsp;Exclusão do registro:</p>
    <h3 class="font-weight-bolder text-danger"><?= $certificado->nomecli ?></h3>

    <div class="text-center">
      <div class="row">
        <div class="col">
          <p>Tipo: <?php echo $certificado->descricao . " ( " . $certificado->midia . " )"; ?></p>
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

</section>

<?php $this->endSection(); ?>