<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="nav">
  <ol class="breadcrumb my-3">
    <li class="breadcrumb-item"><a href="<?= base_url('home') ?>"><i class="fa-solid fa-house text-success">&nbsp;</i></a></li>
    <li class="breadcrumb-item active">Certificados emitidos</li>
  </ol>
</div>

<?php echo $this->include('layout/mensagem'); ?>

<section id="tab-emissoes" class="my-2">
  <div class="card border-secondary mb-3" style="max-width: 100%;">
    <div class="card-header bg-light">
      <a href="<?php echo base_url('certificados/emitir'); ?>" class="btn btn-primary btn-sm mb-4" title="Permite incluir um novo usuário no sistema">Emitir certificado</a>
    </div>
    <div class="card-body">
      <table id="certificados-emitidos" class="table responsive table-hover">
        <thead class="table-dark text-white">
          <tr>
            <th scope="col">Emissão</th>
            <th scope="col">Cliente</th>
            <th scope="col">Mídia</th>
            <th scope="col">Tipo</th>
            <th scope="col">Vencimento</th>
            <th scope="col">Situação</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</section>

<?php $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js/certificados.js") ?>"></script>

<?php echo $this->endSection(); ?>