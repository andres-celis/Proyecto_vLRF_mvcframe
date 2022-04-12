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
?>

    <link href="css/interfaz.css" rel="stylesheet"/>
    <link href="css/estilos.css" rel="stylesheet"/>
    <!--<script src = "js/jquery-3.6.0.min.js"> </script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/XMLWriter.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--<script src="js/verificar.js"></script>-->
    <script src="js/FileSaver.js"></script>
    <!--<script src="js/xmltojson.js"></script>-->
    <script src="js/xml2json.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function alerta(){
            alert('El campo de identificador no puede contener caracteres especiales como &,< ó >');
        }
        
        
    </script>
    <script>
        class addobjects{
            static vector=[];
    static objetoidhasvideoresource=[] ;
    static objetoidevi= [];
    static objetoTopic= [];
    static objetoidekey= [];
    static objetoidkeycon= [];
    static arrayadddel=["addhasvideore","addevi","addtopic","addkey","addkeycon"];
    static arrayaddid = ["idhasvideoresource","idevi","Topic","idkey","idkeycon"];
        constructor(){

        }
        anadirobject(key){
           
    array=[2,2,2,2,2];
    
    
    let objeto1= new objetos();
    let newobject = new generateInputs();  //Crear objetos de la clase generate inputs
       
       
       array[key]+=1;
       
       newobject.add(addobjects.arrayaddid[key],addobjects.arrayadddel[key]);
       
       
        // el siguiente switch case almacena los objetos creados para cada uno de los inputs generados dinamicamente, por medio del metodo add.
        key=String(key);
        switch(key){
            
            case '0':
                
                addobjects.objetoidhasvideoresource.push(newobject);
                
            break;
            case '1':
                addobjects.objetoidevi.push(newobject);
            break;
            case '2':
                addobjects.objetoTopic.push(newobject);
            break;
            case '3':
                addobjects.objetoidekey.push(newobject);
            break;
            case '4':
                addobjects.objetoidkeycon.push(newobject);
            break;
        }
    

        }

        deleteobject(key){
                let variable;
                
    

        //El valor de key viene de la etiqueta corrrespondiente,es por esto que el switch case pregunta cual es el objeto que se va a eliminar de acuerdo al valor de key.
          let keystr=String(key);
          let final;
         
        switch(keystr){
          
            case '0':
                             
                final=addobjects.objetoidhasvideoresource.length;
                
                variable=addobjects.objetoidhasvideoresource[final-1];
                
                delete(variable.delete(addobjects.arrayadddel[key]));
                addobjects.objetoidhasvideoresource.pop();
            break;
            case '1':
                
                final= addobjects.objetoidevi.length;
                
                variable= addobjects.objetoidevi[final-1];
                
                delete(variable.delete(addobjects.arrayadddel[key]));
                addobjects.objetoidevi.pop();
                
            break;
            case '2':
           
            final=addobjects.objetoTopic.length;
                
                variable= addobjects.objetoTopic[final-1];
                
                delete(variable.delete(addobjects.arrayadddel[key]));
                addobjects.objetoTopic.pop();
                
            break;
            case '3':
            
                final= addobjects.objetoidekey.length;
                
                variable= addobjects.objetoidekey[final-1];
                
                delete(variable.delete(addobjects.arrayadddel[key]));
                addobjects.objetoidekey.pop();
            break;
            case '4':
           
            final= addobjects.objetoidkeycon.length;
                
                variable= addobjects.objetoidkeycon[final-1];
                
                delete(variable.delete(addobjects.arrayadddel[key]));
                addobjects.objetoidkeycon.pop();
            break;
        }
       
        
      
        
    
    
    }



    }
    let addobjects1 = new addobjects();

    class finalizar{

        constructor(){

        }

        finalizarcomp(){
            let id= new comprobar('idComp','Identificador de competencía');
        
        let videorecurso1= new comprobar('idhasvideoresource1','videorecurso asociado');
        let edad = new comprobar('Edad','Edad');
        let evidencia1= new comprobar('idevi1','Evidencia');
        
        let tema1 = new comprobar('Topic1','Tema');
        let keyword1= new comprobar('idkey1','Palabra clave');
         
        let descripcion1 = new comprobar('Descripcion','Descripción');
        
        let grado1 = new comprobar('Grade','Grado del estudiante');
       
        

        id.consultar();
        
        edad.consultar();
        
        videorecurso1.consultar();
        
        evidencia1.consultar();
       
        tema1.consultar();
       
        keyword1.consultar();
        
        descripcion1.consultar();
        

        grado1.consultar();
        
       
        
        comprobar.verificarcomp();
        

       
        
       
    let horaA=new Date();
    let horaB=new Date();
    let diferehora=horaB-horaA;
    while(diferehora<3000){
        horaB=new Date();
        diferehora=horaB-horaA;
        

    }
        }

    finalizarcont(){
        let titulo1= new comprobar('idTit','Identificador de video');
        
        let identificador1= new comprobar('Identificador','Identificador de video');
        let url1 = new comprobar('url','Edad');
        let competenciacontenido1= new comprobar('competenciacontenido','Evidencia');
        let datecont = new comprobar('datecont','Fecha del video');
        let sinopsis1= new comprobar('Sipnosis','Ingrese la sinopsis');
       
        let durationvideo1 = new comprobar('durationvideo','La duración del video');
        let idkeycon1 = new comprobar('idkeycon1','Palabra clave');
         
        titulo1.consultar();
        identificador1.consultar();
        url1.consultar();
        competenciacontenido1.consultar();
        datecont.consultar();
        sinopsis1.consultar();
        durationvideo1.consultar();
      
        idkeycon1.consultar();
       
        comprobar.verificarcont();
        
        var elem = document.getElementById("myBar");
    var width = 1;
    while(width<100){
    width++;
    elem.style.width = width + "%";
    document.getElementById("myBar").innerHTML=width + "%";
    }
        
        
        
        let horaA=new Date();
    let horaB=new Date();
    let diferehora=horaB-horaA;
    while(diferehora<1000){
        horaB=new Date();
        diferehora=horaB-horaA;
        

    }
    }

    }

    let finalizar1=new finalizar();
