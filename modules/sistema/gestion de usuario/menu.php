<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div>
    <h1>GESTION DE USUARIOS</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <div class="menu">
            <div class="menu-items">
                <a href="<?php echo BASE_URL ?>modules/sistema/Gestion de usuario/perfil/menu.php">Perfil</a>
                <a href="#">Modulos</a>
                <a href="#">Usuarios</a>
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>