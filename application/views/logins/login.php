<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminLte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminLte/dist/css/adminlte.min.css">

  <!--BOOTSTRAP-->
  <!--<link rel="stylesheet" href="<?php //echo base_url();?>bootstrap/css/bootstrap.css">
    <script src="<?php// echo base_url();?>bootstrap/js/bootstrap.js"></script>-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">Licoreria <b>"El Tabernero"</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

    <?php
    //variable mensaje que llega desde usuario/index array mensaje
      switch($mensaje)
      {//mensaje para el usuario en caso de error de autentificacion
        case '1':
          $respuesta="error de ingreso";
          $clase = "primary";
          break;
        case '2':
          $respuesta="acceso invalido";
          $clase = "danger";
          break;
        case '3':
          $respuesta="gracias por ingresar";
          $clase = "success";
          break;
        default:
          $respuesta = "ingresar usuario y contraseña";
          $clase = "warning";
          break;

      }
    ?>

      <p class="login-box-msg text-<?php echo $clase;?>"><?php echo $respuesta?></p>

     <!-- <h3>mensaje:</h3>
    <?php //echo $mensaje?>-->


      <?php
        echo form_open_multipart('usuarios/validarUsuario', array('id'=>'form1','class'=>'needs-validation','method'=>'POST'));
      ?>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="ingrese su nombre usuario" name="login" required autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                recordar cuenta
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-outline-primary btn-block">iniciar session</button>
          </div>
          <!-- /.col -->
        </div>

      <?php
        echo form_close();
      ?>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>adminLte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>adminLte/dist/js/adminlte.min.js"></script>

<!--BOOTSTRAP-->
<!--<script src="<?php echo base_url();?>bootstrap/js/bootstrap.bundle.min.js"></script>-->
</body>
</html>
