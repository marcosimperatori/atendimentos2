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
        <option value="<?php echo $tipo->id; ?>" <?php echo ($tipo->id == $certificado->idtipo) ? 'selected' : ''; ?>>
          <?php echo $certificado->tipo . ' - ' . $certificado->midia; ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group col-lg-3">

  </div>

  <div class="form-group col-lg-7">
    <label for="emailcli" class="form-label mt-2">Email</label>
    <input type="email" class="form-control" id="emailcli" aria-describedby="emailHelp" name="emailcli" value="<?php echo esc($cliente->emailcli); ?>" placeholder="Digite o email do cliente">
  </div>
</div>