<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>



<section>
  <div class="jumbotron mt-3">

    <div class="mb-2">
      <div class="accordion" id="faturamento">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#fatura" aria-expanded="true" aria-controls="collapseOne">
                <h6 class="text-primary"><i class="fas fa-chart-pie"></i>&nbsp;&nbsp;Resumo</h6>
              </button>
            </h2>
          </div>

          <div id="fatura" class="collapse show" aria-labelledby="headingOne" data-parent="#faturamento">
            <div class="card-body">
              <div class="row text-center my-2">
                <div class="col-lg-4 mb-2">
                  <div id="chart_clientes" style="width: 100%; height: 280px;"></div>
                </div>
                <div class="col-lg-4 mb-2">
                  <div id="chart_escritorios" style="width: 100%; height: 280px;"></div>
                </div>
                <div class="col-lg-4 mb-2">
                  <div id="chart_certificados" style="width: 100%; height: 280px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-2">
      <div class="accordion" id="consulta">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#consultando" aria-expanded="true" aria-controls="collapseOne">
                <h6 class="text-success"><i class="fas fa-filter"></i>&nbsp;&nbsp; Consulte vencimentos por escritório</h6>
              </button>
            </h2>
          </div>

          <div id="consultando" class="collapse show" aria-labelledby="headingOne" data-parent="#consulta">
            <div class="card-body">
              <?php echo form_open('/', ['id' => 'form_pesquisa']) ?>
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
                  <label for="validade" class="form-label mt-2">A partir de</label>
                  <input type="date" class="form-control" id="inicio" name="inicio">
                </div>

                <div class="form-group col-lg-2">
                  <label for="validade" class="form-label mt-2">Final até</label>
                  <input type="date" class="form-control" id="final" name="final">
                </div>

                <div class="form-group col-lg-2">
                  <label class="d-none d-lg-block mt-2">&nbsp;</label>
                  <button id="pavancada" type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
                </div>
              </div>
              <?php form_close(); ?>
              <div id="resultado" style="background-color: white;"></div>
              <div id="response"></div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="accordion mb-2" id="vecto">
      <div class="card">
        <div class="card-header" id="headingOne">
          <button class="btn btn-link btn-block text-left text-danger" type="button" data-toggle="collapse" data-target="#vectos" aria-expanded="true" aria-controls="collapseOne">
            <h6 class="text-danger"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;Certificados vencidos e próximos de vencer (<?php echo count($vencimentos); ?>)</h6>
          </button>
        </div>
        <div id="vectos" class="collapse show" aria-labelledby="headingOne" data-parent="#vecto">
          <div class="card-body">
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Cliente</th>
                  <th scope="col">Vencimento</th>
                  <th scope="col" class="text-center">Contato</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($vencimentos as $vecto) : ?>
                  <tr>
                    <td>
                      <div>
                        <?php echo $vecto->nomecli; ?>

                        <p class="text-muted">(<?php echo $vecto->nome; ?>)</p>

                      </div>
                    </td>
                    <td><?php echo date('d/m/Y', strtotime($vecto->validade)); ?></td>
                    <td class="text-center"><a href="https://wa.me/5532999652617" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp text-success"></i></a>
                      <a href="http://" target="_blank" rel="noopener noreferrer"><i class="far fa-envelope text-danger"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


  </div>
</section>
<?php $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<!-- Inclua o CDN da biblioteca html2canvas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>


<script src="<?php echo site_url("assets/js/home.js"); ?>"> </script>
<script src="<?php echo base_url("assets/js/certificados.js") ?>"></script>
<script>
  window.addEventListener('load', function() {
    carregarGraficos();
  });
</script>
<?php $this->endSection(); ?>