<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo MY_APP . " - Logar" ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url("assets/img/favicon.png"); ?>" rel="icon">
  <link href="<?php echo base_url("assets/img/apple-touch-icon.png"); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/vendor/bootstrap-icons/bootstrap-icons.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/vendor/boxicons/css/boxicons.min.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/vendor/quill/quill.snow.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/vendor/quill/quill.bubble.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/vendor/remixicon/remixicon.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/vendor/simple-datatables/style.css"); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <div class="container mt-5">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-12 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <span class="d-none d-lg-block"><?php echo MY_APP ?></span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h6 class="card-title text-center pb-0 fs-4">Sua sessão foi finalizada com sucesso!</h6>
                </div>

                <h4>Para acessar novamente <a href="<?= base_url('/') ?>"> clique aqui</a></h4>

              </div>
            </div>

            <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>

          </div>
        </div>
      </div>

    </section>
  </div>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url("assets/vendor/apexcharts/apexcharts.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.j"); ?>s"></script>
  <script src="<?php echo base_url("assets/vendor/chart.js/chart.umd.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendor/echarts/echarts.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendor/quill/quill.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendor/simple-datatables/simple-datatables.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendor/tinymce/tinymce.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendor/php-email-form/validate.js"); ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url("assets/js/main.j"); ?>s"></script>

</body>

</html>