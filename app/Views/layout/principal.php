<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Controle Certificado Digital</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url("assets/img/favicon.ico") ?>" rel="icon">
  <link href="<?php echo base_url("assets/img/apple-touch-icon.png") ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link rel="stylesheet" href="<?php echo base_url("assets/fontawesome/css/all.min.css") ?>">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/vendor/bootstrap-icons/bootstrap-icons.css") ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/vendor/boxicons/css/boxicons.min.css") ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/vendor/quill/quill.snow.css") ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/vendor/quill/quill.bubble.css") ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/vendor/remixicon/remixicon.css") ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/vendor/simple-datatables/style.css") ?>" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="<?php echo base_url("assets/css/style.css") ?>" rel="stylesheet">

  <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/r-2.5.0/datatables.min.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn">&nbsp;&nbsp;</i>
      <a href="<?php echo site_url("home"); ?>" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block"><?= MY_APP ?></span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-md-block dropdown-toggle ps-2"><?php echo session()->get('user')->nome; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url('logout'); ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar shadow">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?= base_url('home'); ?>">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("certificados") ?>">
          <i class="bi bi-file-earmark"></i>
          <span>Emissão certificado</span>
        </a>
      </li><!-- End emissão certificado -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Cadastros</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('clientes'); ?>">
              <i class="bi bi-circle"></i><span>Clientes</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('escritorios'); ?>">
              <i class="bi bi-circle"></i><span>Escritórios parceiros</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('tipos'); ?>">
              <i class="bi bi-circle"></i><span>Tipos certificados</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

  </aside><!-- End Sidebar-->


  <main id="main" class="main">
    <?php echo $this->renderSection('conteudo'); ?>
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <!-- <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.8/af-2.6.0/datatables.min.js"></script> -->

  <script src="<?php echo base_url("assets/jquery/jquery-3.7.0.min.js"); ?>"></script>

  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/r-2.5.0/datatables.min.js"></script>



  <!-- Vendor JS Files -->
  <script src="<?php echo base_url("assets/vendor/apexcharts/apexcharts.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/vendor/chart.js/chart.umd.js") ?>"></script>
  <script src="<?php echo base_url("assets/vendor/echarts/echarts.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/vendor/quill/quill.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/vendor/simple-datatables/simple-datatables.js") ?>"></script>
  <script src="<?php echo base_url("assets/vendor/tinymce/tinymce.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/vendor/php-email-form/validate.js") ?>"></script>


  <!-- Template Main JS File -->
  <script src="<?php echo base_url("assets/js/main.js") ?>"></script>



  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

  <script src="https://www.gstatic.com/charts/loader.js"></script>

  <script src="<?php echo site_url("assets/jquery/jquery.validate.js"); ?>"></script>
  <script src="<?php echo site_url('assets/jquery/jquery.mask.min.js'); ?>"></script>
  <script src="<?php echo base_url("assets/js-old/app.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js-old/comons.js"); ?>"></script>

  <?php echo $this->renderSection('scripts'); ?>

</body>

</html>