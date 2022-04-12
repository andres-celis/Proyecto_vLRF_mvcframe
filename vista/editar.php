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
<script>
mensaje="Si va editar tome en cuenta la siguiente información: El formato de la fecha debe ser el día, despues el mes en formato númerico y por ultimo el año de la siguiente forma: dd/mm/yyyy.  Le agradecemos por leer esta información";
alert(mensaje);
</script>
<?php
require_once("layout/header.php");
?>

<nav >
    <ul>
        <li><a href="/mvcframe/inicio.php">Inicio</a></li>
        <li>Nosotros</li>
        <li><a href="/index.php">Editar</a></li>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        
    </ul></br>
    
    <div class="hide">
    <i class="fa fa-bars" aria-hidden="true">Menu</i>
    </div>
</nav>

<script>
    $(".hide").on('click',function(){
        $("nav ul").toggle('slow');
    });

</script>
<?php
$del=0;
$arreglo=$dato;

$i=$arreglo['fila'];
$arreglo1=$arreglo['arreglo'];
$cont=0;
?>
<script>var acum=0;</script>
  
<select name="anadir" id="anadir">
    <option>Video recurso(solo para competencías)</option>
    <option>Palabra clave competencía(solo para competencías)</option>
    <option>Evidencía de aprendizaje competencía(solo para competencías)</option>
    <option>Tema de competencía(solo para competencías)</option>
    <option>Palabra clave video(solo para videos)</option>
</select>
  <!--Genera un elemento de tipo select, que permite obtener el 
  //tipo de input que el usuario quiere ingresar en el archivo xml.-->
<script>select = document.getElementById("anadir")</script>
  <!--El select Captura la opción seleccionada por el usuario.-->
<script>value = select.value</script>
<!--Obtiene el valor del select.-->
<script>console.log(value)</script>
<button onclick="myFunction()">Añadir</button>
<button onclick="Eliminar()">Eliminar</button>
 
<script>function myFunction(){
    console.log(acum);
      //Genera los inputs.
    select = document.getElementById("anadir");
    value = select.value;
    let input = document.createElement("input");
    let espacio= document.createElement("br");
    let label= document.createElement("label");
    input.setAttribute('type', 'text');
    input.setAttribute('id',1);
    input.setAttribute('class',"class"+1);
    input.setAttribute("name",value+"/"+acum);
    input.setAttribute("placeholder",value);
    input.setAttribute('size',100);
    input.setAttribute('required','true');
    espacio.setAttribute('type', 'text');
    label.setAttribute('type','text');
    label.setAttribute('name','label'+acum);
    console.log('este es video recurso'+value);
    label.innerHTML=value;
    let labeltag=document.getElementById("field2").appendChild(label);
    let ty=document.getElementById("field2").appendChild(input);
    document.getElementById("field2").appendChild(espacio);
    acum=acum+1;
    console.log(labeltag);
    console.log(ty);}
    </script>
  <!--función para eliminar los inputs desde el ultimo generado
  //hasta el primero.-->
    <script>function Eliminar(){
      console.log(acum);
      let inputdel = document.getElementById("field2");
      let size = Object.keys(inputdel).length;
      console.log(size);
      removelastChildNodes(inputdel);
      acum=acum-1;
    <?php strval($cont=$cont+1); ?>
    }
    </script>
    <script>function removelastChildNodes(parent){ //remueve el ultimo nodo hijo que se agrega.
      parent.removeChild(parent.lastChild);
      parent.removeChild(parent.lastChild);
      parent.removeChild(parent.lastChild);
      <?php strval($cont=$cont-1); ?>
    }
    </script> 

</br>

<div>
<fieldset>
        <form action="" method="post">
        <br> 
        <div id="field2">
            
            
            </div>
            
            <br>
        <?php
            
            for ($j=0;$j<count($arreglo1[$i])-1; $j++) {

            echo $arreglo1[$i][$j]["tag"];
            echo ':';


            if (array_key_exists("value", $arreglo1[$i][$j])) {

            //Verifica que exista un atributo "valor" en el arreglo.
            ?>    
            <input type=text maxlength="400" size=40 style="width:900px" required="true" value="<?php echo strval($arreglo1[$i][$j]["value"])?>" name="iden<?php echo $j?>" >
                <a id=var<?php $i ?> href='/index.php?m=eliminarnodohijo&hello=true&valor1=<?php echo $i*2?>&valor2=<?php echo $j ?>' onclick="return confirm('Esta seguro que desea eliminar el valor, recuerde que una vez se elimina no lo puede recuperar'); false">Eliminar</a>
             </br>
    <?php
      } else {
          //print_r($valor[$j]);
          if (array_key_exists("RDF:RESOURCE", $arreglo1[$i][$j]["attributes"])) {
              //Verifica que exista un atributo "RDF:RESOURCE" en 
              //el arreglo.
              ?>
              <input type=text maxlength="400" size=40 style="width:900px" required="true" value="<?php echo strval($arreglo1[$i][$j]["attributes"]["RDF:RESOURCE"])?>"" name="iden<?php echo $j ?>">
              <a id=var<?php $i ?> href='/index.php?m=eliminarnodohijo&hello=true&valor1=<?php echo $i*2?>&valor2=<?php echo $j ?>' onclick="return confirm('Esta seguro que desea eliminar el valor, recuerde que una vez se elimina no lo puede recuperar'); false">Eliminar</a>
              </br>
              <?php
                }
                if (array_key_exists("RDF:DATATYPE", $arreglo1[$i][$j]["attributes"])) {
               //Verifica que exista un atributo "RDF:DATATYPE" en 
              //el arreglo.
              ?>
              <input type=text maxlength="400" size=40 style="width:900px" required="true" value="<?php echo strval($arreglo1[$i][$j]["attributes"]["RDF:DATATYPE"])?>" name="iden<?php $j ?>" >
              <a id=var<?php $i ?> href='/index.php?m=eliminarnodohijo&hello=true&valor1=<?php echo $i*2?>&valor2=<?php echo $j ?>' onclick="return confirm('Esta seguro que desea eliminar el valor, recuerde que una vez se elimina no lo puede recuperar'); false">Eliminar</a>
              </br>
                <?php
                }
            }
        }
        ?>
        <input name="acum" type="hidden" value=<?php echo $cont ?>>
        <input name="idvalor" type="hidden" value=<?php echo $i?>>
        <input name="del" type="hidden" value=<?php echo $del ?>>
  <!--Envia el valor de la fila que se esta editando del archivo.-->
        <input type="submit" class="enviar" value="Actualizar">
        <input type="hidden" name="m" value="update">
        <br>
       
        </form>
        
        </fieldset>
        </div>
    
        
        <a href="/index.php" class="regresar">Regresar</a>
        <a href="/mvcframe/vista/inicio.php" class="inicio">Inicio</a>
        


        <?php
require_once("layout/footer.php");
?>