</script>
     

</head>
<body>
    
        
    <div class="container">
        

        <form method="POST" id="formulariocontenido" autocomplete="off" name="formulariocontenido" action="mostrar.php">   <!--Target es el tipo de información de respuestas-->
        
            <fieldset>  <!-- Vamos a agregar un marco-->

            <legend>Datos contenido: </legend>
            
                <div class="mb-3">
                    <label for="idTit" class="laiden">Titulo: </label> <br/>
                    <input type="text" id="idTit" name="idTitulo" placeholder="Escriba el titulo del video "/  /><br/>
                </div>

                <div class="mb-3">                
                <label for="Identificador ">Identificador: </label> <br/> 
                <input type="text" id="Identificador" name="Identificador" onblur="alerta()" placeholder="Escriba el identificador del contenido "/ required="true"></input><br/>
                </div>

                <div class="mb-3">                
                <label for="Identificador ">URL: </label> <br/> 
                <input type="text" id="url" name="url" placeholder="Ingrese la url del video "/ required="true"></input><br/>
                </div>

                <div class="mb-3">
                <label for="URL" id="compcont">Competencía asociada</label><br/>
                <input type="text" id="competenciacontenido" name="competenciacontenido" placeholder="Ingrese la competencia" required="true">
                </div>

                <div class="mb-3">
                <label for="date" id="datela">Fecha de publicación</label><br/>
                <input type="date" id="datecont" name="date" placeholder="Ingrese la fecha de publicación" required="true">
                </div>

                <div class="mb-3">                
                    <label for="Sipnosis ">Sipnosis: </label> <br/> 
                    <textarea type="text" id="Sipnosis" name="Sipnosis" placeholder="Escribe la sipnosis del video"/ rows="4" required="true"></textarea><br/>
                </div>

                
                <div class="mb-3">  
                <label for="Option"> El video tiene anotaciones: </label>
                <select name='id_categoria' id='id_categoria' onchange="carg(this);">
                    <option value="No">No</option>
                    <option value="Si">Si</option>
                </select>
                </div>
                <br>

                <div class="mb-3">                
                    <label for="Anotaciones ">Anotaciones: </label> <br/> 
                    <textarea disabled type="text" id="anotaciones" name="anotaciones" placeholder="Escribe las anotaciones del video"/ rows="4" required="true"></textarea><br/>
                </div>

                <div class="mb-3"> 
                <label for="date" id="datela">Duración del video</label><br/>
                <input type="text" id="durationvideo" name="durationvideo" placeholder="Ingrese la duración del video" required="true">
                </div>
                
                <div class="mb-3">
                <label for="Keywords">Keywords</label><br/>
                <input type="text" id="idkeycon1" name="keyword1" placeholder="Ingrese la palabra clave(s)" required="true">
                </div>
                <!--<div id="parentDiv">--->
                <a href="#" onclick="addobjects1.anadirobject(4);">Añadir campo </a>

                <a href="#" onclick="addobjects1.deleteobject(4);">Eliminar campo </a>
                <div id="addkeycon"></div></br>

               <!-- <input type="file" id="files" name="files[]" />
                <output id="list"></output>-->

                <!--<a href="#" onclick=" writexmlcont();">Writexmlcont</a>-->

                <input type="hidden" id="varhidden" value=0 name="varhidden"  ><br/> <!-- Envia su valor al codigo en php para verificar que no existan campos sin llenar
        
                <!--<a href="#" onclick=" writexmlcom();">Writexml</a>-->
                <input type="hidden" id="varhiddenno_load" value=0 name="varhiddenno_load"  ><br/>
                
                <!--<a href="#" onclick=" writexmlcom();">Writexml</a>-->
                <input type="hidden" id="varhiddenerror" value=0 name="varhiddenerror"  ><br/>
      
               
                <button  class='btn btn-primary mb-3' id="enviarcon" onclick="finalizar1.finalizarcont()">Enviar</button>

                
        </fieldset>
        </form>
    
    </div>
    <div id="result">
    </div>
    <div id="myProgress">
        <div id="myBar" ></div>
        </div>
    

     
    

    <script>
  

    class generateInputs{
        static contadorobjeto=1;
        static lastkey=""
        

        constructor(){
            this._contador =++generateInputs.contadorobjeto;
            this._tipo=[];
        }
     

        add(key,field){

            
            
            let input = document.createElement("input");
            let espacio= document.createElement("br");
            input.setAttribute('type', 'text');
            
           
            

            let valstr=this._contador.toString();
            input.setAttribute('id',key+valstr);
            input.setAttribute('class',"class"+valstr);
           
            /*valto+=1;
            valtostr=valto.toString();*/
            input.setAttribute('name',key+valstr);
            input.setAttribute('placeholder',"Ingrese la palabra clave(s)");
            espacio.setAttribute('type', 'text');
            input.setAttribute('required','true');
            let ty=document.getElementById(field).appendChild(input);
            document.getElementById(field).appendChild(espacio);
            
            
               

            this._tipo.push(key+valstr);
                        


        }

        delete(key){
            console.log(key);
            let inputdel = document.getElementById(key);
            let size = Object.keys(inputdel).length;
            console.log(size);
            

            removelastChildNodes(inputdel);
            generateInputs.contadorobjeto-=1;


        }

        mostrarobjeto(){
            
            return this._tipo;

        }

        valor(){
            
            return document.getElementById(this._tipo).value.length;

        }




    }

    class objetos{

        constructor(){
            this._objetos = [];
        }

        agregarobjetos(inputs){
            this._objetos.push(inputs);
           
        }

        mostrarobjetos(){
                     
           return this._objetos;
        

        
        }
    }
    

    

    arrayadddel=["addhasvideore","addevi","addtopic","addkey","addkeycon"];
    arrayaddid = ["idhasvideoresource","idevi","Topic","idkey","idkeycon"];
    array=[2,2,2,2,2];
    let newobject;
    let vector=[];
    let objetoidhasvideoresource=[] ;
    let objetoidevi= [];
    let objetoTopic= [];
    let objetoidekey= [];
    let objetoidkeycon= [];
    let objeto1= new objetos();

    function anadirobject(key){

      
       
       let newobject = new generateInputs();  //Crear objetos de la clase generate inputs
       
       
       array[key]+=1;
       
       newobject.add(arrayaddid[key],arrayadddel[key]);
       
       
        // el siguiente switch case almacena los objetos creados para cada uno de los inputs generados dinamicamente, por medio del metodo add.
        key=String(key);
        switch(key){
            
            case '0':
                
                objetoidhasvideoresource.push(newobject);
                
            break;
            case '1':
                objetoidevi.push(newobject);
            break;
            case '2':
                objetoTopic.push(newobject);
            break;
            case '3':
                objetoidekey.push(newobject);
            break;
            case '4':
                objetoidkeycon.push(newobject);
            break;
        }
        

 
     
    }
 let variable;
    function deleteobject(key){

        //El valor de key viene de la etiqueta corrrespondiente,es por esto que el switch case pregunta cual es el objeto se va a eliminar de acuerdo al valor de key.
          keystr=String(key);
        switch(keystr){
          
            case '0':
                             
                final=objetoidhasvideoresource.length;
                
                variable=objetoidhasvideoresource[final-1];
                
                delete(variable.delete(arrayadddel[key]));
                objetoidhasvideoresource.pop();
            break;
            case '1':
                
                final= objetoidevi.length;
                
                variable= objetoidevi[final-1];
                
                delete(variable.delete(arrayadddel[key]));
                objetoidevi.pop();
                
            break;
            case '2':
           
            final= objetoTopic.length;
                
                variable= objetoTopic[final-1];
                
                delete(variable.delete(arrayadddel[key]));
                objetoTopic.pop();
                
            break;
            case '3':
            
                final= objetoidekey.length;
                
                variable= objetoidekey[final-1];
                
                delete(variable.delete(arrayadddel[key]));
                objetoidekey.pop();
            break;
            case '4':
           
            final= objetoidkeycon.length;
                
                variable= objetoidkeycon[final-1];
                
                delete(variable.delete(arrayadddel[key]));
                objetoidkeycon.pop();
            break;
        }
       
        array[key]-=1;
        
      
        
    
    
    }

    var textarea = document.getElementById('anotaciones');
    var idcatego= document.getElementById('id_categoria');
    

    function carg(elemento) { 
        //Obtiene el valor del text correspondiente a anotaciones, si el elemento tiene el valor de no en el top bottom se encuentra desabilitada si es la inversa se habilita.
        d = elemento.value;
        
        
        if(idcatego.value=="No"){
            
                textarea.disabled = true;
        }else{
        textarea.disabled = false;
        }
    }
    
      
    
       

       function removelastChildNodes(parent){ //remueve el ultimo nodo hijo que se agrega.
            parent.removeChild(parent.lastChild);
            parent.removeChild(parent.lastChild);
       }

       function removeAllChildNodes(parent) {  // Remueve todos los los nodos hijos del elemento que se introduce.
        while (parent.lastChild) {
            parent.removeChild(parent.lastChild);
        }
        }

    class writexml extends XMLWriter{

        constructor(){
            super('utf8');
        }

        writexmlcom(){
        
        
		this.formatting = 'indented';//añade la sangría para elaborar el xml;
		this.indentChar = ' ';//solicita la sangría con espacios.
		this.indentation = 2;//añade dos espacios por nivel.
		
		this.writeStartDocument( );   //Metodo para iniciar la elaboración del documento.

     


    this.writeStartElement('rdf:RDF');  //Etiqueta padre del documento xml.
    this.writeAttributeString("xmlns","http://www.semanticweb.org/VLRF/VLRF_KB#");   //Añade un atributo al elemento de inicio de tipo string.
    this.writeAttributeString("xml:base","http://www.semanticweb.org/VLRF/VLRF_KB");
    this.writeAttributeString("xmlns:owl","http://www.w3.org/2002/07/owl#");
    this.writeAttributeString("xmlns:rdf","http://www.w3.org/1999/02/22-rdf-syntax-ns#");
    this.writeAttributeString("xmlns:xml","http://www.w3.org/XML/1998/namespace");
    this.writeAttributeString("xmlns:xsd","http://www.w3.org/2001/XMLSchema#");
    this.writeAttributeString("xmlns:rdfs","http://www.w3.org/2000/01/rdf-schema#");
    this.writeAttributeString("xmlns:skos","http://www.w3.org/2004/skos/core#");
    this.writeAttributeString("xmlns:vlrf_kb","http://www.semanticweb.org/VLRF/VLRF_KB#");

    this.writeStartElement('owl:Ontology'); //Nodo hijo de la etiqueta padre.
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB");
    this.writeEndElement();                 //Cierra la adicción del nodo hijo.

    //Anade las propiedas de objeto
    this.writeStartElement('owl:ObjectProperty'); //Nodo hijo de la etiqueta padre.
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#hasCompetency"); 
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
    this.writeEndElement();
    this.writeEndElement();//Cierra la adicción del nodo hijo.

    this.writeStartElement('owl:ObjectProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#hasVideoResource");  //Clase de la ontología.
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
    this.writeEndElement();
    this.writeEndElement();//Cierra la adicción del nodo hijo.

    //anade las propiedades de datos
    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyDegree");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#int");
    this.writeEndElement();
    this.writeEndElement();

    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyDescription");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
    this.writeEndElement();
    this.writeEndElement();

    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyId");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
    this.writeEndElement();
    this.writeEndElement();
    
    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyKeyword");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
    this.writeEndElement();
    this.writeEndElement();

    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyLearningEvidence");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
    this.writeEndElement();
    this.writeEndElement();
    
    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyTopic");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
    this.writeEndElement();
    this.writeEndElement();

    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyTypicalAge");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#int");
    this.writeEndElement();
    this.writeEndElement();

    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceDate");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
    this.writeEndElement();
    this.writeEndElement();

    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceDescription");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
    this.writeEndElement();
    this.writeEndElement();

    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceDuration");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
    this.writeEndElement();
    this.writeEndElement();

    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceId");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
    this.writeEndElement();
    this.writeEndElement();
       
    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceKeyword");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
    this.writeEndElement();
    this.writeEndElement();

    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceTitle");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
    this.writeEndElement();
    this.writeEndElement();

    this.writeStartElement('owl:DatatypeProperty');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceURL");
    this.writeStartElement('rdfs:domain');
    this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
    this.writeEndElement();
    this.writeStartElement('rdfs:range');
    this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#anyURI");
    this.writeEndElement();
    this.writeEndElement();


    //definición de clases
    this.writeStartElement('owl:Class');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
    this.writeEndElement();

    this.writeStartElement('owl:Class');
    this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
    this.writeEndElement();

    this.writeComment("Definición de individuos");
    
    //definición de individuos


    


        let formulario = document.forms['formulario']; //Obtiene el arbol del formulario para contenido.
      
		this.writeStartElement( "owl:NamedIndividual");
         
         this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#"+ formulario['idComp'].value); //Obtiene el valor del id competencía.
			
			
			this.writeStartElement('rdf:type rdf:resource="http://www.semanticweb.org/VLRF/VLRF_KB#Competency"');
            this.writeEndElement();
            
           
            this.writeStartElement('hasVideoResource rdf:resource="http://www.semanticweb.org/VLRF/VLRF_KB#'+formulario['idhasvideoresource1'].value +'"'); //Obtiene el valor del idhasvideoresource.
			this.writeEndElement();

       
            if(addobjects.objetoidhasvideoresource.length>0){ //Recorre el array de los nuevos objetos creados apartir de añadir campos.
            for(let i=0;i<addobjects.objetoidhasvideoresource.length;i++){
                
               this.writeStartElement('hasVideoResource rdf:resource="http://www.semanticweb.org/VLRF/VLRF_KB#'+formulario[addobjects.objetoidhasvideoresource[i].mostrarobjeto()].value +'"');
			   this.writeEndElement();
               console.log(formulario[addobjects.objetoidhasvideoresource[i].mostrarobjeto()].value );
                
            }
            }
            

            

            this.writeStartElement("CompetencyDegree");   //Genera la etiqueta correspondiente al grado de la competencía.
            this.writeAttributeString("rdf:datatype","http://www.w3.org/2001/XMLSchema#int");
            this.writeString(formulario['Grade'].value);
			this.writeEndElement();

            this.writeStartElement("CompetencyTypicalAge");  //Genera la etiqueta correspondiente al tipo de edad de la competencía.
            this.writeAttributeString("rdf:datatype","http://www.w3.org/2001/XMLSchema#int");
            this.writeString(formulario['Edad'].value);
			this.writeEndElement();

            

           

            this.writeStartElement("CompetencyDescription");  ///Genera la etiqueta correspondiente a la descripción de la comptencía.
            this.writeAttributeString("rdf:datatype","http://www.w3.org/2001/XMLSchema#string");
            this.writeString(formulario['Descripcion'].value);
			this.writeEndElement();
			
			
            this.writeStartElement("CompetencyId");  //Genera el identificador de la competencía.
            this.writeAttributeString("rdf:datatype","http://www.w3.org/2001/XMLSchema#string");
            this.writeString(formulario['idComp'].value);
			this.writeEndElement();
            
           
            
            this.writeStartElement("CompetencyKeyword");  //Genera la palabra clave de la competencía.
            this.writeAttributeString("rdf:datatype","http://www.w3.org/2001/XMLSchema#string");
            this.writeString(formulario['idkey1'].value);
			this.writeEndElement();

            if(addobjects.objetoidekey.length>0){ //Recorre el array de palabra para generar cada una de las etiquetas de las palabras claves.
             for(let i=0;i<addobjects.objetoidekey.length;i++){
                this.writeStartElement("CompetencyKeyword");
                 this.writeAttributeString("rdf:datatype","http://www.w3.org/2001/XMLSchema#string");
                 this.writeString(formulario[addobjects.objetoidekey[i].mostrarobjeto()].value);
                 this.writeEndElement();
             }
            }

          

            this.writeStartElement("CompetencyLearningEvidence"); //Genera la etiqueta de la evidencía de aprendizaje ingresada.
            this.writeAttributeString("rdf:datatype","http://www.w3.org/2001/XMLSchema#string");
            this.writeString(formulario['idevi1'].value);
			this.writeEndElement();

            if(addobjects.objetoidevi.length>0){ //Genera cada una de las etiquetas de la evidencía de aprendizaje ingresada.
             for(let i=0;i<addobjects.objetoidevi.length;i++){
                  this.writeStartElement("CompetencyLearningEvidence");
                 this.writeAttributeString("rdf:datatype","http://www.w3.org/2001/XMLSchema#string");
                 this.writeString(formulario[addobjects.objetoidevi[i].mostrarobjeto()].value);
                 this.writeEndElement();
             }
            }
            

           
            
           
            this.writeStartElement("CompetencyTopic");//Genera la etiqueta del tema de la competencía.
            this.writeAttributeString("rdf:datatype","http://www.w3.org/2001/XMLSchema#string");
            this.writeString(formulario['Topic1'].value);
			this.writeEndElement();
            if(addobjects.objetoTopic.length>1){
            
            for(let i=0;i<addobjects.objetoTopic.length;i++){//Genera la etiqueta de cada uno de los temas ingresados.
                  this.writeStartElement("CompetencyTopic");
                 this.writeAttributeString("rdf:datatype","http://www.w3.org/2001/XMLSchema#string");
                 this.writeString(formulario[addobjects.objetoTopic[i].mostrarobjeto()].value);
                 this.writeEndElement();
                
            }}
            

                     

            
			
		this.writeEndElement(); //Finaliza la etiqueta NamedIndividual.
        this.writeEndElement(); //Fianliza la etiqueta de RDF.
		this.writeEndDocument(); //Finaliza el documento.
		
		let xml = this.flush(); //genera el xml string
		this.close();//limpia el escritor
        //xmldocget=this.getDocument();
		let xw = undefined;//
       

        
    

        
        return xml;
        }

         writexmlcon(){
             
            this.formatting = 'indented';//anade la sangría del archivo xml
            this.indentChar = ' ';//sangría con espacios
            this.indentation = 2;//anade 2 espacios por nivel.

            this.writeStartDocument( ); //inicializa el documento 

/*  <rdf:RDF xmlns="http://www.semanticweb.org/VLRF/VLRF_KB#"
xml:base="http://www.semanticweb.org/VLRF/VLRF_KB"
xmlns:owl="http://www.w3.org/2002/07/owl#"
xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
xmlns:xml="http://www.w3.org/XML/1998/namespace"
xmlns:xsd="http://www.w3.org/2001/XMLSchema#"
xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
xmlns:skos="http://www.w3.org/2004/skos/core#"
xmlns:vlrf_kb="http://www.semanticweb.org/VLRF/VLRF_KB#">
<owl:Ontology rdf:about="http://www.semanticweb.org/VLRF/VLRF_KB"/>

</rdf:RDF>*/
            this.writeStartElement('rdf:RDF'); //Establece la etiqueta padre.
            this.writeAttributeString("xmlns","http://www.semanticweb.org/VLRF/VLRF_KB#");
            this.writeAttributeString("xml:base","http://www.semanticweb.org/VLRF/VLRF_KB");
            this.writeAttributeString("xmlns:owl","http://www.w3.org/2002/07/owl#");
            this.writeAttributeString("xmlns:rdf","http://www.w3.org/1999/02/22-rdf-syntax-ns#");
            this.writeAttributeString("xmlns:xml","http://www.w3.org/XML/1998/namespace");
            this.writeAttributeString("xmlns:xsd","http://www.w3.org/2001/XMLSchema#");
            this.writeAttributeString("xmlns:rdfs","http://www.w3.org/2000/01/rdf-schema#");
            this.writeAttributeString("xmlns:skos","http://www.w3.org/2004/skos/core#");
            this.writeAttributeString("xmlns:vlrf_kb","http://www.semanticweb.org/VLRF/VLRF_KB#");

            this.writeStartElement('owl:Ontology'); //anade la etiqueta hija correspondiente a la ontología owl
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB");
            this.writeEndElement();

            this.writeStartElement('owl:ObjectProperty'); //anade la propiedad de objeto de hascompetency
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#hasCompetency");
            this.writeStartElement('rdfs:domain'); //anade el recurso dominio de la propiedad de objeto.
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
            this.writeEndElement();
            this.writeEndElement(); //Finaliza la generación de la propiedad objeto;

            this.writeStartElement('owl:ObjectProperty'); //anade la etiqueta de objeto has video Resource
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#hasVideoResource");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
            this.writeEndElement(); //Finaliza la declaración del recurso dominio.
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
            this.writeEndElement();//Finaliza la generación del recurso rango.
            this.writeEndElement(); 
             //Se generan las propiedades de objeto correspondientes a la ontología, dentro de la cual se definen sujeto,propiedad y objeto, el sujeto determina el dominio e indica a que clase se puede aplicar una propiedad y a que clase pertenecería o se asigna el resultado de una propiedad. 
            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyDegree");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#int");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyDescription");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyId");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyKeyword");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyLearningEvidence");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyTopic");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#CompetencyTypicalAge");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#int");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceDate");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceDescription");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceDuration");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceId");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceKeyword");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceTitle");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#string");
            this.writeEndElement();
            this.writeEndElement();

            this.writeStartElement('owl:DatatypeProperty');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResourceURL");
            this.writeStartElement('rdfs:domain');
            this.writeAttributeString("rdf:resource","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
            this.writeEndElement();
            this.writeStartElement('rdfs:range');
            this.writeAttributeString("rdf:resource","http://www.w3.org/2001/XMLSchema#anyURI");
            this.writeEndElement();
            this.writeEndElement();


            //definición de clases
            this.writeStartElement('owl:Class');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#Competency");
            this.writeEndElement();

            this.writeStartElement('owl:Class');
            this.writeAttributeString("rdf:about","http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource");
            this.writeEndElement();



//definición de individuos



/*<owl:NamedIndividual rdf:about="http://www.semanticweb.org/VLRF/VLRF_KB#lsoFP2YApvs">
        <rdf:type rdf:resource="http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource"/>
        <hasCompetency rdf:resource="http://www.semanticweb.org/VLRF/VLRF_KB#VLRFCOMAT10_01"/>
        <VideoResourceDate>16 Sep. 2013</VideoResourceDate>
        <VideoResourceDescription>Descripción de los números reales con ejemplos paso a paso, como la unión de los números racionales y los números irracionales</VideoResourceDescription>
        <VideoResourceDuration>4:44</VideoResourceDuration>
        <VideoResourceId>lsoFP2YApvs</VideoResourceId>
        <VideoResourceKeyword>Números reales</VideoResourceKeyword>
        <VideoResourceKeyword>ejemplos</VideoResourceKeyword>
        <VideoResourceKeyword>números irracionales</VideoResourceKeyword>
        <VideoResourceTitle>Números reales. Ejemplos paso a paso</VideoResourceTitle>
        <VideoResourceURL rdf:datatype="http://www.w3.org/2001/XMLSchema#anyURI">https://www.youtube.com/watch?v=lsoFP2YApvs</VideoResourceURL>
    </owl:NamedIndividual>*/

//xw.writeDocType('"items.dtd"');
        
    
        
    
        let formulariocontenido = document.forms['formulariocontenido'];
        console.log(formulariocontenido);
        
        this.writeStartElement( "owl:NamedIndividual");
        let formulacontenidoiden=formulariocontenido['Identificador'].value;
            // let newcadenaiden=formulacontenidoiden.slice(0,formulacontenidoiden.indexOf("&"));
        let pos=-1;
            for (let i=0;i<formulacontenidoiden.length;i++){
                console.log(formulacontenidoiden[i]);
                if((formulacontenidoiden[i]=="&" || formulacontenidoiden[i]==">" || formulacontenidoiden[i]==">") && pos==-1){
                    pos=i;
                }
                
            }
            //alert("pos: "+pos);
            let formulacontenidoidennew="";
            if(pos>0){
                for(let i=0;i<pos;i++){
                     formulacontenidoidennew=formulacontenidoidennew+formulacontenidoiden[i];
                }
                formulacontenidoiden=formulacontenidoidennew;
                try{
                    throw "Ingreso un caracter no valido en el contenido"; // genera una excepción con un valor cadena
                    window.history.back();
                }
                finally {
                         alert("Ingreso un caracter erroneo"); 
                         window.history.back();
                         document.getElementById("varhiddenerror").value=1;
                    }
                
                
            }
            
            //alert("formula new: "+formulacontenidoiden);
             
             /*if(formulacontenidoiden.search("&")>0){
                 let valor= formulacontenidoiden.search("&");
                 formulacontenidoiden=formulacontenidoiden.substring(0,valor);
                 alert("Dentro if: "+formulacontenidoiden);
             }*/
             
           
             //alert(typeof(formulacontenidoiden));
             let cadenafinal="http://www.semanticweb.org/VLRF/VLRF_KB#"+formulacontenidoiden;
             ;
             cadenafinal=String(cadenafinal);
        this.writeAttributeString("rdf:about",cadenafinal);
           
            
            
            //xw.writeComment('');
            this.writeStartElement('rdf:type rdf:resource="http://www.semanticweb.org/VLRF/VLRF_KB#VideoResource"');
            this.writeEndElement();
            
           
            this.writeStartElement('hasCompetency rdf:resource="http://www.semanticweb.org/VLRF/VLRF_KB#'+formulariocontenido['competenciacontenido'].value +'"');
            this.writeEndElement();
            
           
            this.writeStartElement("VideoResourceDate");
            //date = new Date(formulariocontenido['datecont'].value);
            var meses = [
        "Jan", "Feb", "Mar",
        "Apr", "May", "Jun", "Jul",
        "Aug", "Sep", "Oct",
        "Nov", "Dec"
        ]
           let data = formulariocontenido['datecont'].value;
              
            let date = new Date(data);
           
            var dia = date.getDate();
            var mes = date.getMonth();
            var yyy = date.getFullYear()
            var fecha_formateada = dia + " " + meses[mes]+"."+ " " + yyy;
            this.writeString(fecha_formateada);
            this.writeEndElement();
            
            this.writeStartElement("VideoResourceDescription");
            this.writeString(formulariocontenido['Sipnosis'].value);
            this.writeEndElement();

            this.writeStartElement("VideoResourceDuration");
            this.writeString(formulariocontenido['durationvideo'].value);
            this.writeEndElement();
            
            this.writeStartElement("VideoResourceId");
            this.writeString(formulariocontenido['Identificador'].value);
            this.writeEndElement();

        
            this.writeStartElement("VideoResourceKeyword");
            this.writeString(formulariocontenido['idkeycon1'].value);
            this.writeEndElement();
               
             if(addobjects.objetoidkeycon.length>0){
             for(let i=0;i<addobjects.objetoidkeycon.length;i++){
                this.writeStartElement("VideoResourceKeyword");
                
                 this.writeString(formulariocontenido[addobjects.objetoidkeycon[i].mostrarobjeto()].value);
                 
                 this.writeEndElement();
             }
            }

            this.writeStartElement("VideoResourceTitle");
            this.writeString(formulariocontenido['idTit'].value);
            this.writeEndElement();

            this.writeStartElement("VideoResourceURL");
            let formulacontenido1=formulariocontenido['url'].value;
             let newcadena=formulacontenido1.slice(0,formulacontenido1.indexOf("&"));
             
            this.writeString(newcadena);
            this.writeEndElement();

            
        

            
            
        this.writeEndElement();
        this.writeEndElement();
        this.writeEndDocument();



        let xml = this.flush(); //generate el xml string
        this.close();//limpia el escritor
      

      
        
        return xml;
    }
            
                

}
class actionSend{
    static xmlhttp;
    constructor(datosxml){
        this._datosxml=datosxml;
    }

