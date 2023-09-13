<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>lista de proveedores</h1>
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

            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">proveedores activos</h3><br>
                
            <a href="<?php echo base_url();?>index.php/proveedor/agregarProvLte"><!--NECESARIO PARA CRUD boton para agregar categoria de pasa al controlador-->
                <button type="button" class="btn btn-primary">
                    añadir proveedor
                </button>
            </a>

            <!--LISTA DE DESHABILITADO-->
            <a href="<?php echo base_url();?>index.php/proveedor/deshabilitados"><!--NECESARIO PARA CRUD boton para agregar categoria de pasa al controlador-->
                <button type="button" class="btn btn-success">
                    ver lista de deshabilitados
                </button>
            </a>
            <br>
            <h3>
              <!--muestra las variables de session-->
              login: <?php echo $this->session->userdata('login');?><br>
              id: <?php echo $this->session->userdata('idusuario');?><br>
              tipo: <?php echo $this->session->userdata('rol');?><br>
          </h3>
              </div>

              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>n°</th>
                    <th>nombre</th>
                    <th>direccion</th>
                    <th>telefono</th>
                    <th>fechaRegistro</th>
                    <th>modificar</th>
                    <th>Eliminar</th>
                    
                  </tr>
                  </thead>
                  <tbody>
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
                            <td><?php echo $row->fechaRegistro; ?></td>
                            <!--COLUMNA MODIFICAR-->
                            <td class="text-center">
                                    <?php
                                        echo form_open_multipart('proveedor/modificar');//manda al controlador categoria metoodo eliminarbd
                                    ?>
                                        <input type="hidden" name="idproveedor" value="<?php echo $row->idProveedor;?>">
                                        <button type="submit" class="btn btn-outline-warning">modificar</button>
                                    <?php
                                        echo form_close();
                                    ?>
                            </td>
                            <!--COLUMNA ELIMINAR SOFTDELETE-->
                            <td class="text-center">
                                    <?php
                                        echo form_open_multipart('proveedor/deshabilitarbd');//manda al controlador categoria metoodo deshabilitarbd
                                    ?>
                                        <input type="hidden" name="idproveedor" value="<?php echo $row->idProveedor;?>">
                                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                    <?php
                                        echo form_close();
                                    ?>
                            </td>
                        </tr>
                        
                        <?php
                                $indice++;
                            }
                        ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>n°</th>
                    <th>nombre</th>
                    <th>direccion</th>
                    <th>telefono</th>
                    <th>fechaRegistro</th>
                    <th>modificar</th>
                    <th>Eliminar</th>
                  </tr>
                  </tfoot>
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