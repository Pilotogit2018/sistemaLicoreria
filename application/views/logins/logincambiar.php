<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cambiar Contraseña</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminLte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminLte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!--<a>Cambiar</b>Contraseña</a>-->
    <img src="<?php echo base_url();?>adminLte/img/club-astros-kwan-sin-fondo.jpg" class="avatar" alt="Avatar Image" width="300px" height="300px">
      <h1>Cambiar Contraseña</h1>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

     


<!--<h1>msg:</h1>-->
        
    <?php 
    foreach($infousuario->result() as $row)
    {
echo form_open_multipart('usuarios/modificar2');//cambiar a confirmarModicacionContra
    ?>

      <!-- <form id="form1" class="needs-validation" action="../../index3.html" method="post"> -->
      <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario;?>">
        <!--<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="login">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>-->

        <label>Contraseña Actual:</label> <br>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <label>Nueva Contraseña:</label> <br>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="Password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <label>Repita Contraseña Nueva:</label> <br>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="Password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <!--<div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recuerdame
              </label>
            </div>-->
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Modificar</button>
          </div>
          <!-- /.col -->
        </div>
      <!-- </form> -->
<?php 
echo form_close();
}
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
</body>
</html>

