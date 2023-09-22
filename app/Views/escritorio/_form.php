<div class="row">
  <div class="form-group col-lg-12">
    <label for="razao" class="form-label mt-2">Nome</label>
    <input type="text" class="form-control" id="nome" aria-describedby="razao" name="nome" value="<?php echo esc($escritorio->nome); ?>" placeholder="Informe a razão social">
  </div>
</div>
<div class="row">
  <div class="form-group col-lg-5">
    <label for="uf" class="form-label mt-2">CNPJ</label>
    <input type="text" class="form-control cnpj" id="cnpj" name="cnpj" value="<?php echo esc($escritorio->cnpj); ?>" placeholder="Digite o CNPJ">
    <div id="response2" class="mt-2"></div>
  </div>

  <div class="form-group col-lg-7">
    <label for="email" class="form-label mt-2">Email</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo esc($escritorio->email); ?>" placeholder="Digite o email do cliente">
  </div>
</div>

<div class="row">
  <div class="col-lg-3">
    <label for="comissao" class="form-label mt-2">Comissão (%)</label>
    <input type="text" class="form-control money" id="comissao" name="comissao" value="<?php echo esc($escritorio->comissao); ?>">
  </div>
</div>
<div class="custom-control custom-checkbox">
  <div class="form-check mt-2 d-flex justify-content-end">
    <input type="hidden" name="ativo" value="0">
    <input type="checkbox" name="ativo" id="ativo" value="1" <?php if ($escritorio->ativo == true) : ?> checked <?php endif;  ?> class="custom-control-input">
    <label for="ativo" class="custom-control-label">&nbsp;Cliente ativo</label>
  </div>
</div>

<div class="row">
  <div class="form-group mt-2 col-lg-12">
    <label for="obs" class="form-label mt-2">Observações do cliente</label>
    <textarea id="obs" name="obs" cols="30" rows="5" placeholder="Insira as observações da empresa" class="form-control"><?php echo esc($escritorio->obs); ?></textarea>

  </div>
</div>