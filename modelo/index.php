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
require "mvcframe/modelo/Extraer.php";
require "mvcframe/modelo/Edit.php";
require "mvcframe/modelo/update.php";
require "mvcframe/modelo/create.php";
require "mvcframe/modelo/competencia.php";
require "mvcframe/modelo/contenido.php";
require "mvcframe/modelo/enviar.php";
require "mvcframe/modelo/search.php";


class Modelo{
    private $Modelo;
    private $baseconocimiento;
    private $arreglo1=[];
    private $del=0;
    
    public function __construct(){
        $this->Modelo= array();
        $this->baseconocimiento=new extraer("mvcframe/modelo/archivonewejemplo.xml");
        
    }

    public function insertar($strnew){
        $file2 = fopen("mvcframe/modelo/archivotemp.xml", "w");

        fwrite($file2, $strnew. PHP_EOL);

        fclose($file2);
        chmod("mvcframe/modelo/archivotemp.xml",  0777);
        chmod("mvcframe/modelo/archivonewejemplo.xml",  0777);

        $documento1 = new DOMDocument();
        $documento1->load('mvcframe/modelo/archivonewejemplo.xml');

        $documento2 = new DOMDocument();
        $documento2->load('mvcframe/modelo/archivotemp.xml');

        // get 'res' element of document 1
        $add = $documento1->getElementsByTagName('RDF')->item(0); //edited res - items

        // iterate over 'item' elements of document 2
        $nodototal = $documento2->getElementsByTagName('NamedIndividual');
        for ($i = 2; $i < $nodototal->length; $i ++) {
        $nodoinicial2 = $nodototal->item($i);

        // import/copy item from document 2 to document 1
        $nodoinicial1 = $documento1->importNode($nodoinicial2, true);

        // append imported item to document 1 'res' element
        $add->appendChild($nodoinicial1);

        }
        $documento1->save('mvcframe/modelo/archivonewejemplo.xml');
    }
    
    public function mostrar($tabla,$condicion){
        $valor=$this->baseconocimiento->extraerdata();
        $arraytot=$this->baseconocimiento->getarrayunderkey("RDF:RDF","OWL:NAMEDINDIVIDUAL");
        
        $this->arreglo1=$this->baseconocimiento->visualizeinfo();
        
        

        if($tabla="ediccion"){
            $editando= new edit($condicion,$this->arreglo1,"mvcframe/modelo/archivonewejemplo.xml");
            $this->arreglo1=$editando->ediccion();
            return $this->arreglo1; 
        }
        else{
        return $this->arreglo1;
        }
    }

