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
              <td class="text-center">
                <a href="<?php echo base_url("tipos/editar/" . encrypt($tipo->id)); ?>"><i class="fas fa-edit text-success"></i></a>
                <a href="<?php echo base_url("tipos/excluir/" . encrypt($tipo->id)); ?>"><i class="fas fa-trash-alt text-danger"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?php $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js/tipo.js") ?>"></script>

<?php echo $this->endSection(); ?>