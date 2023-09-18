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
    <span>Usuario</span>
</div>
<div class="dashboard">
    <h1>Gestion de usuarios</h1>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php" class="volver-atras-button">Volver Atrás</a>
    <section class="inicio">
        <div class="contenido">
            <div class="menu">
                <div class="menu-items">
                    <a
                        href="<?php echo BASE_URL ?>modules\sistema\gestion de usuario\perfil\nuevo_perfil\listado.php">Perfil</a>
                    <a href="<?php echo BASE_URL ?>">Modulos</a>
                    <a href="<?php echo BASE_URL ?>">Usuarios</a>
                    <a href="<?php echo BASE_URL ?>modules\sistema\gestion de usuario\sexo\listado.php">Sexo</a>

                </div>

            </div>
    </section>





</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>