    enviar(){
        
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            actionSend.xmlhttp = new XMLHttpRequest();
        }
        else {// code for IE6, IE5
         actionSend.xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        
        var myJsonString = JSON.stringify(this._datosxml);
        actionSend.xmlhttp.onreadystatechange = actionSend.respond();
        actionSend.xmlhttp.open("POST", "/index.php?m=guardar", false);
        actionSend.xmlhttp.send(myJsonString);

    }

    static respond(){
         
        if (actionSend.xmlhttp.readyState == 4 && actionSend.xmlhttp.status == 200) {
            document.getElementById('result').innerHTML = actionSend.xmlhttp.responseText;
        }
    }
}

       


  function OBJtoXML(obj) {
  var xml = '';
  for (var prop in obj) {
    xml += obj[prop] instanceof Array ? '' : "<" + prop + ">";
    if (obj[prop] instanceof Array) {
      for (var array in obj[prop]) {
        xml += "<" + prop + ">";
        xml += OBJtoXML(new Object(obj[prop][array]));
        xml += "</" + prop + ">";
      }
    } else if (typeof obj[prop] == "object") {
      xml += OBJtoXML(new Object(obj[prop]));
    } else {
      xml += obj[prop];
    }
    xml += obj[prop] instanceof Array ? '' : "</" + prop + ">";
  }
  var xml = xml.replace(/<\/?[0-9]{1,}>/g, '');
  return xml
}
class loadXMLDoc{
      constructor(dname){
          this._dname=dname;
      }

