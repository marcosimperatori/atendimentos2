<div class="row">
  <div class="form-group col-md-6 col-sm-12">
    <label for="descricao" class="form-label mt-2">Descricao</label>
    <input type="text" class="form-control form-control-sm " id="descricao" name="descricao" value="<?php echo esc($tipo->descricao); ?>">
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

<div class="row">
  <div class="form-group col-12 mt-2">
    <label for="obs" class="form-label mt-2">Observação</label>
    <textarea class="form-control form-control-sm" name="obs" id="obs" cols="50" rows="10"><?php echo esc($tipo->obs); ?></textarea>
  </div>
</div>