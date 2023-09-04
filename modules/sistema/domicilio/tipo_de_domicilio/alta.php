<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div class="dashboard">
    <h1> NUEVO TIPO DE DOMICILIO</h1>
    <section class="inicio">
        <div class="contenido">
            <h2>Alta de nuevo tipo domicilio</h2>
            <form action="procesarAlta.php" method="POST">
                <div class="input-control">
                    Nombre:<input type="text" name="nombre" autocomplete="off">
                    <input type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>