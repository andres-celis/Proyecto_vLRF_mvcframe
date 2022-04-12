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
require "ExceptionConfig.php";
class extraer extends ConfigFileNotFoundException{
    // Properties
    
    public $locfile;
    public $valor;
    public $arraytot;
    public $arrayrdf;
    
    public function __construct($lf){
        $this->locfile = $lf;
        $this->valor=[];
        $this->arraytot=[];
        $this->arrayrdf=[];
    }
  
    // Methods
    public function extraerdata() {
        ### retorna un arreglo con la estructura del archivo xml, dentro de la cual se encuentran las etiquetas,los valores y los atributos.
        
        try{

        if(!file_exists($this->locfile)){
            throw new ConfigFileNotFoundException("El archivo no existe");
        }
        else{
        $xmlparser = xml_parser_create();

        $fp = fopen(strval($this->locfile), "r");
        $xmldata = fread($fp, filesize($this->locfile));
        
        // Parse XML data into an array
        xml_parse_into_struct($xmlparser,$xmldata,$values);
        
        xml_parser_free($xmlparser);
        $valor= $values;
        //print_r($values);
        fclose($fp);
      
        }
        }catch (ConfigFileNotFoundException $e){
        echo "Exception lanzada en el archivo solicitado: ".$e->getMessage();
        die();
        }
        catch(Exception $e){
            echo $e->getMessage();
            die();
        }
        $this->valor= $valor;
        return $valor; //Retorna el arbol xml;
    }
    public function getarrayunderkey($noderoot,$childnode) {
        //Genera un arreglo con los nodos que contienen los datatype asociados a la ontología.
        $valor=$this->valor; //Es el arreglo que contiene el arbol xml;
        
        for($i=0;$i<count($valor);$i++){
                  
            if($valor[$i]["tag"]==strval($childnode)){ //Obtiene los atributos y la ubicación del nodo hijo especificado
                
                array_push($this->arraytot,$i);
                }
            if($valor[$i]["tag"]==strval($noderoot)){ //Obtiene los atributos y la ubicación del nodo padre.
                  array_push($this->arrayrdf,$i);
                  }
            
        }
       
        return $this->arraytot; //Retorna un arreglo con la posición de todos los nodos especificados como hijos.
        
        
    }

    public function visualizeinfo(){
        //Muestra los nodos hijos en un arbol xml. 
        //tabulado con vs con ctrl+¿
        $arreglo=[];
        $arreglo1=[count($this->arraytot)-1];

        $arrayrdf=$this->arrayrdf;
        $valor=$this->valor;
        $arraytot= $this->arraytot;
        
        array_push($arraytot,$arrayrdf[1]);


        $k=0;

        
        for($i=0;$i<count($arraytot)-1;$i=$i+2){
        
        echo "<tr>";
        $inicio=$arraytot[$i]+1;
        $final=$arraytot[$i+1];
        
        
        
        
    
        /*Genera vinculos por referencía
        utilizando el método GET, el que recibe espera 
        encontrar los parametros de hello con un valor
        boleano, el parametro valor1 que corresponde a 
        la ubicación del nodo especificado por el arraytot(con
        tiene las posiciones de los nodos hijos(filas))
        y el valor2 que se utiliza para modificar nodos
        hijos de nodos hijos que lo llamamos columnas(como es
        una matriz es la etiqueta del nodo hijo que se quiere
        modificar),en este caso no se modifica nada porque es para 
        visualización por eso se coloca el valor de 0.*/
        
        
        for($j=$inicio;$j<$final;$j++){ 
            
        
            array_push($arreglo,$valor[$j]);

            }
            
            $arreglo1[$k]=$arreglo; //genera una matriz con los nodos hijos organizados para efectos de visualización.
            $arreglo=[];
            $k=$k+1;
            //Cerramos columna
            echo "</tr>";
        
            }
            

            return $arreglo1;
    }

    public function delete($i){ //Elimina un nodo hijo especificado por el valor $i.
        echo '<script>var opcion = confirm("Esta seguro que desea eliminar todo el , recuerde que una vez se elimina no lo puede recuperar");</script>';
        echo '<script>if(opcion=true){alert("nodo borrado")}else{window.location.href="Editarconobjetos.php"}</script>';
    /*Utilizando js se pregunta al usuario si esta seguro
     de borrar el nodo, en caso contrario retorna a la 
     visualización*/ 
    
    $i=($i/2);
   
    $doc1 = new DOMDocument; //Genera un documento de tipo Dom
    $doc1->load($this->locfile); //Ubicación del archivo xml original.

    $book = $doc1->documentElement; //Genera un elemento en el arbol de tipo doc1.

    
    $chapter = $book->getElementsByTagName('NamedIndividual')->item($i); //Especifica la etiqueta del nodo y la posición $i.
    $oldchapter = $book->removeChild($chapter); // Remueve un nodo hijo.

    try{
    $doc1->saveXML(); //Guarda el archivo xml
    $doc1->save($this->locfile);
    return true;
    }catch (ConfigFileNotFoundException $e){
        echo "Exception lanzada al eliminar el nodo: ".$e->getMessage();
    die();
    return false;
    }
    catch(Exception $e){
            echo $e->getMessage();
            die();
            return false;
    }
    

    }
  }

  ?>