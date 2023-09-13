
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>registro de Proveedor</h1>
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
                <h3 class="card-title">llenar el formulario</h3>
            </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                    echo form_open_multipart('proveedor/agregarbd');
                ?>   

                    <div class="form-group">
                        <label class="form-label" >proveedor:</label>
                        <input type="text" class="form-control" placeholder="ingrese la categoria" name="NAME">
                        <label class="form-label">Direccion:</label>
                        <input class="form-control" type="text" placeholder="ingrese la descripcion" name="DESCRIPCION">
                        <label class="form-label">telefono:</label>
                        <input class="form-control" type="text" placeholder="ingrese el telefono" name="CELULAR">
                    </div>
                    <button class="btn btn-outline-success" type="submit"><b>agregar proveedor</b></button>

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