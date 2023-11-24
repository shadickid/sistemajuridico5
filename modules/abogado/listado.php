<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
$datosempleado = datosEmpleadoAbogado();
$mostrarPersonaBaja = null;
if ($_SESSION['id_perfil'] !== '1' || $_SESSION['id_perfil'] !== '2') {
    $mostrarPersonaBaja = false;
} else {
    $mostrarPersonaBaja = true;
}

?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <span>Abogado</span>
</div>
<div class="dashboard">
    <h1>Listado de abogados</h1>
    <a href="<?php echo BASE_URL; ?>"" class=" volver-atras-button">Volver Atrás</a>
    <div class="msj-container" id="msj-container">
        <?php switch ($vali):
            case 1: ?>
                <span class="msj-success show">Se ha agregado correctamente</span>
                <?php
                break;
            case 2: ?>
                <span class="msj-modify show">Se ha modificado correctamente</span>
                <?php
                break;
            case 3: ?>
                <span class="msj-delete show">Se ha borrado el abogado correctamente</span>
                <?php
                break;
            case 4: ?>
                <span class="msj-error show">Se ha producido un error correctamente</span>
        <?php endswitch ?>
    </div>
    <section class="inicio">

        <div class="contenido">
            <div class="btn-filtro-container">
                <a href="formulario_abogado.php" class="a-alta">Nuevo Abogado</a>
            </div>
            <?php if (!$mostrarPersonaBaja): ?>
                <div class="btn-filtro-container">
                    <a href="listadoPersonaBaja.php" class="a-alta"> Ver Abogados dados de baja</a>
                </div>
            <?php endif; ?>
            <table class="tablamodal" id="tablaAbogado">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombres y Apellidos</th>
                        <th>Especialidad</th>
                        <th>Usuario</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php $contador = 1 ?>
                        <?php foreach ($datosempleado as $regempleado): ?>
                            <td>
                                <?php echo $contador ?>
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
                                    href="<?php echo BASE_URL ?>modules\abogado\modificar.php?idPersonaFisica=<?php echo $regempleado['id_persona_fisica'] ?>&idPersona=<?php echo $regempleado['id_persona'] ?>">
                                    <button class="editarButton">
                                        <i class="fi fi-rr-edit"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo BASE_URL ?>modules\abogado\procesarBorrar.php?&idEmpleado=<?php echo $regempleado['id_empleado'] ?>"
                                    class="openModal">
                                    <button class="darDeBajaButton">
                                        <i class="fi-rr-eraser"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </tbody>


                    <?php $contador++;
                        endforeach ?>
            </table>
        </div>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>