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
        

        if(isset($_POST["nuevoNombre"]))

          
        /*VALIDAR IMAGEN*/

        $ruta="";

        if(isset($_FILES["nuevaFoto"]["top_name"])){
            
            list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["top_name"]);

            $nuevoAncho=500;
            $nuevoAlto=500;

            /*DIRECTORIO DONDE SE GUARDARA LA FOTO DEL USUARIO*/

            $directorio="vistas/img/usuarios/".$_POST["nuevoNombre"];
            
            mkdir($directorio,0755);

            /*TIPO DE IMAGEN */

            if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){
                /* GUARDAR LA IMAGEN EN EL DIRECTORIO*/

                $aleatorio=mt_rand(100,999);
                $ruta="vistas/img/usuarios/".$_POST["nuevoNombre"]."/".$aleatorio.".jpg";

                $origen= imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                $destino= imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                imagejpeg($destino,$ruta);

            }

            if($_FILES["nuevaFoto"]["type"] == "image/png"){
                /* GUARDAR LA IMAGEN EN EL DIRECTORIO*/

                $aleatorio=mt_rand(100,999);
                $ruta="vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                $origen= imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                $destino= imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                imagepng($destino,$ruta);


            }
        }
        $tabla="usuarios";

        $encriptar=crypt($_POST["nuevoPassword"],'$2a$07$usesomesillystringforsalt$');

        $datos=array(
            "nombre"=>$_POST["nuevoNombre"],
            "usuario"=>$_POST["nuevoUsuario"],
            "password"=>$encriptar,
            "perfil"=>$_POST["nuevoPerfil"],
            "foto"=>$ruta);

            $respuesta=ModeloUsuarios::mdlIngresarUsuarios($tabla,$datos);

            if($respuesta=="ok"){
                echo "<script?
                
                Sawl.fire({
                        title: 'Se guardo correctamente',
                        icon: 'Success',
                        }).then((result) => {

                            window.location = 'usuarios';
                        })
                
                
                </script>";
            }
        
    }
}




?>