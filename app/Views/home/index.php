<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<section>
  <div class="jumbotron mt-3">
    <div id="response" class="col-8"></div>

    <div class="mb-2">
      <div class="accordion" id="faturamento">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#fatura" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-chart-pie"></i>&nbsp;&nbsp;Resumo
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

    <div class="accordion mb-2" id="vecto">
      <div class="card">
        <div class="card-header" id="headingOne">
          <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left text-danger" type="button" data-toggle="collapse" data-target="#vectos" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;Certificados vencidos (<?php echo count($vencimentos); ?>)
              </button>
            </h2>
            <a href="<?php echo base_url('certificados/consulta'); ?>">Consulta avançada</a>
          </div>
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
<script src="<?php echo site_url("assets/js/home.js"); ?>"> </script>
<script>
  window.addEventListener('load', function() {
    carregarGraficos();
  });
</script>
<?php $this->endSection(); ?>