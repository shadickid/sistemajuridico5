<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
$datosempleado = datosEmpleadoAbogado();
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <span>Abogado</span>
</div>
<div class="dashboard">
    <h1>Listado de abogados</h1>
    <a href="#" onclick="window.history.go(-1); return false;" class="volver-atras-button">Volver Atrás</a>

    <section class="inicio">
        <div class="contenido">
            <div>
                <a href="formulario_abogado.php" class="a-alta">Nuevo Abogado</a>
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
                        <td>
                            <?php echo $regempleado['id_empleado'] ?>
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
                            <a
                                href="<?php echo BASE_URL ?>modules\abogado\modificar.php?idPersonaFisica=<?php echo $regempleado['id_persona_fisica'] ?>">
                                <button class="editarButton">
                                    <i class="fi fi-rr-edit"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo BASE_URL ?>modules\abogado\modal_borrar.php?idPersonaFisica=<?php echo $regempleado['id_persona_fisica'] ?>"
                                class="openModal">
                                <button class="darDeBajaButtonv2">
                                    <i class="fi-rr-eraser"></i>
                                </button>
                            </a>
                        </td>
                    </tr>

                <?php endforeach ?>
            </table>
        </div>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>