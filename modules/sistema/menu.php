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
                <a href="<?php echo BASE_URL ?>modules/sistema/expediente/menu.php">Gestion de Expediente</a>
                <a href="<?php echo BASE_URL ?>modules/sistema/gestion de usuario/menu.php">Gestion de usuarios</a>
                <a href="<?php echo BASE_URL ?>modules/sistema/domicilio/menu.php">Domicilio</a>
                <a href="<?php echo BASE_URL ?>modules/sistema/movimientos/listado.php">Tipo Movimiento</a>
            </div>
            <div class="menu-items">
                <a href="<?php echo BASE_URL ?>modules/sistema/contacto/listado.php"> Tipo Contacto</a>
                <a href="<?php echo BASE_URL ?>modules/sistema/documento/listado.php">Tipo Documento</a>
                <a href="#">Gestion de especializacion</a>
                <a href="#">Gestion de tipo empleado</a>
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>