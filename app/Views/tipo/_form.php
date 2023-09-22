<div class="row">
  <div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="descricao" class="form-label mt-2">Descricao</label>
    <select name="descricao" class="form-control form-control-sm" id="descricao">
      <option value="A1" <?php echo ($tipo->descricao == "A1" ? 'selected' : ''); ?>>A1</option>
      <option value="A3" <?php echo ($tipo->descricao == "A3" ? 'selected' : ''); ?>>A3</option>
    </select>
    <div id="response2" class="mt-2"></div>
  </div>

  <div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="midia" class="form-label mt-2">Tipo de mídia</label>
    <select name="midia" class="form-control form-control-sm" id="midia">
      <option value="eCPF" <?php echo ($tipo->midia == "eCPF" ? 'selected' : ''); ?>>eCPF</option>
      <option value="eCNPJ" <?php echo ($tipo->midia == "eCNPJ" ? 'selected' : ''); ?>>eCNPJ</option>
    </select>
    <div id="response2" class="mt-2"></div>
  </div>

  <div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="preco_custo" class="form-label mt-2">Preço custo</label>
    <input type="text" class="form-control form-control-sm money" id="preco_custo" name="preco_custo" value="<?php echo esc($tipo->preco_custo); ?>">
  </div>

  <div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="preco_venda" class="form-label mt-2">Preço venda</label>
    <input type="text" class="form-control form-control-sm money" id="preco_venda" name="preco_venda" value="<?php echo esc($tipo->preco_venda); ?>">
  </div>
</div>