     cargarxml(){
        let rel=0;
        let xhttp;
       if(rel==0){
           window.location.reload();
           rel=1;
       }
        if(window.XMLHttpRequest){
            xhttp= new XMLHttpRequest();
        }
        else{
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
       
        xhttp.open("GET",this._dname,false);
        
        xhttp.send();
        console.log(this._dname);
        console.log(xhttp.responseXML);
       
        return xhttp.responseXML;
     }

  }



  
     class comprobar{
            static contador=0;
            static tiposolo="";
            static acum=2;

            constructor(tipo,comentario){
                this._tipo= document.getElementById(tipo).value;
                this._comentario= comentario;
                this._tipooriginal=tipo;
               
            }

            consultar(key){
                
                if(typeof(this._tipo) == "string"){
                    
                    
                    if(this._tipo.length== " "){
                        alert("no has escrito nada en " + this._comentario);
                        comprobar.contador+=1;
                    }

                   
                   
                }
                
                
                if(typeof(this._tipo) == "int"){
                    
                    
                    if (this._tipo.length==0){
                        alert("no has escrito nada en "+ this._comentario);
                        comprobar.contador+=1;
                    }

                   
                    
                }

                 comprobar.tiposolo= this._tipooriginal;
                 //console.log(comprobar.tiposolo);
                 comprobar.masuncampo();

               
                
                
                                
            }

