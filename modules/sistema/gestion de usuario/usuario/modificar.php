<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');

$id_usuario = $_GET['id_usuario'];

?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Usuario</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\usuario\listado.php">Listado de usuario</a>
    <span>/</span>
    <span>Modificar usuario</span>
</div>
<div class="dashboard">
    <h1>Usuario</h1>
    <a href="listado.php" class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <h2>Modificar usuario</h2>
            <form id="formulario" action="procesarModificacion.php" method="post">
                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

            </form>
        </div>
    </section>
</div>