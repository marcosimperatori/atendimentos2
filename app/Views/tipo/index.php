<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="pagetitle">
  <h1>Tipos de certificados</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
      <li class="breadcrumb-item active">Tipos</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<?php echo $this->include('layout/mensagem'); ?>

<section id="tab-tipos" class="my-2">
  <div class="card mb-3" style="max-width: 100%;">
    <div class="card-body">
      <div class="card-title">
        <a href="<?php echo base_url('tipos/criar'); ?>" class="btn btn-primary btn-sm mb-4" title="Permite incluir um novo tipo de certificado no sistema">Inserir</a>
      </div>
      <table id="lista-tipos" class="table table-hover">
        <thead class="table-primary">
          <tr>
            <th scope="col">Certificado</th>
            <th scope="col">Preço custo</th>
            <th scope="col">Preço venda</th>
            <th scope="col">Observação</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>

      </table>
    </div>
  </div>
</section>

<?php $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js-old/tipo.js") ?>"></script>

<?php echo $this->endSection(); ?>