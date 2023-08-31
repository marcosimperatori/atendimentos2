<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="nav">
  <ol class="breadcrumb my-3">
    <li class="breadcrumb-item"><a href="<?= base_url('home') ?>"><i class="fa-solid fa-house text-success">&nbsp;</i></a></li>
    <li class="breadcrumb-item active">Cadastro de escritórios</li>
  </ol>
</div>

<?php echo $this->include('layout/mensagem'); ?>

<section id="tab-escritorio" class="my-2">
  <div class="card border-secondary mb-3" style="max-width: 100%;">
    <div class="card-header bg-light">
      <a href="<?php echo base_url('escritorios/criar'); ?>" class="btn btn-primary btn-sm mb-4" title="Permite incluir um novo usuário no sistema">Novo escritório</a>
    </div>
    <div class="card-body">
      <table id="lista-escritorios" class="table responsive table-hover">
        <thead class="table-dark text-white">
          <tr>
            <th scope="col">Cliente</th>
            <th scope="col">Situação</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</section>

<!-- Modal exclusão -->
<div class="modal fade" id="mdDeleteEscritorio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title card-text" id="exampleModalLabel">
          <i class="fas fa-exclamation-triangle text-danger"></i>
          Atenção!
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Confirma a <strong>exclusão</strong> do controle atual? <br>
        <p id="descricao-citem" class="font-weight-bold text-danger text-uppercase my-2"></p>
        <div class="my-4">
          <p class="muted"><span>Após excluído, esse item deixará de ser apresentado na geração dos controles mensais a partir de então.</span></p>
        </div>
        <input type="hidden" id="token">
      </div>
      <div class="modal-footer">
        <button id="cancela-exclusao" type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
        <button id="excluir-controle" data-iduser="" type="button" class="btn btn-danger btn-sm">Excluir</button>
      </div>
    </div>
  </div>
</div>
<?php $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js/escritorio.js") ?>"></script>

<?php echo $this->endSection(); ?>