<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\bd_functions.php');
include(ROOT_PATH . 'config\database\functions\usuario.php');
$id_usuario     = $_GET['id_usuario'];
$conditional = [
    'activo' => 1
];
$perfiles       = selectall('perfil', $conditional);
$datosUsuarios  = consultarUsurioModificar($id_usuario);
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
                <?php foreach ($datosUsuarios as $regUsuario) : ?>
                <div class="formulario-container">
                    <h3>Datos del empleado</h3>
                    <div>
                        <lable for="nombre" class="formulario-label">Nombre:</lable>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $regUsuario['persona_nombre'] ?>"
                            class="formulario-input" disabled>
                    </div>
                    <div>
                        <lable for="apellido" class="formulario-label">Apellido:</lable>
                        <input type="text" name="apellido" id="apellido"
                            value="<?php echo $regUsuario['persona_apellido'] ?>" class="formulario-input" disabled>
                    </div>
                    <div>
                        <lable for="usuario" class="formulario-label">Usuario:</lable>
                        <input type="text" name="usuario" id="usuario"
                            value="<?php echo $regUsuario['usuario_nombre'] ?>" class="formulario-input">
                    </div>
                    <div>
                        <lable for="perfil" class="formulario-label">Perfil:</lable>
                        <select class="formulario-select" id="perfil" name="perfil">
                            <option>--Seleccione--</option>
                            <?php foreach ($perfiles as $regperfiles) : ?>
                            <option value="<?php echo $regperfiles['id_perfil']; ?>"
                                <?php if ($regperfiles['id_perfil'] == $regUsuario['id_perfil']) echo 'selected'; ?>>
                                <?php echo $regperfiles['descripcion'] ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <input class="formulario-submit" type="submit" value="Guardar">
                    </div>
                </div>




                <?php endforeach; ?>
            </form>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>