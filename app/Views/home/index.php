<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<div class="pagetitle">
  <h1>Resumo</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Home</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">
        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Clientes ativos</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6><?php echo $clientes['ativos']; ?></h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Escritórios</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                  <h6>264</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filtrar</h6>
                </li>

                <li><a class="dropdown-item" href="#" onclick="filtrarPor('hoje')">Hoje</a></li>
                <li><a class="dropdown-item" href="#" onclick="filtrarPor('mês')">Este mês</a></li>
                <li><a class="dropdown-item" href="#" onclick="filtrarPor('ano')">Este ano</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Vendas <span id="resumo-vendas"></span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6 id="total-vendas">1244</h6>
                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->
      </div>

      <div class="col-lg-12">
        <div id="card-vendas" class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Últimas vendas</h5>
            <table id="vendas" class="table responsive table-hover">
              <thead class="table-primary">
                <tr>
                  <th scope="col">Data</th>
                  <th scope="col">Cliente</th>
                  <th scope="col">Tipo</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="row">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Consulte vencimentos por escritório</h5>
            <div class="row mb-3">
              <div class="col-12">
                <div id="consultando" class="collapse show" aria-labelledby="headingOne" data-parent="#consulta">
                  <div class="card-body">
                    <?php echo form_open('/', ['id' => 'form_pesquisa']) ?>
                    <div class="row">
                      <div class="col-lg-12">
                        <label for="escritorio" class="col-form-label mt-2">Selecione o escritório</label>
                        <select name="escritorio" id="escritorio" class="form-control">
                          <option value="" selected>Selecione...</option>
                          <?php foreach ($escritorios as $escritorio) : ?>
                            <option value="<?php echo $escritorio->id; ?>">
                              <?php echo $escritorio->nome; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>

                      <div class="form-group col-lg-6">
                        <label for="validade" class="form-label mt-2">A partir de</label>
                        <input type="date" class="form-control" id="inicio" name="inicio">
                      </div>

                      <div class="form-group col-lg-6">
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
        </div>
      </div>
      <div class="row">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Situação dos certificados</h5>
            <div class="row mb-3">
              <div class="card-body pb-0">

                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    echarts.init(document.querySelector("#trafficChart")).setOption({
                      tooltip: {
                        trigger: 'item'
                      },
                      legend: {
                        top: '5%',
                        left: 'center'
                      },
                      series: [{
                        name: 'Quantidade',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        label: {
                          show: false,
                          position: 'center'
                        },
                        emphasis: {
                          label: {
                            show: true,
                            fontSize: '18',
                            fontWeight: 'bold'
                          }
                        },
                        labelLine: {
                          show: false
                        },
                        data: [{
                            value: <?php echo $cert['vencidos']; ?>,
                            name: 'Vencidos'
                          },
                          {
                            value: <?php echo $cert['vigentes']; ?>,
                            name: 'Vigentes'
                          },
                          {
                            value: <?php echo $cert['renovar']; ?>,
                            name: 'A renovar'
                          },
                        ]
                      }]
                    });
                  });
                </script>

              </div>
            </div><!-- End Website Traffic -->
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


<script src="<?php echo site_url("assets/js-old/home.js"); ?>"> </script>
<script src="<?php echo base_url("assets/js-old/certificados.js") ?>"></script>
<script>
  window.addEventListener('load', function() {
    filtrarPor('mes');
  });
</script>
<?php $this->endSection(); ?>