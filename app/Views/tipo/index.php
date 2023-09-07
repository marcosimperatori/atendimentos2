<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="nav">
  <ol class="breadcrumb my-3">
    <li class="breadcrumb-item"><a href="<?= base_url('home') ?>"><i class="fa-solid fa-house text-success">&nbsp;</i></a></li>
    <li class="breadcrumb-item active">Tipos de certificados</li>
  </ol>
</div>

<?php echo $this->include('layout/mensagem'); ?>

<section id="tab-tipo" class="my-2">
  <div class="card border-secondary mb-3" style="max-width: 100%;">
    <div class="card-header bg-light">
      <a href="<?php echo base_url('tipos/criar'); ?>" class="btn btn-primary btn-sm mb-4" title="Permite incluir um novo tipo de certificado no sistema">Inserir</a>
    </div>
    <div class="card-body">
      <table id="lista-tipos" class="table responsive table-hover">
        <thead class="table-dark text-white">
          <tr>
            <th scope="col">Certificado</th>
            <th scope="col">Mídia</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tipos as $tipo) : ?>
            <tr>
              <td><?php echo $tipo->descricao; ?></option>
              </td>
              <td><?php echo $tipo->midia; ?></option>
              </td>
              <td>actions</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?php $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js/cliente.js") ?>"></script>

<?php echo $this->endSection(); ?>