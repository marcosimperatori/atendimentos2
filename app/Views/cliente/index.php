<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="pagetitle">
  <h1>Listagem de clientes</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
      <li class="breadcrumb-item active">Clientes</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<?php echo $this->include('layout/mensagem'); ?>

<section id="tab-cliente" class="my-2">
  <div class="card border-secondary mb-3" style="max-width: 100%;">
    <div class="card-body">
      <div class="card-title">
        <a href="<?php echo base_url('clientes/criar'); ?>" class="btn btn-primary btn-sm mb-4" title="Permite incluir um novo usuário no sistema">Novo cliente</a>
      </div>
      <table id="lista-clientes" class="table responsive table-hover">
        <thead class="table-primary">
          <tr>
            <th scope="col">Cliente</th>
            <th scope="col">Escritório</th>
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
<script src="<?php echo base_url("assets/js-old/cliente.js") ?>"></script>

<?php echo $this->endSection(); ?>