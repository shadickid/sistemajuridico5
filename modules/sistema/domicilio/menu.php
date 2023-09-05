<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <span>Domicilio</span>
</div>
<div class="dashboard">
    <h1>DOMICILIO</h1>
    <a href="#" onclick="window.history.go(-1); return false;" class="volver-atras-button">Volver Atr&Aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div class="menu">
                <div class="menu-items">
                    <a href="<?php echo BASE_URL ?>modules/sistema/domicilio/pais/listado.php">Pais</a>
                    <a href="<?php echo BASE_URL ?>modules/sistema/domicilio/provincia/listado.php">Provincia</a>
                </div>
                <div class="menu-items">
                    <a href="<?php echo BASE_URL ?>modules/sistema/domicilio/localidad/listado.php">Localidad</a>
                    <a href="#">Barrio</a>
                </div>
                <div class="menu-items">
                    <a href="<?php echo BASE_URL ?>modules/sistema/domicilio/atributo_de_domicilio/listado.php">Atributos
                        de
                        domicilio</a>
                    <a href="<?php echo BASE_URL ?>modules/sistema/domicilio/tipo_de_domicilio/listado.php">Tipo
                        domicilio</a>
                </div>
            </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>