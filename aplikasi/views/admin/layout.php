<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */
 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Artre Outgear Outdoor Apparel</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <link rel="shortcut icon" href="<? echo base_url('favicon.ico') ?>" />
    <link rel="stylesheet" href="<? echo base_url('bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" href="<? echo base_url('plugins/datatables/dataTables.bootstrap.css') ?>" />
    <link rel="stylesheet" href="<? echo base_url('dist/css/AdminLTE.min.css') ?>" />
    <link rel="stylesheet" href="<? echo base_url('dist/css/skins/_all-skins.min.css') ?>" />
  
    <!-- select 2 bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css" rel="stylesheet" />
    <!-- include summernote css-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    <!-- jQuery 2.2.3 -->
    <script src="<? echo base_url('plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
</head>
<body class="hold-transition skin-green fixed sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<? echo base_url('assets/images/logo-artre-kecil.png') ?>" height="30px" /></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Artre Outgear</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">DATABASE</li>
        <!-- Optionally, you can add icons to the links -->
        <li id="products"><a href="<? echo site_url('administrator/products') ?>"><i class="fa fa-shopping-cart"></i> <span>Products</span></a></li>
        <li id="stories"><a href="<? echo site_url('administrator/stories') ?>"><i class="fa fa-newspaper-o"></i> <span>Stories</span></a></li>
        <li id="banners"><a href="#"><i class="fa fa-picture-o"></i> <span>Home Banners</span></a></li>
        <li id="subscriber"><a href="<? echo site_url('administrator/subscribers') ?>"><i class="fa fa-envelope"></i> <span>Subscriber</span></a></li>
        <li class="header">ACCOUNT</li>
        <li id="password"><a href="#"><i class="fa fa-key"></i> <span>Change Password</span></a></li>
        <li id="logout"><a href="#"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="content">
    <section class="content">
    <? 
        // show message
        $msg = $this->session->flashdata('msg');
        $msg_type = $this->session->flashdata('msg_type');
        if (!empty($msg)){
            echo $this->mylib->create_msg($msg, $msg_type);
        }
        // show main content
        if (isset($content)) echo $content;
    ?>
    </section>
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- Bootstrap 3.3.6 -->
<script src="<? echo base_url('bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- DataTables -->
<script src="<? echo base_url('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<? echo base_url('plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<? echo base_url('plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<? echo base_url('dist/js/app.min.js') ?>"></script>
<!-- CK Editor -->
<script src="<? echo base_url('plugins/ckeditor/ckeditor.js') ?>"></script>
<!-- Select 2 for color -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<!-- include summernote js-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
     
<script src="<? echo base_url('assets/js/main.js') ?>"></script>

<script>
  $(function () {
    /*$("#datatables").DataTable({
      "columnDefs": [
        { "orderable": false, "targets": 0 }
      ],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });*/
    
    $("#<? echo $this->uri->segment(2) ?>").addClass("active");
    $('.texteditor').summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol']],
        ['insert', ['link', 'picture', 'video']]
      ]
    });
  });
</script>
</body>
</html>