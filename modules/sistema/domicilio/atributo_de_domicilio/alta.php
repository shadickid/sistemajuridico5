<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div>
    <h1>ATRIBUTO DE DOMICILIO</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <div class="formulario-container">
            <h2>Alta de nuevo atributo de domicilio</h2>
            <form action="procesarAlta.php" method="POST">
                <div>
                    <legend> Nombre:
                        <input class="formulario-input" type="text" name="nombre" autocomplete="off">
                        <input class="formulario-submit" type="submit" value="Guardar">
                    </legend>
                </div>
        </div>
        </form>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>