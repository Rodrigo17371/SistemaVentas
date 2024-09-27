<?php

class ControladorUsuarios{
    
    /*
    MOSTRAR USUARIOS
    */
    static public function ctrMostrarUsuarios(){
        
        $tabla="usuarios";
        
        $respuesta=ModeloUsuarios::mdlMostrarUsuarios($tabla);

        return $respuesta;


    }

    /*
    REGISTRAR USUARIOS
    */

    static public function ctrCrearUsuario(){


        if(isset($_POST["nuevoNombre"])){



             /*=============================================
				VALIDAR IMAGEN
				=============================================*/

                $ruta="";


                if(isset($_FILES["nuevaFoto"]["tmp_name"])){


                    list($ancho , $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho=500;
                    $nuevoAlto=500;

                       /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/


                    $directorio="vistas/img/usuarios/".$_POST["nuevoUsuario"];
                    
                    
                    mkdir($directorio,0755);

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                    if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio=mt_rand(100 , 999);

                        $ruta="vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagejpeg($destino,$ruta);


                    }


                    if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}
          
                }

                    $tabla="usuarios";


                    $encriptar=crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                    $datos=array(

                        "nombre"=>$_POST["nuevoNombre"],
                        "usuario"=>$_POST["nuevoUsuario"],
                        "password"=>$encriptar,
                        "perfil"=>$_POST["nuevoPerfil"],
                        "foto"=>$ruta);



                        $respuesta=ModeloUsuarios::mdlIngresarUsuario($tabla,$datos);


                        if($respuesta=="ok"){

                               echo "<script>

                                Swal.fire({
                                        title: 'se guardo correctamente el usuario',
                                        icon: 'success',
                                        }).then((result) => {
                                                                
                                            window.location = 'usuarios';
                                                                
                                        })
                                                
                                </script>";






                        }
                        
                 
                        




                        
                        
                        
                        {


                    }


        }







    }
}




?>