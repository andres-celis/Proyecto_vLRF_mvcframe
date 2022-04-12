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
class contenido extends XMLWriter{

    public function __construct($valor){
       
        $this->valor=$valor;        
    }

    public function generate(){

        $valor=$this->valor;

parent::openMemory();;
    
// xmlwriter_set_indent($xw, 1);
 //$res = xmlwriter_set_indent_string($xw, ' ');
 parent::startDocument('1.0', 'UTF-8');
 





 parent::startelement( 'rdf:RDF');  //Etiqueta padre del documento xml.
 parent::writeattribute( "xmlns", "http://www.semanticweb.org/VLRF/VLRF_KB#");   //Añade un atributo al elemento de inicio de tipo string.
 parent::writeattribute( "xml:base", "http://www.semanticweb.org/VLRF/VLRF_KB");
 parent::writeattribute( "xmlns:owl", "http://www.w3.org/2002/07/owl#");
 parent::writeattribute( "xmlns:rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
 parent::writeattribute( "xmlns:xml", "http://www.w3.org/XML/1998/namespace");
 parent::writeattribute( "xmlns:xsd", "http://www.w3.org/2001/XMLSchema#");
 parent::writeattribute( "xmlns:rdfs", "http://www.w3.org/2000/01/rdf-schema#");
 parent::writeattribute( "xmlns:skos", "http://www.w3.org/2004/skos/core#");
 parent::writeattribute( "xmlns:vlrf_kb", "http://www.semanticweb.org/VLRF/VLRF_KB#");
 parent::endAttribute();
 parent::endAttribute();
 parent::endAttribute();
 parent::endAttribute();
 parent::endAttribute();
 parent::endAttribute();
 parent::endAttribute();
 parent::endAttribute();
 parent::endAttribute();

 parent::startelement( 'owl:Ontology'); //Nodo hijo de la etiqueta padre.
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB");
 parent::endAttribute();
 parent::endElement();                //Cierra la adicción del nodo hijo.

parent::writeComment( "Definición de ObjectProperty");

 //Anade las propiedas de objeto
 parent::startelement( 'owl:ObjectProperty'); //Nodo hijo de la etiqueta padre.
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#hasCompetency");
 parent::endAttribute();
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
 parent::endAttribute();
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
 parent::endAttribute();
 
 parent::endElement();
 parent::endElement();//Cierra la adicción del nodo hijo.


 parent::startelement( 'owl:ObjectProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#hasVideoResource");  //Clase de la ontología.
 parent::endAttribute();
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
 parent::endAttribute();
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
 parent::endAttribute();
 
 parent::endElement();
 parent::endElement();//Cierra la adicción del nodo hijo.
 
parent::writeComment("Definición de Dataproperty");

 //anade las propiedades de datos
 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyDegree");
 parent::endAttribute();
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
 parent::endAttribute();
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#int");
 parent::endAttribute();
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyDescription");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#string");
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyId");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#string");
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyKeyword");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#string");
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyLearningEvidence");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#string");
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyTopic");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#string");
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyTypicalAge");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#int");
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceDate");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#string");
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceDescription");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#string");
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceDuration");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#string");
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceId");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#string");
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceKeyword");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#string");
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceTitle");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#string");
 parent::endElement();
 parent::endElement();

 parent::startelement( 'owl:DatatypeProperty');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceURL");
 parent::startelement( 'rdfs:domain');
 parent::writeattribute( "rdf:resource", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
 parent::endElement();
 parent::startelement( 'rdfs:range');
 parent::writeattribute( "rdf:resource", "http://www.w3.org/2001/XMLSchema#anyURI");
 parent::endElement();
 parent::endElement();

parent::writeComment( "Definición de clases");
 //definición de clases
 parent::startelement( 'owl:Class');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
 parent::endElement();

 parent::startelement( 'owl:Class');
 parent::writeattribute( "rdf:about", "http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
 parent::endElement();

parent::writeComment( "Definición de individuos");

 parent::startelement("owl:NamedIndividual");
 parent::writeattribute('rdf:about',$valor[0]["value"]["attributes"]["RDF:ABOUT"]);
 parent::endAttribute();
 
 try{

 for ($k = 0; $k < count($valor); $k++) {
    $valorcon= $valor[$k]["value"];
 switch ($valor[$k]["key"]) {
                
    case 'RDF:TYPE':
        //echo "\n";
        //print_r($tag."\n");
        $variable ='rdf:type rdf:resource='.$valorcon;
        $variable=strval($variable);
        //print_r($variable."\n");
        parent::startelement('rdf:type');
        parent::writeattribute('rdf:resource',$valorcon);
        parent::endAttribute();
        parent::endElement();

        break;
    case 'HASCOMPETENCY':
        //print_r($tag . "\n");
        parent::startelement('hasCompetency');
        parent::writeattribute('rdf:resource',str_replace(" ","",$valorcon));
        parent::endAttribute(); 

        parent::endElement();
        break;
    case 'VIDEORESOURCEDATE':
        $space=[];
        //$cadena="";
        //print_r($tag . "\n");
        $mesLet= ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
        parent::startelement( "VideoResourceDate");
       
        $fs=intval(strpos($valorcon," ",1));
        $fguionbajo=intval(strpos($valorcon,"_",1));
        $fcontraslash=intval(strpos($valorcon,"/",1));
        $fecha_formateada="";
        //echo $fs;
        //array_push($space,$fs);
        if($fs>0){
            $space= self::cadena(" ",$valorcon);
           
            $dia=$space[0];
            $mes=$space[1];
            $year=$space[2];
            $fecha_formateada = $dia . " " .$mes . "." . " " . $year;
        }
        if($fcontraslash>0){
            $space=self::cadena("/",$valorcon);
            
            $dia=$space[0];
            echo '<script>alert("'.$dia.'")</script>';
            $mes=$space[1];
            $mes=$mesLet[intval($mes)-1];
            
            $year=$space[2];
            echo '<script>alert("'.$year.'")</script>';
            $fecha_formateada = $dia . " " .$mes . "." . " " . $year;
            }
        if($fguionbajo>0){
            $space=self::cadena("_",$valorcon);
            $dia=$space[0];
            $mes=$space[1];
            $year=$space[2];
            $fecha_formateada = $dia . " " .$mes. "." . " " . $year;
        }
        
        
        //print_r($space);
        
/*
        //date = new Date(formulariocontenido['datecont'].value);
        $meses = [
            "Jan", "Feb", "Mar",
            "Apr", "May", "Jun", "Jul",
            "Aug", "Sep", "Oct",
            "Nov", "Dec"
        ];
        $data = $valorcon;

        

        

        $fecha = strtotime($data);
        $dia = date('D', $fecha);
        $mes = date('M', $fecha);
        $year = date('Y', $fecha);

        echo $dia."\n";
        echo $mes."\n";
        echo $year."\n";

    
        //print_r($valorcon);*/

        
       parent::text($fecha_formateada);
        
       parent::endElement();

        break;

    case 'VIDEORESOURCEID':
       // print_r($tag . "\n");
        parent::startelement("VideoResourceId");
       parent::text( $valorcon);
        parent::endElement();
        break;

    case 'VIDEORESOURCETITLE':
       // print_r($tag . "\n");
        parent::startelement( "VideoResourceTitle");
    parent::text( $valorcon);
        parent::endElement();
        break;

    case 'VIDEORESOURCEURL':
        //print_r($tag . "\n");
        parent::startelement( "VideoResourceURL");
        parent::text( $valorcon);
        parent::endElement();
        break;
    
    case 'VIDEORESOURCEDESCRIPTION':
       // print_r($tag . "\n");
        parent::startelement( "VideoResourceDescription");
        parent::text( $valorcon);
        parent::endElement();
        break;

    case 'VIDEORESOURCEDURATION':
       // print_r($tag . "\n");
        parent::startelement("VideoResourceDuration");
        parent::text( $valorcon);
        parent::endElement();
        break;

    case 'VIDEORESOURCEKEYWORD':
       // print_r($tag . "\n");
        parent::startelement("VideoResourceKeyword");
        parent::text( $valorcon);
        parent::endElement();
        break;
   // RDF:TYPE HASVIDEORESOURCE COMPETENCYDEGREE COMPETENCYDESCRIPTION COMPETENCYID COMPETENCYKEYWORD COMPETENCYKEYWORD COMPETENCYKEYWORD COMPETENCYKEYWORD COMPETENCYLEARNINGEVIDENCE COMPETENCYLEARNINGEVIDENCE COMPETENCYLEARNINGEVIDENCE COMPETENCYTOPIC COMPETENCYTOPIC COMPETENCYTOPIC COMPETENCYTOPIC
}
 }
 parent::endElement();
 parent::endElement();
 parent::endDocument();

}catch(Exception $e){
     echo $e->getMessage();
}
 //$xml=xmlwriter_output_memory($xw,true);
 
 $xml1=parent::flush();
 //echo $xml;
 //echo $xml1;
 
 try{
 $file2 = fopen("mvcframe/modelo/archivoejemplo.xml", "w");

 fwrite($file2, $xml1. PHP_EOL);

 fclose($file2);
 }catch(Exception $e){
     echo $e->getMessage();
 }
 
}

public static function cadena($expr,$valorcom){
    $cadena="";
    $space=[];
    for($i=0;$i<strlen($valorcom);$i++){
                       
        if($valorcom[$i]==$expr){
           array_push($space,$cadena);
           $cadena="";
        }
        else{
            
            $cadena=$cadena.$valorcom[$i];
            //echo $valorcon[$i]."/n";
            
        }
        if($i==strlen($valorcom)-1){
            array_push($space,$cadena);
        }
    }

    return $space;

}

}


?>