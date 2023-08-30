<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
$datosempleado = datosEmpleadoAbogado();
?>
<div>
    <h1>Listado de abogados</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <div>
            <a href="alta.php" class="a-alta">Nuevo Abogado</a>
        </div>
        <table class="tablamodal">
            <tr>
                <th>ID</th>
                <th>Nombres y Apellidos</th>
                <th>Especialidad</th>
                <th>Usuario</th>
                <th>Modificar</th>
                <th>Borrar</th>
            </tr>
            <tr>
                <?php foreach ($datosempleado as $regempleado): ?>
                <td><?php echo $regempleado['id_empleado']?>
                </td>
                <td>
                    <?php echo $regempleado['persona_nombre'] . " " . $regempleado['persona_apellido'] ?>
                </td>
                <td>
                    <?php echo $regempleado['descripcion'] ?>
                </td>
                <td>
                    <?php echo $regempleado['usuario_nombre'] ?>
                </td>
                <td>
                    <a href="modificar.php">
                        <button class="editarButton">
                            <i class="fi fi-rr-edit"></i>
                        </button>
                    </a>
                </td>
                <td>
                    <a href="eliminar.php">
                        <button class="darDeBajaButton">
                            <i class="fi-rr-eraser"></i>
                        </button>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>

    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>