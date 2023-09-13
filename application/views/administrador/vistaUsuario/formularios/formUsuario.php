
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>formulario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">llenar el formulario de usuarios</h3>
            </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                    echo form_open_multipart('usuarios/agregarbd');
                ?>   

                    <div class="form-group">

                        <label class="form-label" >Nombre:</label>
                        <input type="text" class="form-control" placeholder="ingrese su nombre" name="NAME">
                        <label class="form-label">Primer apellido:</label>
                        <input class="form-control" type="text" placeholder="ingrese su apellido" name="apellido1">
                        <label class="form-label" >Segundo apellido:</label>
                        <input type="text" class="form-control" placeholder="ingrese su apellido" name="apellido2">
                        <label class="form-label" >Carnet Identidad:</label>
                        <input type="text" class="form-control" placeholder="ingrese su carnet identidad" name="CI">
                        <div class="form-group">
                          <label for="">Rol:</label>  
                            <select class="form-control" name="tipo" required>
                                <option value="" disabled selected >Seleccionar rol</option>
                                <option value="administrador" >administrador</option>
                                <option value="empleado">empleado</option>
                            </select>
                        </div>
                        <label class="form-label" >Direccion:</label>
                        <input type="text" class="form-control" placeholder="ingrese la dirección" name="mapa">
                        <label class="form-label">Telefono:</label>
                        <input type="text" class="form-control" placeholder="ingrese el teléfono" name="celular">
                    </div>
                    <button class="btn btn-success" type="submit">Registrar Usuario</button>

                <?php
                    echo form_close();
                ?>   
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
                
            </div>
        </div>
    </div>