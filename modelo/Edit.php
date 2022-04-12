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
class edit{

    public $del=0;

    public function __construct($i,$arreglo1,$logfile){
        $this->arreglo1=$arreglo1; //Matriz con nodo padre, nodos hijos y los childnodes.
        $this->i=$i; //Valor de la fila o posición del nodo hijo.
        
        $this->logfile=$logfile; //ruta del archivo.
    }

    public function ediccion(){
        
  $i=$this->i;
  $arreglo1=$this->arreglo1;
  $i = $i / 2; //Se recorre de 2 en 2 por eso el dividido,
  //esto ocurre porqué es un intervalo que compone a los nodos
  //hijos, este va desde un valor inferior a uno superior en 
  //el arreglo.
  $array = array("fila"=>$i, "arreglo"=>$arreglo1);
  return $array;
  
    }
//Eliminar el nodo hijo del nodo hijo recibiendo el parametro
//columna y el nodo hijo.
    public function deletechildnode($columna,$node){
      chmod($this->logfile,  0777);
      $val=$this->i;
      
      $doc1 = new DOMDocument; //objeto de tipo DOM.
      
      $doc1->load($this->logfile);

      $book = $doc1->documentElement;
      //echo "valormuestra".$valormuestra."\n";
      $valormuestra=($val/2); //El intervalo va de un valor
      //inferior a uno superior donde tiene los atributos
      //un nodo hijo pero las filas van de 1 en 1, por lo
      //se divide en 2; es decir [2,10]--> estas son las posiciones
      //donde comienza y termina un nodo hijo,y las posiciones de
      //estos valores corresponden con el valor de fila mulitiplicado
      //por 2, es por esto que se divide en 2.
      
      $chapter = $book->getElementsByTagName($node); //Selecciona el nodo hijo del principal
      $new= $chapter->item($valormuestra)->childNodes->item($columna); 
      //print_r($new);
      //$oldchapter = $book->removeChild($new);
      $oldchapter=$new->parentNode->removeChild($new);

       //print_r($oldchapter);
      //print_r($book);
      $doc1->saveXML();
      $doc1->save($this->logfile);

      $this->del=$this->del+1;
      return $this->del;

    }

}

?>