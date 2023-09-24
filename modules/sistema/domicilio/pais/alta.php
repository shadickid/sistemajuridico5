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
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Domicilio</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\pais\listado.php">Pais</a>
    <span>/</span>
    <span>Alta de pais</span>
</div>
<div class="dashboard">
    <h1> PAIS</h1>
    <a href="<?php echo BASE_URL ?>modules\sistema\domicilio\pais\listado.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Alta de nuevo pais</h2>
                <form action="procesarAlta.php" method="POST">
                    <div class="input-control">
                        <label class="formulario-label" for="nombre">Nombre:</label>
                        <input class="formulario-input" type="text" name="nombre" autocomplete="off">
                        <input class="formulario-submit" type="submit" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>