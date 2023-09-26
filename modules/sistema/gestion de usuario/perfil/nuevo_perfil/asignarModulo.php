<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'config\database\functions\modulo.php');

$conditional = [
    'estado_logico' => 1
];
$modulos = selectall('modulo', $conditional);
$id_perfil      = $_GET['id_perfil'];
$descripcion    = $_GET['descripcion'];
$perfilesxmodulo = consultarPerfilxModulo($id_perfil);

?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Usuario</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\perfil\nuevo_perfil\listado.php">Perfil</a>
    <span>/</span>
    <span>Asignacion de modulos al perfil</span>
</div>
<div class="dashboard">
    <h1>Perfil</h1>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\perfil\nuevo_perfil\listado.php" class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <h2>Asignar Modulo a <?php echo $descripcion; ?></h2>
            <form class="formulario-container" method="post" action="procesarModulo.php">
                <label for="modulo" class="formulario-label">Seleccione los módulos para el perfil:</label>
                <select id="modulo" name="modulo[]" class="formulario-select" multiple>
                    <option value="0">--Seleccione--</option>
                    <?php foreach ($modulos as $regmodulos) : ?>
                        <option value="<?php echo $regmodulos['id_modulo']; ?>" <?php if (in_array($regmodulos['id_modulo'], array_column($perfilesxmodulo, 'id_modulo'))) echo 'selected'; ?>>
                            <?php echo $regmodulos['descripcion']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <input class="formulario-submit" type="submit" value="Guardar">
            </form>
        </div>

    </section>
</div>
<?php

include(ROOT_PATH . 'includes\footter.php');
?>