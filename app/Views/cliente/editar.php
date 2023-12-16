<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>


<div class="pagetitle">
  <h1>Cadastro de cliente</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url("clientes"); ?>">Clientes</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edição</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="row">
  <div class="col-lg-7">
    <div id="response" class=""></div>
    <div class="card mt-3">
      <div class="card-body">
        <div class="card-title gap-0">
          <h4>Dados do cliente</h4>
        </div>
        <?php echo form_open('/', ['id' => 'form_cad_cliente', 'class' => 'update'], ['id' => "$cliente->id"]) ?>

        <?php echo $this->include('cliente/_form'); ?>

        <div class="d-flex justify-content-center mt-4">
          <a href="<?php echo site_url("clientes"); ?>" id="btn-cancelar" class="btn btn-secondary btn-sm mb-2 mx-2">Cancelar</a>
          <input id="btn-salvar" type="submit" value="Gravar" class="btn btn-success btn-sm mb-2">
        </div>

        <?php form_close(); ?>
      </div>
    </div>
  </div>

  <div class="col-lg-5 mt-3 mb-2">
    <div class="card ">
      <div class="card-body">
        <div class="card-title" id="headingOne">
          <h5 class="mb-0">
            <i class="fas fa-history text-danger"></i>&nbsp;Histórico de renovações do cliente (<?php echo count($historicos); ?>)
          </h5>
        </div>
        </h2>
        <?php if (count($historicos) > 0) : ?>
          <?php foreach ($historicos as $historico) : ?>
            <ul>
              <li><?php echo 'Emissão: ' . date('d/m/Y', strtotime($historico->emissao_em)) . ' | ' . $historico->descricao . ' | Validade: ' . date('d/m/Y', strtotime($historico->validade)); ?></li>
            </ul>
          <?php endforeach ?>
        <?php else : ?>
          <p>Não existe histórico.</p>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js-old/cliente.js") ?>"></script>
<?php echo $this->endSection(); ?>