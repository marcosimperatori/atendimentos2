<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="nav">
  <ol class="breadcrumb my-3">
    <li class="breadcrumb-item"><a href="<?php echo site_url("home"); ?>"><i class="fa-solid fa-house text-success">&nbsp;</i></a></li>
    <li class="breadcrumb-item"><a href="<?php echo site_url("certificados"); ?>">Certificados emitidos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Consulta avançada
</div>

<section>
  <div id="print" class="jumbotron mt-3">
    <div id="response" class="col-8"></div>
    <h6>Pesquisar</h6>
    <div class="row">
      <div class="col-lg-6">
        <label for="escritorio" class="form-label mt-2">Selecione o escritório</label>
        <select name="escritorio" id="escritorio" class="form-control">
          <option value="" selected>Selecione...</option>
          <?php foreach ($escritorios as $escritorio) : ?>
            <option value="<?php echo $escritorio->id; ?>">
              <?php echo $escritorio->nome; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group col-lg-2">
        <label for="validade" class="form-label mt-2">Início</label>
        <input type="date" class="form-control" id="inicio" name="inicio">
      </div>

      <div class="form-group col-lg-2">
        <label for="validade" class="form-label mt-2">Final</label>
        <input type="date" class="form-control" id="final" name="final">
      </div>

      <div class="form-group col-lg-2">
        <label class="d-none d-lg-block mt-2">&nbsp;</label> <!-- Rótulo vazio para espaçamento -->
        <button id="pavancada" class="btn btn-primary btn-sm">Pesquisar</button>
      </div>
    </div>

    <hr>

  </div>
</section>


<?php $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>

<script src="<?php echo base_url("assets/js/certificados.js") ?>"></script>

<?php echo $this->endSection(); ?>