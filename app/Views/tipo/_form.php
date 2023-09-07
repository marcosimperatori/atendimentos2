<div class="row">
  <div class="form-group col-lg-3">
    <label for="descricao" class="form-label mt-2">Descricao</label>
    <input type="text" class="form-control" id="descricao" aria-describedby="razao" name="descricao" value="<?php echo esc($tipo->descricao); ?>" placeholder="Exemplo: A1">
  </div>

  <div class="form-group col-lg-5">
    <label for="midia" class="form-label mt-2">Tipo de mídia</label>
    <input type="text" class="form-control" id="midia" name="midia" value="<?php echo esc($tipo->midia); ?>" placeholder="Tipo de mídia">
    <div id="response2" class="mt-2"></div>
  </div>

  <div class="form-group col-lg-4">
    <label for="validade" class="form-label mt-2">Validade</label>
    <input type="text" class="form-control" id="validade" name="validade" value="<?php echo esc($cliente->validade); ?>">
  </div>
</div>

<div class="row">
  <div class="form-group col-lg-3">
    <label for="preco_custo" class="form-label mt-2">Descricao</label>
    <input type="text" class="form-control" id="preco_custo" name="preco_custo" value="<?php echo esc($tipo->preco_custo); ?>">
  </div>
  <div class="form-group col-lg-3">
    <label for="preco_venda" class="form-label mt-2">Descricao</label>
    <input type="text" class="form-control" id="preco_venda" name="preco_venda" value="<?php echo esc($tipo->preco_venda); ?>">
  </div>
</div>