<div class="row">
  <div class="form-group col-md-6 col-sm-12">
    <label for="descricao" class="form-label mt-2">Descricao</label>
    <select name="descricao" class="form-control form-control-sm" id="descricao">
      <option value="A1" <?php echo ($tipo->descricao == "A1" ? 'selected' : ''); ?>>A1</option>
      <option value="A3" <?php echo ($tipo->descricao == "A3" ? 'selected' : ''); ?>>A3</option>
      <option value="BirdId" <?php echo ($tipo->descricao == "BirdId" ? 'selected' : ''); ?>>BirdId</option>
    </select>
    <div id="response2" class="mt-2"></div>
  </div>

  <div class="form-group col-md-6 col-sm-12">
    <label for="validade" class="form-label mt-2">Validade/Nº Transações</label>
    <input type="number" class="form-control form-control-sm" id="validade" name="validade" value="<?php echo esc($tipo->validade); ?>">

    <div id="response2" class="mt-2"></div>
  </div>
</div>
<div class="row">
  <div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="preco_custo" class="form-label mt-2">Preço custo</label>
    <input type="text" class="form-control form-control-sm money" id="preco_custo" name="preco_custo" value="<?php echo esc($tipo->preco_custo); ?>">
  </div>

  <div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="preco_venda" class="form-label mt-2">Preço venda</label>
    <input type="text" class="form-control form-control-sm money" id="preco_venda" name="preco_venda" value="<?php echo esc($tipo->preco_venda); ?>">
  </div>
</div>

<div class="row">
  <div class="form-group col-12 mt-2">
    <label for="obs" class="form-label mt-2">Observação</label>
    <textarea class="form-control form-control-sm" name="obs" id="obs" cols="50" rows="10"><?php echo esc($tipo->obs); ?></textarea>
  </div>
</div>