           static masuncampo(){
               
                    
                    //console.log(comprobar.tiposolo);
                    let newWord = String(comprobar.tiposolo).replace('1', ''); 
                    //alert(newWord);
                    
                       
                        switch (newWord) {
                            
                             case 'idhasvideoresource':
                             if(addobjects.objetoidhasvideoresource.length>0){
                             console.log(addobjects.objetoidhasvideoresource[0].valor());
                                  
                             for(let i=0;i<=addobjects.objetoidhasvideoresource.length-1;i++){
                                   
                                    if(addobjects.objetoidhasvideoresource[i].valor()==0){
                                        alert("no has escrito nada en "+ "video recurso " + "de la casilla número: " +(i+2) );
                                        comprobar.contador+=1;
                                    }
                                    
                              
                             }
                             
                             }
                             
                             break;
                              case 'idevi':
                              if(addobjects.objetoidevi.length>0){
                               
                              for(let i=0;i<=addobjects.objetoidevi.length-1;i++){
                                  
                             if(addobjects.objetoidevi[i].valor()== 0){
                                    alert("no has escrito nada en "+ "evidencía " + "de la casilla número: " +(i+2));
                                   comprobar.contador+=1;
                                  
                              }}}
                            break;
                            case 'Topic':
                              if(addobjects.objetoTopic.length>0){
                              for(let i=0;i<=addobjects.objetoTopic.length-1;i++){
                                  
                             if(addobjects.objetoTopic[i].valor()== 0){
                                    alert("no has escrito nada en "+ "Tema " + "de la casilla número: " +(i+2) );
                                   comprobar.contador+=1;
                              }}}
                            break;
                            case 'idkey':
                              if(addobjects.objetoidekey.length>0){
                              for(let i=0;i<=addobjects.objetoidekey.length-1;i++){
                                  
                             if(addobjects.objetoidekey[i].valor()== 0){
                                    alert("no has escrito nada en "+ "la palabra clave " + "de la casilla número: " +(i+2) );
                                   comprobar.contador+=1;
                              }}}
                            break;

                            case 'idkeycon':
                              
                              if(addobjects.objetoidkeycon.length-1>0){
                              for(let i=0;i<=addobjects.objetoidkeycon.length-1;i++){
                                  
                             if(addobjects.objetoidkeycon[i].valor()== 0){
                                    alert("no has escrito nada en "+ "la palabra clave " + "de la casilla número: " +(i+2));
                                   comprobar.contador+=1;
                              }}}
                            break;

                            
                            default:
                            console.log('Lo lamentamos, por el momento no disponemos de ' + newWord + '.');
                            }

                           
                        
                            
                        
                    }
                   

                
                    /*else{
                        i=1;
                        break;


                        }*/
                        
                    
                

            

