<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>registro de categoria</h1>
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
                <!--LISTA DE DESHABILITADO-->
            <a href="<?php echo base_url();?>index.php/proveedor/lista"><!--NECESARIO PARA CRUD boton para agregar categoria de pasa al controlador-->
                <button type="button" class="btn btn-success">
                    ver lista de habilitados
                </button>
            </a>
                <h1>Lista de proveedores deshabilitados</h1>

                <table class="table">
                    <tr>
                        <th>n°</th>
                        <th>nombre</th>
                        <th>direccion</th>
                        <th>telefono</th>
                        <th>estado</th>
                        <th>fecha de registro</th>
                        <th>habilitar</th>
                    </tr>

                    <?php
                    $indice=1;
                        foreach($proveedor->result() as $row)//la variable categoria tiene que se igual al controlador categoria linea 9
                        {
                            ?>
                            <tr>
                                <td><?php echo $indice?></td>
                                <td><?php echo $row->nombre; ?></td>
                                <td><?php echo $row->direccion; ?></td>
                                <td><?php echo $row->telefono; ?></td>
                                <td><?php echo $row->estado; ?></td>
                                <td><?php echo $row->fechaRegistro; ?></td>
                                
                                <!--COLUMNA ELIMINAR SOFTDELETE-->
                                <td>
                                    <?php
                                        echo form_open_multipart('proveedor/habilitarbd');//manda al controlador categoria metoodo habilitarbd
                                    ?>
                                        <input type="hidden" name="idproveedor" value="<?php echo $row->idProveedor?>">
                                        <button type="submit" class="btn btn-outline-success">HABILITAR</button>
                                    <?php
                                        echo form_close();
                                    ?>
                                </td>
                            </tr>
                            <?php
                            $indice++;
                        }
                    ?>
                </table>
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










<div class="container">
        <div class="row">
            <div class="col-md-12">

            

            </div>
        </div>
    </div>