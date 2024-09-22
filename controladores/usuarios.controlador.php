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


}




?>