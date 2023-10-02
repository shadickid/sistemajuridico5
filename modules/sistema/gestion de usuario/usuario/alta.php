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
$empleados = datosEmpleadoAbogadosinUser();
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
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\usuario\listado.php"
        class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <h2>Alta de nuevo usuario</h2>
            <form action="procesarAlta.php" method="POST" class="formulario-form">
                <div class="formulario-container">
                    <div class="input-control">
                        <label for="empleado" class="formulario-label">Empleado:</label>
                        <select class="formulario-select" id="empleado" name="empleado">
                            <option value="0">--Seleccionar--</option>
                            <?php foreach ($empleados as $regempleado): ?>
                                <option value="<?php echo $regempleado['id_empleado'] ?>">
                                    <?php echo $regempleado['persona_nombre'] . ' ' . $regempleado['persona_apellido'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-control">
                        <label for="perfil" class="formulario-label">Perfil:</label>
                        <select class="formulario-select" id="perfil" name="perfil">
                            <option value="0">--Seleccionar--</option>
                            <?php foreach ($perfiles as $regperfiles): ?>
                                <option value="<?php echo $regperfiles['id_perfil'] ?>">
                                    <?php echo $regperfiles['descripcion'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="input-control">
                        <label for="usuario" class="formulario-label">Ingrese nombre de usuario:</label>
                        <input class="formulario-input" id="usuario" type="text" name="usuario" autocomplete="off">
                    </div>
                    <div class="input-control">
                        <label for="contrasena" class="formulario-label"> Contrase&ntilde;a: </label>
                        <input class="formulario-input" type="password" value="12345" readonly name="contrasena"
                            id="contrasena" autocomplete="off">
                    </div>
                    <div class="input-control">
                        <input class="formulario-submit" type="submit" value="Guardar">

                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>