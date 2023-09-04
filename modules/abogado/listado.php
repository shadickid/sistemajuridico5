<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
$datosempleado = datosEmpleadoAbogado();
?>
<div class="dashboard">
    <h1>Listado de abogados</h1>

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
                        <a href="#" class="">
                            <button class="darDeBajaButton">
                                <i class="fi-rr-eraser"></i>
                            </button>
                        </a>
                    </td>
                </tr>

            </table>
        </div>
    </section>
    <section class="modal">
        <div class="modal_container">
            <img src="<?php echo BASE_URL ?>assets\img\maxresdefault2-removebg-preview.png" class="modal_img">
            <h2 class="modal_title">Atencion!</h2>
            <p class="modal_parrafo">Estas por dar de baja al abogado
                <!--  <b>
                    <? php // echo $regempleado['persona_nombre'] . ' ' . $regempleado['persona_apellido'] ?>
                </b> -->
            </p>
            <a href="#" class="modal_close">Cerrar</a>
            <a href="#" class="modal_close">Hola</a>
        </div>
    </section>
</div>
<?php endforeach ?>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>