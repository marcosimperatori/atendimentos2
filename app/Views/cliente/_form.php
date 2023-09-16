<div class="row">
  <div class="form-group col-lg-12">
    <label for="nomecli" class="form-label mt-2">Nome</label>
    <input type="text" class="form-control" id="nomecli" aria-describedby="razao" name="nomecli" value="<?php echo esc($cliente->nomecli); ?>" placeholder="Informe a razão social">
  </div>
</div>

<div class="row">
  <div class="form-group col-lg-5">
    <label for="cnpj" class="form-label mt-2">CNPJ</label>
    <input type="text" class="form-control cnpj" id="cnpj" name="cnpj" value="<?php echo esc($cliente->cnpj); ?>" placeholder="Digite o CNPJ">
    <div id="response2" class="mt-2"></div>
  </div>

  <div class="form-group col-lg-7">
    <label for="emailcli" class="form-label mt-2">Email</label>
    <input type="email" class="form-control" id="emailcli" aria-describedby="emailHelp" name="emailcli" value="<?php echo esc($cliente->emailcli); ?>" placeholder="Digite o email do cliente">
  </div>
</div>

<div>
  <label for="escritorio" class="form-label mt-2">Vinculado ao escritório</label>
  <select name="escritorio" id="escritorio" class="form-control">
    <option value="" selected>Selecione...</option>
    <?php foreach ($escritorios as $escritorio) : ?>
      <option value="<?php echo $escritorio->id; ?>" <?php echo ($escritorio->id == $cliente->escritorio) ? 'selected' : ''; ?>>
        <?php echo $escritorio->nome; ?></option>
    <?php endforeach; ?>
  </select>
</div>

<div class="custom-control custom-checkbox">
  <div class="form-check mt-2 d-flex justify-content-end">
    <input type="hidden" name="ativo" value="0">
    <input type="checkbox" name="ativo" id="ativo" value="1" <?php if ($cliente->ativo == true) : ?> checked <?php endif;  ?> class="custom-control-input">
    <label for="ativo" class="custom-control-label">&nbsp;Cliente ativo</label>
  </div>
</div>