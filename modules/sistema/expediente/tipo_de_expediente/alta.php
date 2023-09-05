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
    <a href="<?php echo BASE_URL; ?>modules\sistema\expediente\menu.php">Expediente</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\expediente\tipo_de_expediente\listado.php">Tipo de
        expediente</a>
    <span>/</span>
    <span>Alta de tipo de expedientes </span>
</div>
<div class="dashboard">
    <h1> TIPO DE EXPEDIENTE</h1>
    <a href="#" onclick="window.history.go(-1); return false;" class="volver-atras-button">Volver Atr&aacute;s</a>

    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Alta de nuevo estado de expediente</h2>
                <form action="procesarAlta.php" method="POST">
                    <div>
                        <legend> Nombre:
                            <input class="formulario-input" type="text" name="nombre" autocomplete="off">
                            <input class="formulario-submit" type="submit" value="Guardar">
                        </legend>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
    include(ROOT_PATH . 'includes\footter.php');
    ?>