            static verificarcomp(){
                    
                  
                    if(comprobar.contador==0){
                        document.getElementById("varhidden").value=0;
                        let enviocom= new enviarclass();
                        enviocom.enviarserver(1);
                        
                    }
                    else{
                        
                        console.log("en else");
                        document.getElementById("varhidden").value=1;
                        comprobar.contador=0;
                    }
            }

             static verificarcont(){
                    if(comprobar.contador==0){
                        document.getElementById("varhidden").value=0;
                        let enviocon= new enviarclass();
                        enviocon.enviarserver(2);
                        
                    }
                    else{
                        
                        console.log("en else");
                        document.getElementById("varhidden").value=1;
                        comprobar.contador=0;
                    }
            }



        }

        class enviarclass{

            constructor(){

            }

           enviarserver(key){
               let objetoxml = new writexml();
            //var xmlDoc=loadXMLDoc("archivonew.xml"); 
             let xmlDoc1 = new loadXMLDoc("/mvcframe/modelo/referencia.xml");
             if(xmlDoc1==null){   
            //alert("Problemas con el servidor");
             let horaA=new Date();
    let horaB=new Date();
    let diferehora=horaB-horaA;
    while(diferehora<1000){
        horaB=new Date();
        diferehora=horaB-horaA;
        

    }
            document.getElementById("varhiddenno_load").value=1;
            sweetAlert("Problemas con el servidor", "Datos no subidos al servidor", "warning")
    
        }
            
            let xmlDoc=xmlDoc1.cargarxml()
            var NamedIndividual= xmlDoc.getElementsByTagName('owl:NamedIndividual');
        var node = xmlDoc.getElementsByTagName("rdf:type");
        
         let filenew;
              
        //console.log("Named Individual: ",NamedIndividual);
          
        if(key==1){
          filenew=objetoxml.writexmlcom(); /// Se genera el xml de tipo string;
        }
        if(key==2){
            filenew=objetoxml.writexmlcon();
            
        }
        
        let filelast= xmlDoc;   ///se genera el xml con formato objeto;
         // Se crea la instancía X2JS cor la configuración por defecto;
         
         let x2jsonfilelast= new X2JS;
           let x2jsonfilenew = new X2JS;
           console.log(x2jsonfilelast);
           console.log(x2jsonfilenew);

        
        var jsonObj = x2jsonfilenew.xml_str2json(filenew); //Archivo generado nuevo
        

       
        
        var jsonobxmlDoc = x2jsonfilelast.xml2json(filelast); ///xmlDoc es el archivo xml antiguo
        
        
        
        
    
        let longitud=jsonobxmlDoc['RDF'].NamedIndividual.length;  //Obtener el total de competencías y contenidos ingresados hasta el momento;
        
       
        jsonobxmlDoc['RDF'].NamedIndividual[longitud]= jsonObj['RDF'].NamedIndividual; //Se agrega el nuevo contenido al xml en la ultima posición del objeto json.
        //console.log(longitud);
        //alert(jsonobxmlDoc);
        /*for(i=0;i<=longitud;i++){
            console.log(jsonobxmlDoc['RDF'].NamedIndividual[longitud]) //longitud de la competencías ingresadas.



        }*/

        
        
        let xmlnew = x2jsonfilenew.json2xml(jsonobxmlDoc);      //Conversión de json a xml;
    

       let  xmlstr=x2jsonfilelast.json2xml_str(jsonobxmlDoc);  //Conversión de de json a xml en formato string
       
        let xmlnewstr=String(xmlstr); //confirmar el cast a string
        
        //actionSend(xmlnewstr);  //Enviar al servidor php el xml en formato string.
        //convertjson1.conversion(xmlDoc,filelast);
        let envioserver = new actionSend(xmlnewstr);
        
        envioserver.enviar();

           }

           


        }

        
        



