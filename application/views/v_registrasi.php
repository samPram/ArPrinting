<!DOCTYPE html>
<html>

<!-- Mirrored from coderthemes.com/ubold_2.1/dark_leftbar/page-signup-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Oct 2016 02:53:01 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
  <meta name="author" content="Coderthemes">

  <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon_1.ico">

  <title>UD Nafi</title>

  <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

  <script src="<?= base_url(); ?>assets/js/modernizr.min.js"></script>
  <script>
    // (function(i, s, o, g, r, a, m) {
    //   i['GoogleAnalyticsObject'] = r;
    //   i[r] = i[r] || function() {
    //     (i[r].q = i[r].q || []).push(arguments)
    //   }, i[r].l = 1 * new Date();
    //   a = s.createElement(o),
    //     m = s.getElementsByTagName(o)[0];
    //   a.async = 1;
    //   a.src = g;
    //   m.parentNode.insertBefore(a, m)
    // })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');

    // ga('create', 'UA-69506598-1', 'auto');
    // ga('send', 'pageview');
  </script>

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php if ($this->session->flashdata('message')) {
          echo $this->session->flashdata('message');
        }
        ?>
      </div>
    </div>
  </div>

  <div class="account-pages"></div>
  <div class="clearfix"></div>


  <div class="container-alt">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="wrapper-page signup-signin-page">
          <div class="card-box">
            <div class="panel-heading">
              <h3 class="text-center"> Welcome to <strong class="text-custom">UD Nafi</strong></h3>
            </div>

            <div class="panel-body">
              <div class="row">
                <div class="col-xs-12">
                  <div class="p-20">
                    <h4><b>Sign In</b></h4>
                    <form class="form-horizontal m-t-20" action="<?= base_url(); ?>Auth/registrasi" method="POST">
                      <div class="form-group ">
                        <div class="col-xs-12">
                          <input class="form-control" type="text" name="username" value="<?= set_value('username'); ?>" placeholder="Username">
                          <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-xs-12">
                          <input class="form-control" type="password" name="password" placeholder="Password">
                          <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-xs-12">
                          <input class="form-control" type="password" name="re_password" placeholder="Repeat Password">
                          <?= form_error('re_password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      </div>

                      <div class="form-group text-right m-t-20">
                        <div class="col-xs-12">
                          <button class="btn btn-pink text-uppercase waves-effect waves-light w-sm" type="submit">
                            Log In
                          </button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>

              </div>

            </div>
          </div>

        </div>
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

<!-- Mirrored from coderthemes.com/ubold_2.1/dark_leftbar/page-signup-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Oct 2016 02:53:01 GMT -->

</html>