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
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Usuario</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\modulo\listado.php">Modulo</a>
    <span>/</span>
    <span>Alta de modulo</span>
</div>
<div class="dashboard">
    <h1>Modulo</h1>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\modulo\listado.php" class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Alta de nuevo modulo</h2>
                <form action="procesarAlta.php" id="formulario" method="POST">
                    <label for="nombre" class="formulario-label"> Nombre:</label>
                    <input class="formulario-input" type="text" id="nombre" name="nombre" autocomplete="off">
                    <input class="formulario-submit" type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>