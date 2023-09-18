<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>">algo</a>
    <span>/</span>
    <span>algo</span>
</div>
<div class="dashboard">
    <h1>Titulo de algo</h1>
    <a href="<?php echo BASE_URL; ?>" class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">

        </div>

    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>