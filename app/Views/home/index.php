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
                  <h6>145</h6>
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
                  <h6>$3,264</h6>
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

                <li><a class="dropdown-item" href="#">Hoje</a></li>
                <li><a class="dropdown-item" href="#">Este mês</a></li>
                <li><a class="dropdown-item" href="#">Este ano</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Vendas <span>| Este mês</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6>1244</h6>
                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->
      </div>

      <div class="col-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Últimas vendas</h5>
            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><a href="#">#2457</a></th>
                  <td>Brandon Jacob</td>
                  <td><a href="#" class="text-primary">At praesentium minu</a></td>
                  <td>$64</td>
                  <td><span class="badge bg-success">Approved</span></td>
                </tr>
                <tr>
                  <th scope="row"><a href="#">#2147</a></th>
                  <td>Bridie Kessler</td>
                  <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                  <td>$47</td>
                  <td><span class="badge bg-warning">Pending</span></td>
                </tr>
                <tr>
                  <th scope="row"><a href="#">#2049</a></th>
                  <td>Ashleigh Langosh</td>
                  <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                  <td>$147</td>
                  <td><span class="badge bg-success">Approved</span></td>
                </tr>
                <tr>
                  <th scope="row"><a href="#">#2644</a></th>
                  <td>Angus Grady</td>
                  <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                  <td>$67</td>
                  <td><span class="badge bg-danger">Rejected</span></td>
                </tr>
                <tr>
                  <th scope="row"><a href="#">#2644</a></th>
                  <td>Raheem Lehner</td>
                  <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                  <td>$165</td>
                  <td><span class="badge bg-success">Approved</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- End Recent Sales -->
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
                        name: 'Access From',
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
                            value: 1048,
                            name: 'Search Engine'
                          },
                          {
                            value: 735,
                            name: 'Direct'
                          },
                          {
                            value: 580,
                            name: 'Email'
                          },
                          {
                            value: 484,
                            name: 'Union Ads'
                          },
                          {
                            value: 300,
                            name: 'Video Ads'
                          }
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

<section>
  <div class="jumbotron mt-3">

    <div class="mb-2">
      <div class="accordion" id="faturamento">
        <div class="card shadow">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#fatura" aria-expanded="true" aria-controls="collapseOne">
                <h6 class="text-primary"><i class="fas fa-chart-pie"></i>&nbsp;&nbsp;<strong>Resumo</strong></h6>
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
        <div class="card shadow">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#consultando" aria-expanded="true" aria-controls="collapseOne">
                <h6 class="text-success"><i class="fas fa-filter"></i>&nbsp;&nbsp; <strong>Consulte vencimentos por escritório</strong></h6>
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
      <div class="card shadow">
        <div class="card-header" id="headingOne">
          <button class="btn btn-link btn-block text-left text-danger" type="button" data-toggle="collapse" data-target="#vectos" aria-expanded="true" aria-controls="collapseOne">
            <h6 class="text-danger"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;<strong>Certificados vencidos e próximos de vencer (<?php echo count($vencimentos); ?>)</strong></h6>
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


<script src="<?php echo site_url("assets/js-old/home.js"); ?>"> </script>
<script src="<?php echo base_url("assets/js-old/certificados.js") ?>"></script>
<script>
  window.addEventListener('load', function() {
    carregarGraficos();
  });
</script>
<?php $this->endSection(); ?>