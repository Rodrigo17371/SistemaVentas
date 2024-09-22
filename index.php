<?php 

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";

require_once "modelo/usuarios.modelo.php";

$plantilla= new ControladorPlantilla();
$plantilla-> ctrPlantilla();

?>