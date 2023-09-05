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
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\menu.php">Domicilio</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\domicilio\tipo_de_domicilio\listado.php">Tipo de domicilio</a>
    <span>/</span>
    <span>Alta de tipo domicilio</span>
</div>
<div class="dashboard">
    <h1> NUEVO TIPO DE DOMICILIO</h1>
    <a href="#" onclick="window.history.go(-1); return false;" class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <h2>Alta de nuevo tipo domicilio</h2>
            <form action="procesarAlta.php" method="POST">
                <div class="input-control">
                    Nombre:<input class="formulario-input" type="text" name="nombre" autocomplete="off">
                    <input class="formulario-submit" type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>