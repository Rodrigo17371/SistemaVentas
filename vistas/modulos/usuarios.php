<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        administrar usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">administrar usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
        <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#modalAgregarUsuario">
              agregar usuario
            </i></button>

          
        </div>
        <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th># </th>
              <th>nombre</th>
              <th>usuario</th>
              <th>foto</th>
              <th>perfil</th>
              <th>estado</th>
              <th>acciones</th>
            </tr>
          </thead>
            
          <tbody>

          <?php
          
          $item=null;

          $valor=null;

          $usuarios=ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

          foreach ($usuarios as $key => $value) {
            
            echo '
            <tr>

          <td>1</td>
          <td>'.$value["nombre"].'</td>
          <td>'.$value["usuario"].'</td>
          <td><img src="'.$value["foto"].'"  width="40px"></td>
          <td>'.$value["perfil"].'</td>
          <td><button class="btn btn-success btn-xs">activado</button></td>
          <td>
            <div class="btn-group">

            <button class="btn btn-primary btnEditarUsuario"  idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario">

            <i class="fa fa-pencil"></i>
            </button>

            <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'">
            <i class="fa fa-times"></i>
            </button>
            </div>

          </td>
          </tr>
            
            ';


          }



          ?>

          </tbody>
          </table>
        </div>
      </div>
    </section>
    
  </div>
<!----MODAL AGREGAR USUARIO-->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">

        <div class="modal-dialog">

            <div class="modal-content">


                <form role="form" method="post" enctype="multipart/form-data">

                    <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->


                    <div class="modal-header" style="background:#3c8dbc; color:white">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Agregar usuario</h4>

                    </div>

                    <!--=====================================
                    CUERPO DEL MODAL
                    ======================================-->

                    <div class="modal-body">
                        <div class="box-body">

                            <!-- ENTRADA PARA EL NOMBRE -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                    <input type="text" class="form-control input-lg" name="nuevoNombre"
                                        placeholder="Ingresar nombre" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA EL USUARIO -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                    <input type="text" class="form-control input-lg" name="nuevoUsuario"
                                        placeholder="Ingresar usuario" id="nuevoUsuario" required>

                                </div>

                            </div>


                            <!-- ENTRADA PARA LA CONTRASEÑA -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                    <input type="password" class="form-control input-lg" name="nuevoPassword"
                                        placeholder="Ingresar contraseña" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                    <select class="form-control input-lg" name="nuevoPerfil">

                                        <option value="">Selecionar perfil</option>

                                        <option value="Administrador">Administrador</option>

                                        <option value="Especial">Especial</option>

                                        <option value="Vendedor">Vendedor</option>

                                    </select>

                                </div>

                            </div>

                            <!-- ENTRADA PARA SUBIR FOTO -->

                            <div class="form-group">

                                <div class="panel">SUBIR FOTO</div>

                                <input type="file" class="nuevaFoto" name="nuevaFoto">

                                <p class="help-block">Peso máximo de la foto 2MB</p>

                                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar"
                                    width="200px" height="200px">

                            </div>

                        </div>

                    </div>

                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                        <button type="submit" class="btn btn-primary">Guardar usuario</button>

                    </div>

                    <?php 

                    $crearUsuario=new ControladorUsuarios();
                    $crearUsuario->ctrCrearUsuario();
                    
                    
                    
                    ?>






                </form>

            </div>
        </div>
    </div>


                    <!--=====================================
                    MODAL EDITAR USUARIO
                    ======================================-->

    <div id="modalEditarUsuario" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">

          <form role="form" method="post" enctype="multipart/form-data">

                    <!--=====================================
                    CABEZA MODAL 
                    ======================================-->

                    <div class="modal-header" style="background:#3c8dbc; color:white">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>

                      <h4 class="modal-title">Editar usuario</h4>

                    </div>

                    <!--=====================================
                    CUERPO DEL MODAL 
                    ======================================-->

                    <div class="modal-body">
                      <div class="box-body">

                      

                    <!-- ENTRADA PARA EL NOMBRE -->

                    <div class="form-group">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                        <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre"
                            placeholder="Ingresar nombre" required>

                      </div>

                    </div>
                    <!-- ENTRADA PARA EL USUARIO -->

                    <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-key"></i></span>

                          <input type="text" class="form-control input-lg" id="editarUsuario"
                          name="editarUsuario" vlaue="" readonly>

                      </div>

                    </div>

                    <!-- ENTRADA PARA LA CONTRASEÑA -->

                    <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                    <input type="password" class="form-control input-lg" name="editarPassword"
                                        placeholder="Escriba la nueva contraseña" required>

                                    <input type="hidden" id="passwordActual" name="passwordActual">

                                </div>

                    </div>

                          <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                          <div class="form-group">

                          <div class="input-group">

                              <span class="input-group-addon"><i class="fa fa-users"></i></span>

                              <select class="form-control input-lg" name="editarPerfil">

                                  <option value="" id="editarPerfil"></option>

                                  <option value="Administrador">Administrador</option>

                                  <option value="Especial">Especial</option>

                                  <option value="Vendedor">Vendedor</option>

                              </select>

                          </div>

                          </div>

                          <!-- ENTRADA PARA SUBIR FOTO -->

                          <div class="form-group">

                            <div class="panel">SUBIR FOTO</div>

                            <input type="file" class="nuevaFoto" name="editarFoto">

                            <p class="help-block">Peso máximo de la foto 2MB</p>

                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarEditar"
                              width="200px" height="200px">

                            <input type="hidden" name="fotoActual" id="fotoActual">
                          </div>

                          </div>

                          </div>
                          
                          <!--=====================================
                          PIE DEL MODAL
                          ======================================-->

                          <div class="modal-footer">

                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                              <button type="submit" class="btn btn-primary">Modificar usuario</button>

                          </div>
          </form>

        </div>
      </div>
    </div>