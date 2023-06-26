<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div>
    <h1>EXPEDIENTE</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <div class="menu">
            <div class="menu-items">
                <a href="<?php echo BASE_URL ?>modules/sistema/expediente/estado_de_expediente/listado.php">Estado de
                    Expediente</a>
                <a href="<?php echo BASE_URL ?>modules\sistema\expediente\tipo_de_expediente\listado.php">Expediente
                    tipo</a>
                <a href="#">Expediente subtipo</a>
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>