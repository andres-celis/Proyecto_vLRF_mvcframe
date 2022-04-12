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
class enviar{

public function __construct($arraytot,$valor){
    
$this->arraytot=$arraytot;
$this->valor=$valor;
$this->inicio= 0;
$this->final=0;
$this->almacenar=[];
$this->acum=0;
$this->arraytotal=[];
$this->valorcom="";
$this->valormuestra=0;

}

public function definir($j){
   
    $valor=$this->valor;
    if (array_key_exists("value", $valor[$j])) {
            $this->valorcom=$valor[$j]["value"];
    } else {if (array_key_exists("RDF:RESOURCE", $valor[$j]["attributes"])) {
            $this->valorcom=$valor[$j]["attributes"]["RDF:RESOURCE"];
        }
        if (array_key_exists("RDF:DATATYPE", $valor[$j]["attributes"])) {
            $this->valorcom=$valor[$j]["attributes"]["RDF:DATATYPE"];
        }
    }

}

public function inputs($valormuestra){ //Obtiene los inputs
    //ingresados por el usuario.
    $this->valormuestra=$valormuestra;
    $arraytot=$this->arraytot;
    $inicio = $arraytot[$valormuestra] + 1;
    $this->inicio=$inicio;
  $final = $arraytot[$valormuestra + 1] - 1;
  $this->final=$final;
  $diferencia = $final - $inicio;
  $almacenar=$this->almacenar;

  for ($k = 0; $k <$diferencia; $k++) {
      
      $cadena = htmlspecialchars($_POST['iden' . strval($k)]);
      
      array_push($almacenar, $cadena);
    $this->almacenar=$almacenar;
  }
  
 
 
  $arrayadd=[];//Arreglo para almacenar temporalmente las
  //llaves y los valores de los inputs ingresados.
  $arraytotal=[]; //Arreglo completo con los valores de todos
  //los inputs y sus llaves.
  foreach ($_POST as $key => $value) {
      //echo htmlspecialchars($key);
      
      //echo substr(htmlspecialchars($key), 0,strpos('/',htmlspecialchars($key)));
      if(substr(htmlspecialchars($key),0,strpos(htmlspecialchars($key),'/'))=="Video_recurso(solo_para_competencías)"){
          //print_r("Entro");
          $arrayadd["key"]="HASVIDEORESOURCE";
          $arrayadd["value"]=htmlspecialchars($value);
          //print_r($arrayadd);
          array_push($arraytotal,$arrayadd);
      }
      if(substr(htmlspecialchars($key),0,strpos(htmlspecialchars($key),'/'))=="Evidencía_de_aprendizaje_competencía(solo_para_competencías)"){
          //print_r("Entro");
          $arrayadd["key"]="COMPETENCYLEARNINGEVIDENCE";
          $arrayadd["value"]=htmlspecialchars($value);
          //print_r($arrayadd);
          array_push($arraytotal,$arrayadd);
      }
      if(substr(htmlspecialchars($key),0,strpos(htmlspecialchars($key),'/'))=="Palabra_clave_competencía(solo_para_competencías)"){
          //print_r("Entro");
          $arrayadd["key"]="COMPETENCYKEYWORD";
          $arrayadd["value"]=htmlspecialchars($value);
          //print_r($arrayadd);
          array_push($arraytotal,$arrayadd);
      }
      if(substr(htmlspecialchars($key),0,strpos(htmlspecialchars($key),'/'))=="Tema_de_competencía(solo_para_competencías)"){
          //print_r("Entro");
          $arrayadd["key"]="COMPETENCYTOPIC";
          $arrayadd["value"]=htmlspecialchars($value);
          //print_r($arrayadd);
          array_push($arraytotal,$arrayadd);
      }
      if(substr(htmlspecialchars($key),0,strpos(htmlspecialchars($key),'/'))=="Palabra_clave_video(solo_para_videos)"){
          //print_r("Entro");
          $arrayadd["key"]="VIDEORESOURCEKEYWORD";
          $arrayadd["value"]=htmlspecialchars($value);
          //print_r($arrayadd);
          array_push($arraytotal,$arrayadd);
      }
      
  
  }

  $this->arraytotal=$arraytotal;
  
  return $this->arraytotal;   
}

public function onchange(){//Verifica si hay cambios en la
    //información anteriormente consignada en el archivo xml.
    $diferencia=$this->final-$this->inicio;
    $inicio=$this->inicio;
    $valor=$this->valor;
    $almacenar=$this->almacenar;
    
  $acum=0;
  for ($k = 0; $k < $diferencia; $k++) {
    
      $j = $inicio + $k;
      //echo $valor[$j]["tag"];
      if (array_key_exists("value", $valor[$j])) {
          
          if (strcmp($valor[$j]["value"], strval($almacenar[$k])) != 0) {
               
              echo "<tr>";
              //echo "<td style=padding:3px; background-color:#F5D0A9;>"."<a id=var".$i." "."href='Editar.php?hello=true&valor1=".$i."'>Editar</a>"."<a id=var".$i." "."href='Editar.php?hellodel=true&valor1=".$i."'>Eliminar</a>";

              //print_r($k);
              //print_r($almacenar[$k]);
              $valor[$j]["value"] = $almacenar[$k];
              $acum=$acum+1;
              //echo $acum;
          }
      } else {
          //print_r($valor[$j]);
          if (array_key_exists("RDF:RESOURCE", $valor[$j]["attributes"])) {
            
              if (strcmp($valor[$j]["attributes"]["RDF:RESOURCE"], strval($almacenar[$k])) != 0) {
                     
                  $valor[$j]["attributes"]["RDF:RESOURCE"] == $almacenar[$k];
                  $acum=$acum+1;
                  //echo $acum;
              }
          }
          if (array_key_exists("RDF:DATATYPE", $valor[$j]["attributes"])) {
             
              if (strcmp($valor[$j]["attributes"]["RDF:DATATYPE"], strval($almacenar[$k])) != 0) {
                     
                  //print_r($k);
                  //print_r($almacenar[$k]);
                  $valor[$j]["attributes"]["RDF:DATATYPE"] = $almacenar[$k];
                  $acum=$acum+1;
                  //echo $acum;
              }
          }
      }
  }

  $this->valor=$valor;
  $this->acum=$acum;

  return $valor;

}

public function finalizar($locfile,$del=0){//Borra el nodo
    //hijo que se modifico y coloca el nuevo.
    // echo '<script language="javascript">alert("valormuestra: '.$valormuestra.'";</script>';
    $valormuestra=$this->valormuestra;
echo '<script language="javascript">alert('.$valormuestra.');</script>';
    print_r($this->arraytotal);
   
    if($this->acum>0 or count($this->arraytotal)>0 or $del>0){
        
        chmod($locfile,  0777);
        //echo "valori: ".$valori;
        $doc1 = new DOMDocument;
        
        $doc1->load($locfile);
      
        $book = $doc1->documentElement;
        echo '<script language="javascript">alert("valormuestra antes de dividir: '.$valormuestra.'");</script>';
        //echo "valormuestra".$valormuestra."\n";
        $valormuestra=($valormuestra/2);
        echo '<script language="javascript">alert("valor muestra despues: '.$valormuestra.'");</script>';
        $chapter = $book->getElementsByTagName('NamedIndividual')->item($valormuestra);
        $oldchapter = $book->removeChild($chapter);
      
        //print_r($oldchapter);
        //print_r($book);
        $doc1->saveXML();
        $doc1->save($locfile);
      
      
      
      
      
        $documento1 = new DOMDocument();
        $documento1->load($locfile);
      
        $documento2 = new DOMDocument();
        $documento2->load('mvcframe/modelo/archivoejemplo.xml');
      
      // get 'res' element of document 1
        $add = $documento1->getElementsByTagName('RDF')->item(0); //edited res - items
      
      // iterate over 'item' elements of document 2
        $nodototal = $documento2->getElementsByTagName('NamedIndividual');
      
        for ($i = 0; $i < $nodototal->length; $i ++) {
            $nodoinicial2 = $nodototal->item(0);
            //print_r($nodoinicial2);
            // import/copy item from document 2 to document 1
            echo '<script language="javascript">alert('.print_r($nodoinicial2).');</script>';
            $nodoinicial1 = $documento1->importNode($nodoinicial2, true);
      
      
            // append imported item to document 1 'res' element
            $add->appendChild($nodoinicial1);
            //;
      
            }
            $documento1->saveXML();
            $documento1->save($locfile); //edited -added saving into xml file
            echo '<script language="javascript">confirm("El archivo se edito");</script>';
            echo '<script language="javascript">window.location.href="/index.php";</script>';
        }
        else{
        echo '<script language="javascript">alert("No modifico nada");</script>';
        echo '<script language="javascript">window.history.back();</script>';
        //echo '<input type="submit" value="regresar">';
       }
}


    
}









?>