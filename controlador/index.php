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
require_once("mvcframe/modelo/index.php");
class modeloController{
    private $model;
    static $datoalm;
    
    function __construct()
    {
        $this->model= new Modelo;
    }
    //Mostrar
    static function index(){
        $producto = new Modelo();
        $dato=$producto->mostrar("productos","1");
        modeloController::$datoalm=$dato;
        require_once("mvcframe/vista/index.php");
    }
    //INSERTAR
    static function nuevo(){
        require_once("mvcframe/vista/nuevo.php");
    }
    static function guardar(){
        
        $raw_data = file_get_contents('php://input');
        $jSON = json_decode($raw_data, true);




        $clean_string = str_replace('"',"",$raw_data);
        

        
        $filestr = (string) $clean_string;
        //print_r($filestr);

        $concat = '<?xml version="1.0"?>'.$filestr;
        //echo $concat;

        //echo $raw_data;

        $strnew= (string) $concat;
        //echo $strnew;
        //$strnew = str_replace('"',"",$strnew);

        
        $producto = new Modelo();
        $dato = $producto->insertar($strnew);
        header("location:".urlsite);
    }

    static function editar(){
        $fila=$_REQUEST['valor1'];
        $columna=$_REQUEST['valor2'];
        $producto = new Modelo();
        $dato=$producto->mostrar("ediccion",$fila);
        modeloController::$datoalm=$dato;
        require_once("mvcframe/vista/editar.php");
    }

    static function update(){
        $valori=$_POST["idvalor"];
        $valormuestra = $_POST["idvalor"] * 2;//Es el valor correspondiente

      $producto = new Modelo();
       echo '<script language="javascript">confirm("'.$valormuestra.'");</script>';
      $dato = $producto->actualizar($valormuestra);
      modeloController::$datoalm=$dato;
      header("location:".urlsite);
    }

    //ELIMINAR

    static function eliminar(){
        $fila=$_REQUEST['valor1'];
        
        $producto = new Modelo();
        $dato = $producto->eliminar($fila);
        modeloController::$datoalm=$dato;
        header("location:".urlsite);
    }

    static function eliminarnodohijo(){
        $fila=$_REQUEST['valor1'];
        $columna=$_REQUEST['valor2'];
        $producto = new Modelo();
        $dato = $producto->eliminarnodohijo($fila,$columna,'NamedIndividual');
        modeloController::$datoalm=$dato;
        header("location:index.php?m=editar&hello=true&valor1=".$fila."&valor2=0");
        
    }

    static function buscar(){
        $cadena=$_REQUEST['cadena'];
        $producto = new Modelo();
        $dato = $producto->buscar($cadena);
        modeloController::$datoalm=$dato;
        require_once("mvcframe/vista/buscador.php");
    }

    

    static function autenticar(){
        
        $nombre=$_REQUEST['name'];
        $contrasena=$_REQUEST['psw'];
        //print_r(modeloController::$datoalm);
        
     
        $producto = new Modelo();
        $oauth = $producto->autenticar($nombre,$contrasena);
        $boleano= "true";
        $dato=modeloController::$datoalm;
        $dato=$producto->mostrar("productos","1");
        
        require_once("mvcframe/vista/index.php");
    }




}