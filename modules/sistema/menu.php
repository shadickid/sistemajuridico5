<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div>
    <h1>SISTEMA</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <div class="menu">
            <div class="menu-items">
                <a href="<?php echo BASE_URL ?>modules/sistema/expediente/menu.php">Expediente</a>
                <a href="<?php echo BASE_URL ?>modules/sistema/perfil/menu.php">Perfil</a>
                <a href="#">Reporte</a>
                <a href="#">Movimiento</a>
            </div>
            <div class="menu-items">
                <a href="<?php echo BASE_URL ?>modules/sistema/contacto/listado.php">Contacto</a>
                <a href="<?php echo BASE_URL ?>modules/sistema/documento/listado.php">Documento</a>
                <a href="#">Modulo</a>
                <a href="#">Usuario</a>
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>