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
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Expediente</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\expediente\estado_de_expediente\listado.php">Estado de
        expediente</a>
    <span>/</span>
    <span>Alta de estado de expediente </span>
</div>
<div class="dashboard">
    <h1> ESTADO DE EXPEDIENTE</h1>
    <a href="<?php echo BASE_URL; ?>modules\sistema\expediente\estado_de_expediente\listado.php" class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Alta de estado de expediente</h2>
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