    function valor(){
        
        
        let id= new comprobar('idComp','Identificador de competencía');
        
        let videorecurso1= new comprobar('idhasvideoresource1','videorecurso asociado');
        let edad = new comprobar('Edad','Edad');
        let evidencia1= new comprobar('idevi1','Evidencia');
        
        let tema1 = new comprobar('Topic1','Tema');
        let keyword1= new comprobar('idkey1','Palabra clave');
         
        let descripcion1 = new comprobar('Descripcion','Descripción');
        
        let grado1 = new comprobar('Grade','Grado del estudiante');
       
        

        id.consultar();
        
        edad.consultar();
        
        videorecurso1.consultar();
        
        evidencia1.consultar();
       
        tema1.consultar();
       
        keyword1.consultar();
        
        descripcion1.consultar();
        

        grado1.consultar();
        
       
        
        comprobar.verificarcomp();
        

       
        
       
    horaA=new Date();
    horaB=new Date();
    diferehora=horaB-horaA;
    while(diferehora<3000){
        horaB=new Date();
        diferehora=horaB-horaA;
        

    }
    
    
    
    }
    






    function valorcont(){
        
        let titulo1= new comprobar('idTit','Identificador de video');
        
        let identificador1= new comprobar('Identificador','Identificador de video');
        let url1 = new comprobar('url','Edad');
        let competenciacontenido1= new comprobar('competenciacontenido','Evidencia');
        let datecont = new comprobar('datecont','Fecha del video');
        let sinopsis1= new comprobar('Sipnosis','Ingrese la sinopsis');
       
        let durationvideo1 = new comprobar('durationvideo','La duración del video');
        let idkeycon1 = new comprobar('idkeycon1','Palabra clave');
         
        titulo1.consultar();
        identificador1.consultar();
        url1.consultar();
        competenciacontenido1.consultar();
        datecont.consultar();
        sinopsis1.consultar();
        durationvideo1.consultar();
      
        idkeycon1.consultar();
       
        comprobar.verificarcont();

        
        
        
        horaA=new Date();
    horaB=new Date();
    diferehora=horaB-horaA;
    while(diferehora<3000){
        horaB=new Date();
        diferehora=horaB-horaA;
        

    }
    
        
        
        

    }
    


    


    </script>

    
</body>
</html>