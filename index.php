<?php
//Universidad del cauca: Proyecto vLRF
//El presente código permite visualizar,editar y alimentar la base de conocimiento desarrollada en el proyecto vLRF y que se encuentra en formato xml.
//El presente proyecto es ejecutado por la universidad del cauca.
//Este código es propiedad de la universidad del cauca y es ejecutado en el proyecto vLRF. Todos los derechos son atribuidos al mismo.
//autores: @Luis Miguel Castañeda Herrera; @Andres Fernando Celis Vélez
/*Este archivo es parte de la HEVABC(Herramienta de edición, visualización y alimentación base de conocimiento).



HEVABC es Software Libre: puede redistribuirlo y/o modificarlo bajo los términos de la Licencia Pública General de GNU publicada 
por la Free Software Foundation versión 3.

HEVABC se distribuye SIN NINGUNA GARANTÍA; ni siquiera la garantía implícita de COMERCIALIZACIÓN o ADECUACIÓN A UN PROPÓSITO PARTICULAR. 
Consulte la Licencia Pública General de GNU para más detalles: https://www.gnu.org/licenses/gpl-3.0.html
*/
require_once("config.php");
require_once("controlador/index.php");
session_set_cookie_params(3600,"/");
session_start();
error_reporting(E_ALL);  //Error/Exception engine,always use

ini_set('ignore_user_errors',TRUE); //always use true;

ini_set('display_errors',FALSE); //Error/Exception display,use

ini_set('log_errors',TRUE);

ini_set("error_log","php-error.log");
error_log("Hello,errors!" );


if(isset($_GET['m'])):
    
    
    
    if(method_exists("modeloController",$_GET['m'])):
        modeloController::{$_GET['m']}();
    endif;  
    
    else:    
    modeloController::index();
endif;


if(isset($_POST['m'])):
    
    if(method_exists("modeloController",$_POST['m'])):
        modeloController::{$_POST['m']}();
    endif;  
endif;  

 


?>