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
    <span>Expediente</span>

</div>
<div class="dashboard">
    <h1>EXPEDIENTE</h1>
    <a href="#" onclick="window.history.go(-1); return false;" class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div class="menu">
                <div class="menu-items">
                    <a href="<?php echo BASE_URL ?>modules/sistema/expediente/estado_de_expediente/listado.php">Estado
                        de
                        Expediente</a>
                    <a href="<?php echo BASE_URL ?>modules\sistema\expediente\tipo_de_expediente\listado.php">Expediente
                        tipo</a>
                    <a href="<?php echo BASE_URL ?>modules\sistema\expediente\tipo_de_sub_expediente\listado.php">Expediente
                        subtipo</a>
                    <a href="<?php echo BASE_URL ?>modules\sistema\movimientos\listado.php">Movimientos del
                        expediente</a>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>