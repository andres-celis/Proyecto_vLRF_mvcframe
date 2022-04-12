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

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mvcframe/vista/css/estilosinicio.css">
    <title>Proyecto VLRF inicio</title>
</head>
<body>

<div class="encabezado">
    <h1>Proyecto VLRF</h1>
    <p>Un website creado para el proyecto vlrf</p>

</div>

<div class="navbar">
    <a href="/mvcframe/vista/inicio.php">Inicio</a>
    <a href="/mvcframe/vista/Nosotros.php">Nosotros</a>
    <a href="/index.php">Editar</a>
    <form class="form-inline">
            <input class="form-control mr-sm-2" name="cadena" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        <input type="hidden" name="m" value="buscar">
    </form>
    

</div>

<div class="row">
    <div class="side">
        <h2>Sobre el proyecto</h2>
        <div class="imagenso" style="height: 200px;"><img src="img/proyecto.png" style="height: 200px; width: 300px;"></div>
    
    <p>Patrocinado por los siguientes entes</p>
    <div class="imagenso" style="height:60px;"><img src="img/gobernacion_cauca.png" style="height: 60px; width: 100px;"></div>
    <div class="imagenso" style="height:60px;"><img src="img/sgr.png" style="height: 60px;"></div>
    <div class="imagenso" style="height:60px;"><img src="img/uni-cauca.jpg" style="height: 60px;"></div>
    </div>

<div class="main">
    <h2>Resumen</h2>
    <div class="imagenso"><img src="img/educacion.jpg" style="height: 200px;" style="width: 60%;"></div>

    <p>Fortalecimiento de capacidades de CTel para la innovación 
        Básica y media, mediante uso de la plataforma de recomendaciones
        de contenidos de video(vLRF) en instituciones
        oficiales y privadas.
    </p>

</div>
</div>

</body>
</html>

<?php
require_once("layout/footer.php");
