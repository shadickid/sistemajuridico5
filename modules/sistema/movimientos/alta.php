<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div>
    <h1> NUEVO MOVIMIENTO</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <h2>Alta de nuevo movimiento</h2>
        <form action="procesarAlta.php" method="POST">
            <div class="input-control">
                Nombre:<input type="text" name="nombre" autocomplete="off">
                <input type="submit" value="Guardar">
            </div>
        </form>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>