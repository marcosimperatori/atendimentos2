<div>
  <label for="idcliente" class="form-label mt-2">Cliente</label>
  <select name="idcliente" id="idcliente" class="form-control">
    <option value="" selected>Selecione...</option>
    <?php foreach ($clientes as $cliente) : ?>
      <option value="<?php echo $cliente->id; ?>" <?php echo ($cliente->id == $certificado->idcliente) ? 'selected' : ''; ?>>
        <?php echo $cliente->nomecli; ?></option>
    <?php endforeach; ?>
  </select>
</div>

<div class="row">
  <div class="form-group col-lg-3">
    <label for="idtipo" class="form-label mt-2">Tipo</label>
    <select name="idtipo" id="idtipo" class="form-control">
      <option value="" selected>...</option>
      <?php foreach ($tipos as $tipo) : ?>
        <option data-valor="<?php echo $tipo->preco_venda; ?>" data-anos="<?php echo $tipo->validade; ?>" value="<?php echo $tipo->id; ?>" <?php echo ($tipo->id == $certificado->idtipo) ? 'selected' : ''; ?>>
          <?php echo $tipo->descricao . ' - ' . $tipo->midia; ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group col-lg-3">
    <label for="preco_venda" class="form-label mt-2">Preço de venda</label>
    <input type="text" class="form-control money" id="preco_venda" name="preco_venda" value="<?php echo $certificado->preco_venda ?>">
  </div>

  <div class="form-group col-lg-3">
    <label for="emissao_em" class="form-label mt-2">Emitido em</label>
    <input type="date" class="form-control" id="emissao_em" name="emissao_em" value="<?php echo $certificado->emissao_em ?>">
  </div>

  <div class="form-group col-lg-3">
    <label for="validade" class="form-label mt-2">Válido até</label>
    <input type="date" class="form-control" id="validade" name="validade" value="<?php echo $certificado->validade ?>">
  </div>
</div>