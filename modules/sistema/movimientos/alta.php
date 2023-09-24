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
    <a href="<?php echo BASE_URL; ?>modules\sistema\movimientos\listado.php">Movimiento de expedientes</a>
    <span>/</span>
    <span>Alta de movimiento de expediente</span>
</div>
<div class="dashboard">
    <h1>MOVIMIENTO DE EXPEDIENTE</h1>
    <a href="<?php echo BASE_URL ?>modules\sistema\movimientos\listado.php" class="volver-atras-button">VolverAtr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Alta de nuevo movimiento</h2>
                <form action="procesarAlta.php" method="POST">
                    <div class="input-control">
                        <label for="nombre" class="formulario-label">Nombre:</label>
                        <input type="text" class="formulario-input" name="nombre" autocomplete="off">
                        <input type="submit" class="formulario-submit" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>