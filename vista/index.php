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
require_once("layout/header.php");

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<nav >
    <ul>
        <li><a id="hiper" class="hiper" href="mvcframe/vista/inicio.php">Inicio</a></li>
        <li><a id="hiper" class="hiper" href="mvcframe/vista/index.php">Nosotros </a></li>
        <li><a id="hiper" class="hiper" href="index.php">Editar</a></li>
        <form class="form-inline">
            <input class="form-control mr-sm-2" name="cadena" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        <input type="hidden" name="m" value="buscar">
        </form>
        <button id="login" onclick="document.getElementById('log').style.display='block'" style="border: 0; background: transparent" style="width: 20px;
                height: 30px;">
                      <img class="login" src="mvcframe/vista/img/sgr.png" alt="submit" />
                      </button>
        <?php
        
        $oauth1="false";
        if(!empty($_SESSION["valid"])):
                
                $oauth1=$_SESSION["valid"];
                
                if($oauth1=="false"):
                    ?>
                    <script>Swal.fire({
                        icon: 'warning',
                        title: 'Recuerde para poder eliminar o editar, necesita ingresar las credenciales',
                        text: 'Las credenciales no se han definido!',
  
                        })</script>
                <?php
                
                
                
                ?>
                
                      <?php
                endif;
                
                if($oauth1=="true"):
                    $_SESSION["username"]="true";
                    
                $oauth1=$_SESSION["username"];
               ?>
               
                    <script> document.getElementById('login').style.display="none";</script>
                    <button id="close" class="close" onclick="reset()">Cerrar sesion</button>
                    <script> document.getElementById('close').style.display="block";</script>
        <?php
            endif;
        endif;
        ?>
    </ul>
    </nav>
</br>

<script>
    function reset(){
        window.location.href="index.php?m=autenticar&name=vacio&psw=vacio";
    }

</script>
    
    <div id="log" class="modal">
        <form class="modal-content animate" method="get">
            <div class="imgcontainer">
                <span onclick="document.getElementById('log').style.display='none'"
                class="close" title="Close Modal">&times;
                </span>
                <img class="avatar_login" src="/mvcframe/vista/img/business-person.png" alt="Avatar" width="20" height="20" class="avatar">
            </div>

            <div class="container">
                <label for="name"><b>Nombre de usuario</b></label>
                <input type="text" placeholder="Ingrese el nombre de usuario" name="name" required>
            
                <label  for="psw"><b>Contraseña</b></label>
                <input id="contrasena" type="password" placeholder="Ingrese la contraseña" name="psw" required>
                
                    
                <button class="btn btn-primary" type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
            
                <button class="ingreso" type="submit">Login</button>
                <input type="hidden" name="m" value="autenticar">
                <label>
                    <input type="checkbox" checked="checked" name="remember">Recordarme
                </label>
            
            </div>

            <div class="container" style="background-color: #fff2cc;">
                <button type="button" onclick="document.getElementById('log').style.display='none'"
                class="cancelbtn">Cancelar</button>
                <span class="psw">Olvide la <a href="#">contraseña?</a></span>
            </div>
            <a class="atribuccion" href="https://www.flaticon.com/free-icons/people" title="people icons">People icons created by photo3idea_studio - Flaticon</a>
        

        </form> 




    </div>
    
    <script>
        var modal= document.getElementById('log');
        
        window.onclick = function(event){
            if (event.target == modal){
                modal.style.display = "none"
            }
        }

    </script>

    <div class="hide">
    <i class="fa fa-bars" aria-hidden="true">Menu</i>
    </div>


<script>
    $(".hide").on('click',function(){
        $("nav ul").toggle('slow');
    });

</script>

<script>
    function mostrarContrasena(){
        var tipo=document.getElementById("contrasena");
        if(tipo.type=="password"){
            tipo.type="text";
        }
        else{
            tipo.type="password";
        }
    }
</script>
<a href="index.php?m=nuevo" class="btn">Nuevo</a>
<table id="usuarios" class="display" width="100%" cellspacing="0">
 <thead>
    <tr>
        <td>Acción</td>
        <td>Nombre</td>
        

    </tr>
 </thead>
    <tbody>
        <?php
            if(!empty($dato)):
                
                

                if(!empty($oauth)):
                    if($oauth=="false" && $_SESSION["valid"]=="false"):
                        ?>
                        <script>Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Las credenciales son invalidas!',
  
                        })</script>
                    <?php
                    endif;
                endif;
               
                $arreglo1=$dato['arreglo'];
                           
                foreach($arreglo1 as $key => $value):
                     
                ?>
                <tr>
                                <td>
                                
                                    <a class="btn" id=var<?php echo $key?> href="/index.php?m=editar&hello=true&valor1=<?php echo $key*2?>&valor2=0" onclick="<?php  if($oauth1=="false"){?>opcion=confirm('Necesita autenticarse'); if(opcion=true){return false}else{return false}<?php } ?>">EDITAR</a>
                                    <a id=var<?php echo $key?> href="/index.php?m=eliminar&hellodel=true&valor1=<?php echo $key*2?>" onclick="<?php if($oauth1=="false"){?>opcion=confirm('Necesita autenticarse'); if(opcion=true){return false}else{return false}<?php } else{?>opcion=confirm('Esta seguro que desea eliminar el nodo, recuerde que una vez lo elimina, no lo puede recuperar'); if(opcion=true){return true}else{return false}<?php } ?>" class="btn">Eliminar
                                        
                                        
                                        </a>

                                </td>
                <?php
                    
                        foreach($value as $v => $j):
                            
                            ?>
                                
                            <?php
                                
                                if($j["tag"]=="VIDEORESOURCETITLE" || $j["tag"]=="COMPETENCYID"): //Solo muestra los atributos del nodo hijo que correspondan con el titulo del video si es contenido o con el ID de la competencía si es competencía.
                                    if(array_key_exists("value",$j)):
                                        ?>
                                        <td><?php print_r($j["value"])?></td>
                                        <?php
                                    
                                
                        
                                    else:                
                                        if(array_key_exists("RDF:RESOURCE",$j["attributes"])): //Solo muestra los atributos del nodo hijo que correspondan con el titulo del video si es contenido o con el ID de la competencía si es competencía.
                                        ?>
                                            <td><?php print_r($j["attributes"]["RDF:RESOURCE"])?></td>
                                        <?php
                                        endif;
                                        if(array_key_exists("RDF:DATATYPE",$j["attributes"])): //Solo muestra los atributos del nodo hijo que correspondan con el titulo del video si es contenido o con el ID de la competencía si es competencía.
                                        ?>
                                            <td><?php print_r($j["attributes"]["RDF:DATATYPE"])?></td>
                                        <?php
                                        endif;
                                    endif;
                                endif;     
                                ?>           
                     
                    
                        
                        
                        
                        
                    
                    
                    <?php endforeach?>
                    </tr>
                <?php endforeach?>
            <?php else: ?>
                <tr>
                    <td colspan="3">NO HAY REGISTROS</td>
                </tr>
            <?php endif ?>
    </tbody>

</table>
<!-- Page level plugins -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    	
    

    <!-- Page level custom scripts -->
    <script src="mvcframe/vista/js/usuarios.js"></script>
<?php
require_once("layout/footer.php");
