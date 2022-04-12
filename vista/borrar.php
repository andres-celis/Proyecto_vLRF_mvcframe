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

<?php
            if(!empty($dato)): 
                print_r($dato);
            endif;
            if(!empty($oauth)):
                $oauth1="true";
                print_r($oauth);
            endif;
            if(!empty($boleano)):
                
            print_r($boleano);
            endif;
?>