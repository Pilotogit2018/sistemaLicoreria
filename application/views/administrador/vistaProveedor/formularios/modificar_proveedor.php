
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>registro de provedores</h1>
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
                foreach($infoProveedor->result() as $row)//variable infoCategoria vieene de controlador categoria 
                {

                    echo form_open_multipart('proveedor/modificarbd');
            ?>   

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="idproveedor" value="<?php echo $row->idProveedor;?>"><!--se recupera los datos para editar NECESARIO--> 
                            <label class="form-label">nombre:</label>
                            <input type="text" class="form-control" placeholder="ingrese la categoria" name="NAME" value="<?php echo $row->nombre;?>"><!--se recupera los datos para editar NECESARIO-->
                            <label class="form-label">Direccion:</label>
                            <input class="form-control" type="text" placeholder="ingrese la dirección" name="DIRECCION" value="<?php echo $row->direccion;?>">
                            <label class="form-label">telefono:</label>
                            <input class="form-control" type="text" placeholder="ingrese el teléfono" name="CELULAR" value="<?php echo $row->telefono;?>">
                        </div>
                        <button class="btn btn-success" type="submit">modificar proveedor</button>

                    <?php
                    echo form_close();
                }
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

