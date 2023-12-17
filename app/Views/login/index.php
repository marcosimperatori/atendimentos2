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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block"><?php echo MY_APP ?></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h6 class="card-title text-center pb-0 fs-4">Acesse sua conta</h6>
                  </div>

                  <form class="row g-3 needs-validation" action="<?= base_url('logar'); ?>" method="post" novalidate>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Entre com seu email</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Senha</label>
                      <input type="password" name="senha" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Entre com sua senha</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Entrar</button>
                    </div>
                  </form>

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
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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