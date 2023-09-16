<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="nav">
  <ol class="breadcrumb my-3">
    <li class="breadcrumb-item"><a href="<?php echo site_url("home"); ?>"><i class="fa-solid fa-house text-success">&nbsp;</i></a></li>
    <li class="breadcrumb-item"><a href="<?php echo site_url("clientes"); ?>">Clientes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edição de cliente</li>
  </ol>
</div>

<div class="row">
  <div class="col-lg-7">
    <div id="response" class="col-8"></div>

    <div class="card border-secondary mt-5">
      <div class="card-header bg-light gap-0">
        <h4 class="text-primary">Cadastro de cliente</h4>
      </div>
      <div class="card-body">
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

  <div class="col-lg-5 mt-5 mb-2">
    <div class="accordion" id="accordionExample">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <i class="fas fa-history text-danger"></i>&nbsp;Histórico de renovações do cliente (<?php echo count($historicos); ?>)
            </button>
          </h2>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
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
<script src="<?php echo base_url("assets/js/cliente.js") ?>"></script>
<?php echo $this->endSection(); ?>