<!DOCTYPE html>
<html>

<!-- Mirrored from coderthemes.com/ubold_2.1/dark_leftbar/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Oct 2016 02:53:01 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
  <meta name="author" content="Coderthemes">

  <link rel="shortcut icon" href="assets/images/favicon_1.ico">

  <title>UD Nafi</title>

  <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->


  <script src="<?= base_url(); ?>assets/js/modernizr.min.js"></script>

</head>

<body>
  <div class="account-pages"></div>
  <div class="clearfix"></div>
  <div class="wrapper-page">
    <div class=" card-box">
      <div class="panel-heading">
        <h3 class="text-center"> Sign In to <strong class="text-custom">UD Nafi</strong> </h3>
      </div>

      <div class="panel-body">
        <form class="form-horizontal m-t-20" action="<?php echo base_url() . 'Auth' ?>" method="post">

          <div class="form-group">
            <div class="col-xs-12">
              <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>" autofocus>
              <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-12">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password">
              <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>

          <div class="col-md-12" style="text-align: center; color: #E74C3C; font: bold;">
            <?= $this->session->flashdata('message'); ?>
          </div>

          <div class="form-group text-center m-t-40">
            <div class="col-xs-12">
              <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">Log in</button>
            </div>
          </div>
        </form>

      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 text-center">
        <p>Don't have an account? <a href="<?= base_url(); ?>Auth/registrasi" class="text-primary m-l-5"><b>Sign Up</b></a></p>

      </div>
    </div>

  </div>


  <script>
    var resizefunc = [];
  </script>

  <!-- jQuery  -->
  <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/detect.js"></script>
  <script src="<?= base_url(); ?>assets/js/fastclick.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.slimscroll.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.blockUI.js"></script>
  <script src="<?= base_url(); ?>assets/js/waves.js"></script>
  <script src="<?= base_url(); ?>assets/js/wow.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.nicescroll.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>


  <script src="<?= base_url(); ?>assets/js/jquery.core.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.app.js"></script>

</body>

<!-- Mirrored from coderthemes.com/ubold_2.1/dark_leftbar/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Oct 2016 02:53:01 GMT -->

</html>