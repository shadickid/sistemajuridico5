<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
$conditional = [
    'activo' => 1
];
$perfiles = selectall('perfil', $conditional);
$empleados = datosEmpleadoAbogado();
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Usuario</a>
    <span>/</span>
    <span>Usuario</span>
</div>
<div class="dashboard">
    <h1> Usuario</h1>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\usuario\listado.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Alta de nuevo usuario</h2>
                <form action="procesarAlta.php" method="POST" class="formulario-container">
                    <div>
                        <label for="empleado" class="formulario-label">Empleado:</label>
                        <select class="formulario-select" id="empleado" name="empleado">
                            <option value="0">--Seleccionar--</option>
                            <?php foreach ($empleados as $regempleado) : ?>
                                <option value="<?php echo $regempleado['id_empleado'] ?>">
                                    <?php echo $regempleado['persona_nombre'] . ' ' . $regempleado['persona_apellido'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                        <label for="perfil" class="formulario-label">Perfil:</label>
                        <select class="formulario-select" id="perfil" name="perfil">
                            <option value="0">--Seleccionar--</option>
                            <?php foreach ($perfiles as $regperfiles) : ?>
                                <option value="<?php echo $regperfiles['id_perfil'] ?>">
                                    <?php echo $regperfiles['descripcion'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <br>
                        <label for="nombre" class="formulario-label"> Nombre: </label>
                        <input class="formulario-input" type="text" name="nombre" autocomplete="off">
                        <br>
                        <label for="nombre" class="formulario-label"> Nombre: </label>
                        <input class="formulario-input" type="text" name="nombre" autocomplete="off">
                        <br>
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