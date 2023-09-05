<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\documento\listado.php">Documento</a>
    <span>/</span>
    <span>Alta documento</span>
</div>
<div class="dashboard">
    <h1> Documento</h1>
    <a href="#" onclick="window.history.go(-1); return false;" class="volver-atras-button">Volver Atrás</a>
    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Alta de nuevo tipo de documento</h2>
                <form action="procesarAlta.php" method="POST">
                    <div>
                        <legend> Nombre:
                            <input class="formulario-input" type="text" name="nombre" autocomplete="off">
                            <input class="formulario-submit" type="submit" value="Guardar">
                        </legend>
                    </div>
            </div>
            </form>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>