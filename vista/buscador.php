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

<nav >
    <ul>
        <li><a href="/mvcframe/inicio.php">Inicio</a></li>
        <li>Nosotros</li>
        <li>Editar</li>
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
<a href="/index.php" class="regresar">Regresar</a>
<a href="/mvcframe/vista/inicio.php" class="inicio">Inicio</a>
<table>
    <tr>
        <td>Acción</td>
        <td>Nombre</td>
        

    </tr>

    <tbody>
        <?php
            if(!empty($dato)):
     
                foreach($dato as $key => $value):
                    $fila=$value['fila'];
                    $value=$value['arreglo'];
                    
                ?>
                
                <tr>
                                <td>
                                
                                    <a class="btn" id=var<?php echo $fila?> href="/mvcframe/index.php?m=editar&hello=true&valor1=<?php echo $fila?>&valor2=0">EDITAR</a>
                                    <a class="btn" id=var<?php echo $fila?> href="/mvcframe/index.php?m=eliminar&hellodel=true&valor1=<?php echo $fila?>" onclick="return confirm('Esta seguro que desea eliminar el valor, recuerde que una vez se elimina no lo puede recuperar'); false">ELIMINAR</a>

                                </td>
                
    
                                        <td><?php print_r($value)?></td>
                                        
                    
                    </tr>
                <?php endforeach?>
            <?php else: ?>
                <tr>
                    <td colspan="3">NO HAY REGISTROS</td>
                </tr>
            <?php endif ?>
    </tbody>
    </table>
    </div>
    
        
        <?php
require_once("layout/footer.php");
?>

 <!--echo "<tr>";
                        echo "<td style=padding:3px; background-color:#F5D0A9;>" . "<a class='editar' id=var" . $i . " " . "href='Editarconobjetos.php?hello=true&valor1=" . $i . "&valor2=0'>Editar</a>" . "<a class='eliminar' id=var" . $i . " " . "href='Editarconobjetos.php?hellodel=true&valor1=" . $i . "'>Eliminar</a>";
                        echo "<td style=padding:3px;
        background-color:#F5D0A9;>" . $valor[$j]["value"] . "</td>";
                        echo "</tr>";
                        

echo "<tr>";
                            echo "<td style=padding:3px; background-color:#F5D0A9;>" . "<a class='editar' id=var" . $i . " " . "href='Editarconobjetos.php?hello=true&valor1=" . $i . "&valor2=0'>Editar</a>" . "<a class='eliminar' id=var" . $i . " " . "href='Editarconobjetos.php?hellodel=true&valor1=" . $i . "'>Eliminar</a>";
                            // if($valor[$j]["attributes"]["RDF:RESOURCE"]== $cadena || $valor[$j]["attributes"]["RDF:RESOURCE"]== strtoupper($cadena) || $valor[$j]["attributes"]["RDF:RESOURCE"]== strtolower($cadena) || $valor[$j]["attributes"]["RDF:RESOURCE"]== ucfirst($cadena)){
                            echo "<td style=padding:3px;
        background-color:#F5D0A9;>" . $valor[$j]["attributes"]["RDF:RESOURCE"] . "</td>";
                            echo "</tr>";


echo "<tr>";
                            echo "<td style=padding:3px; background-color:#F5D0A9;>" . "<a class='editar' id=var" . $i . " " . "href='Editarconobjetos.php?hello=true&valor1=" . $i . "&valor2=0'>Editar</a>" . "<a class='eliminar' id=var" . $i . " " . "href='Editarconobjetos.php?hellodel=true&valor1=" . $i . "'>Eliminar</a>";
                            // if($valor[$j]["attributes"]["RDF:DATATYPE"]== $cadena || $valor[$j]["attributes"]["RDF:DATATYPE"]== strtoupper($cadena) || $valor[$j]["attributes"]["RDF:DATATYPE"]== strtolower($cadena) || $valor[$j]["attributes"]["RDF:DATATYPE"]== ucfirst($cadena)){
                            echo "<td style=padding:3px;
        background-color:#F5D0A9;>" . $valor[$j]["attributes"]["RDF:DATATYPE"] . "</td>";
                            