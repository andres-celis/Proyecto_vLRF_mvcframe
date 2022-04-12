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

class search{

    function __construct($arraytot,$valor,$cadena){
        $this->arraytot=$arraytot;
        $this->valor=$valor;
        $this->cadena=$cadena;
    }

    public function buscar(){
        
        

        $arraytot=$this->arraytot;
        $valor=$this->valor;
        $cadena=$this->cadena;
        $vector=[];
        
        
        try{
        for ($i = 0; $i < count($arraytot) - 1; $i = $i + 2) {
           
            
            
            $inicio = $arraytot[$i] + 1;
            $final = $arraytot[$i + 1];
           
            
        
            for ($j = $inicio; $j < $final; $j++) {
                
                
                

                if (array_key_exists("value", $valor[$j])) {
                    

                    if (strpos($valor[$j]["value"], $cadena) or stristr($valor[$j]["value"], $cadena))

                    //if($valor[$j]["value"]== $cadena || $valor[$j]["value"]== strtoupper($cadena) || $valor[$j]["value"]== strtolower($cadena) || $valor[$j]["value"]== ucfirst($cadena))
                    {
                        $array = array("fila"=>$i, "arreglo"=>$valor[$j]["value"]);
                        array_push($vector,$array);
                       
                        
                        
                    }
                } else {
                    //print_r($valor[$j]);
                    if (array_key_exists("RDF:RESOURCE", $valor[$j]["attributes"])) {
                        if (strpos($valor[$j]["attributes"]["RDF:RESOURCE"], $cadena) or stristr($valor[$j]["attributes"]["RDF:RESOURCE"], $cadena)) {
                            $array = array("fila"=>$i, "arreglo"=>$valor[$j]["attributes"]["RDF:RESOURCE"]);
                            array_push($vector,$array);
                            
                            
                            
                        }
                    }
                    if (array_key_exists("RDF:DATATYPE", $valor[$j]["attributes"])) {
                        if (strpos($valor[$j]["attributes"]["RDF:DATATYPE"], $cadena) or stristr($valor[$j]["attributes"]["RDF:DATATYPE"], $cadena)) {
                            $array = array("fila"=>$i, "arreglo"=>$valor[$j]["attributes"]["RDF:DATATYPE"]);
                            array_push($vector,$array);
                            
                            
                        }
                    }
                }
                //Pintamos el cuadro

                


            }

            //Cerramos columna
 

        }
        }catch(Exception $e){
            echo $e->getMessage();
            die();
        }
        
        
        
        return $vector;
    }

}




?>

