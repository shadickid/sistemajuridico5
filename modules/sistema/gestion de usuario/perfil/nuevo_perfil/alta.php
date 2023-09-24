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
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Usuario</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\perfil\nuevo_perfil\listado.php">Listado de
        perfiles</a>
    <span>/</span>
    <span>Alta de nuevo perfil </span>
</div>
<div class="dashboard">
    <h1> Perfil</h1>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\perfil\nuevo_perfil\listado.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Alta de nuevo perfil</h2>
                <form action="procesarAlta.php" method="POST">
                    <div>
                        <label for="nombre" class="formulario-label"> Nombre: </label>
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