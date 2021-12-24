
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>

 <?php $this->load->view("admin/_partials/css.php"); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Tiket KAI</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Selamat datang, Silakan Login ! </p>

    <?= $this->session->flashdata('message'); ?>

       <form class="user" action="<?= base_url('login'); ?>" method="POST">
         <div class="form-group">
           <input type="text" class="form-control form-control-user"  name="username"  placeholder="Username" autocomplete="off" required>
           <small class="text-danger"><?=form_error('username'); ?></small>
         </div>
         <div class="form-group">
           <input type="password" class="form-control form-control-user"  name="password" placeholder="Password" autocomplete="off" required>
         </div>
         <button type="submit" class="btn-primary btn-block "> Login </button>
       </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php  $this->load->view("admin/_partials/js.php"); ?>
</body>
</html>
