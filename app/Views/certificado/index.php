<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>
<h1>Emissão de certificados</h1>

<?php ?>


<div>
  <label for="escritorio" class="form-label mt-2">Selecione o cliente</label>
  <select name="escritorio" id="escritorio" class="form-control">
    <option value="" selected>Selecione...</option>
    <?php foreach ($clientes as $cliente) : ?>
      <option value="<?php echo $cliente->id; ?>"><?php echo $cliente->nomecli . "  (Escritório: " . $cliente->nome . ")"; ?></option>
    <?php endforeach; ?>
  </select>
</div>

<div>
  <label for="escritorio" class="form-label mt-2">Selecione o tipo de certificado</label>
  <select name="escritorio" id="escritorio" class="form-control">
    <option value="" selected>Selecione...</option>
    <?php foreach ($tipos as $tipo) : ?>
      <option value="<?php echo $tipo->id; ?>"><?php echo $tipo->descricao; ?></option>
    <?php endforeach; ?>
  </select>
</div>

<?php $this->endSection(); ?>