<?php echo $this->extend('layout/principal'); ?>

<?php echo $this->section('conteudo'); ?>

<section>
  <div class="jumbotron mt-5">
    <div id="response" class="col-8"></div>
    <div class="card-header bg-light">
      <p class="text-primary">Consulta vencimentos entre datas</p>
    </div>
    <div class="card-body">

    </div>

    <div class="mb-2">
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-hand-holding-usd"></i>&nbsp;&nbsp;Faturamento
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <p>Faturamento bruto</p>
              <p>Total comissões</p>
              <p>Lucro</p>
              <div class="row">
                <div class="col-lg-7">
                  gráfico de linha, mostrando no ano selecionado
                </div>
                <div class="col-lg-5">
                  gráfico de pizza mostrando valor bruto e comissão
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="row">

</div>

<?php $this->endSection(); ?>