    public function actualizar($valormuestra){
        $baseconocimiento = new extraer("mvcframe/modelo/archivonewejemplo.xml");
        
        $valor=$baseconocimiento->extraerdata();
        $arraytot=$baseconocimiento->getarrayunderkey("RDF:RDF","OWL:NAMEDINDIVIDUAL");
        $arreglo1=$baseconocimiento->visualizeinfo();
        $try = 0;
        $acum=0;
        
        $envio = new enviar($arraytot,$valor);  //Obtiene los cambios
        // en los inputs y los nuevos inputs generados.
      
        $arraytotal=[];
        $valor=[];
        $arraytotal=$envio->inputs($valormuestra);//Retorna el arreglo
        //con los nuevos inputs ingresados y sus valores.
        
        $valor=$envio->onchange();//Obtiene los cambios de la información
        //en el archivo xml.
        
        print_r($arraytotal);
        print_r($valor);
        $inicio = $arraytot[$valormuestra]; // no es mas 1 porqué se necesita obtener el name space del NamedIndividual, en cambio en los otros se hace desde la segunda posición del arreglo porque es para visualización y este no necesita mostrar el NamedIndividual.
        $final = $arraytot[$valormuestra + 1] - 1; //No se necesita el ultimo parametro del NamedIndividual.
        $diferencia = $final - $inicio;

        $crear = new create();//Retornar el valor de un nodo hijo.


        $arrayorden=[];
        $arrayfinal=[];

        $valorNamedIndividual=$valor[$inicio]; //Es el valor del NamedIndividual;
        $tag=$valor[$inicio]["tag"]; //Corresponde con la etiqueta del
        //nodo NamedIndividual.
        $arrayorden["key"]=$tag; //Obtiene la etiqueta de los inputs
        //nuevos ingresados.
        $arrayorden["value"]=$valorNamedIndividual;//Obtiene los valores
        //de los nuevos inputs ingresados.
        array_push($arrayfinal,$arrayorden); //Ingresa primero el vector
        //NamedIndividual al arreglo final.
        $valortag = $valor[$inicio+2]["tag"]; //Contiene las clases HASCOMPETENCY O HASVIDEORESOURCE QUE DIFERENCIA A CONTENIDOS DE COMPETENCÍAS.
        $tam=count($arraytotal);//Tamaño de todos los nodos NamedIndividual;
        $verificar="";//Guarda temporalmente un valor para comparar.
        $save="";//Guarda un valor anterior para que no se vaya a repetir.
        $cont=0;
        $inicio=$inicio+1;//Empieza despues de NamedInvidual que fue
        //la primera posición que se guardo en el arreglo.
        for ($k = 0; $k <= $diferencia-1; $k++) {//Recorre todo un nodo
            //hijo.
            $j = $inicio + $k;//Posición en el arreglo que contiene toda
            //la estructura del archivo xml.
            $tag=$valor[$j]["tag"];//Etiqueta que contiene la posición j
            //vector que contiene el archivo xml.
            $valorcom = $crear->definir($j,$valor); //Obtiene el valor
            //de un nodo en una posición especifica.

 

            if($valortag=="HASCOMPETENCY"){//Corresponde con contenido.
                $arrayorden["key"]=$tag;//etiqueta para un input ingresado.
                $arrayorden["value"]=$valorcom;//Valor para un input ingresado.
                array_push($arrayfinal,$arrayorden);//Agrega a arrayfinal
                //el vector que corresponde con valor.
   
            for($i=0;$i<$tam;$i++){//Coloca los valores del input
                //después de coincidir con el termino clave("llave") que 
                //se le asocía.
     
                if($tag==$arraytotal[$i]["key"] and $verificar!=$tag){//verifica
                    //los inputs y los agrega en el orden indicado a arrayfinal.
                    $arrayorden["key"]=$tag;
                    $arrayorden["value"]=$arraytotal[$i]["value"];
                    $cont=$cont+1;//Incremento porque hay un input.
                    array_push($arrayfinal,$arrayorden);
                    if($i==$tam-1){$verificar=$arraytotal[$i]["key"];};    
                        //Guarda
                        //el ultimo valor para que no se vaya a repetir el ingreso
                        // de los inputs.
                    }   
    
            }

        }
        if($valortag == "HASVIDEORESOURCE"){//Verifica si es del tipo
            //contenido.
            $arrayorden["key"]=$tag;
            $arrayorden["value"]=$valorcom;
            array_push($arrayfinal,$arrayorden);//Agrega en orden cada
            //uno de los nodos hijos.
            for($i=0;$i<$tam;$i++){
       
                if($tag==$arraytotal[$i]["key"] and $verificar!=$tag){
                //Verifica que el input ingresado coincida con una
                //etiqueta, es decir por ejemplo si en el arbol se 
                //encuentra videoresourcekeyword y el usuario ingreso
                //videoresourcekeyword coinciden con el tag y por lo
                //tanto coloca en orden los nodos hijos.
                $arrayorden["key"]=$tag;
                $arrayorden["value"]=$arraytotal[$i]["value"];
                $cont=$cont+1;
                print_r($tag);
                print_r($arraytotal[$i]["value"]);
                array_push($arrayfinal,$arrayorden);
                $save=$arraytotal[$i]["key"];
            }
            if($i==$tam-1){$verificar=$save;
                    //print_r("valor de i".$i."\n");
                    //print_r("verificar".$verificar."\n");
                    //print_r("tag".$tag."\n");
                }
            }
        }
  


    }

    if($cont==0 and (count($arraytotal)>0)){//En el caso de que 
        //no ingrese los valores a arreglo final, pero si existan
        //inputs ingresados.

        //Esto ocurre cuando un input es ingresado y no coincide 
        //con ninguna etiqueta anterior en el xml, es decir que ingresa
        //por ejemplo un hasvideoresource pero este no existía antes
        //en el xml, por lo cual lo agrega.
    
        for($i=0;$i<count($arraytotal);$i++){
            $arrayorden["key"]=$tag;
            $arrayorden["value"]=$arraytotal[$i]["value"];//Asegura que los inputs sean
            //enviados para generar el nodo xml.
            print_r($arrayorden);
            array_push($arrayfinal,$arrayorden);
        }
    }

    if($valortag == "HASCOMPETENCY"){
        $contenido= new contenido($arrayfinal); //Crea el contenido
        $contenido->generate();
    }
    if($valortag == "HASVIDEORESOURCE"){
        $competencia= new competencia($arrayfinal);//Agrega el nodo de contenido al archivo xml.
        $competencia->generate();
        
    }

    $envio->finalizar("mvcframe/modelo/archivonewejemplo.xml",$this->del);//Crea el archivo.
        
}

