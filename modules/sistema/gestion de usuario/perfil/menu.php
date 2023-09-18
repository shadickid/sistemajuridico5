<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div class="dashboard">
    <h1>Perfil</h1>
    <a href="#" onclick="window.history.go(-1); return false;" class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div class="menu">
                <div class="menu-items">
                    <a href="<?php echo BASE_URL ?>"></a>
                    <a href="<?php echo BASE_URL ?>"></a>
                    <a href="<?php echo BASE_URL ?>"></a>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>