    public function eliminar($condicion){
        
        $res=$this->baseconocimiento->delete($condicion);

        if($res){
            return true;
        }
        else{
            return false;
        }
    }     

    public function eliminarnodohijo($fila,$columna,$node){
        $valor=$this->baseconocimiento->extraerdata();
        $arraytot=$this->baseconocimiento->getarrayunderkey("RDF:RDF","OWL:NAMEDINDIVIDUAL");
        
        $this->arreglo1=$this->baseconocimiento->visualizeinfo();
        $editando= new edit($fila,$this->arreglo1,"mvcframe/modelo/archivonewejemplo.xml");
        $this->del=$editando->deletechildnode($columna,$node);
        
        $actualizar = new update("mvcframe/modelo/archivonewejemplo.xml");
        $valor = $actualizar->extraerdata();
        $arraytot=$actualizar->getarrayunderkey("RDF:RDF","OWL:NAMEDINDIVIDUAL");
        $this->arreglo1=$actualizar->visualizeinfo();
        $editando= new edit($fila,$this->arreglo1,"mvcframe/modelo/archivonewejemplo.xml");
        $this->arreglo1=$editando->ediccion();
        
        return $this->arreglo1; 
        
    }  

    public function buscar($cadena){
        $valor=$this->baseconocimiento->extraerdata();
        $arraytot=$this->baseconocimiento->getarrayunderkey("RDF:RDF","OWL:NAMEDINDIVIDUAL");
        
        $this->arreglo1=$this->baseconocimiento->visualizeinfo();
      $buscador = new search($arraytot,$valor,$cadena);
       $vector= $buscador->buscar();
       return $vector;
    }

    public function autenticar($nombre,$password){
        $documento1 = new DOMDocument();
        $documento1->load('mvcframe/modelo/login.xml');
        $_SESSION['valid']="false";
        print_r("Dentro autenticar: ".$_SESSION['valid']);
        // get 'res' element of document 1
        
        $book = $documento1->documentElement;
        
        // iterate over 'item' elements of document 2
        $nodototal = $documento1->getElementsByTagName('usuario');
        $chapter = $book->getElementsByTagName('usuario');
        
        $val="false";
        $name="false";
        $psw="false";
        for ($i = 0; $i < $chapter->length; $i++) {
            for ($j = 0; $j < $chapter->item($i)->childNodes->length; $j++) {
                $new= $chapter->item($i)->childNodes->item($j);
                

                 // import/copy item from document 2 to document 1
                 if($nombre==$new->textContent){
                        
                        $name="true";

                 }
                 if($password==$new->textContent){
                     
                    
                        $psw="true";
                 }

        }

     }

     if($name=="true" and $psw=="true"){
         $val="true";
         $_SESSION['valid']="true";
     }
     else{
        $_SESSION['valid']="false";
     }
     $file = fopen("mvcframe/modelo/archivo.txt", "w");

     fwrite($file, $val);
     
     fclose($file);
     
     return $val;
    }
}
