<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
$datosempleado = datosEmpleadoAbogadoBaja();
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <span>Abogados</span>
</div>
<div class="dashboard">
    <h1>Abogados dados de baja</h1>
    <a href="<?php echo BASE_URL; ?>modules\abogado\listado.php" class="volver-atras-button">Volver Atrás</a>

    <section class="inicio">
        <div class="contenido">
            <div class="msj-container" id="msj-container">
                <h2>Listado de abogados dados de baja</h2>
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
                        <span class="msj-delete show">Se ha borrado el cliente correctamente</span>
                        <?php
                        break;
                    case 4: ?>
                        <span class="msj-error show">Se ha producido un error correctamente</span>
                <?php endswitch ?>
            </div>
            <!-- <div class="btn-filtro-container">
                <a href="formularioCliente.php" class="a-alta">Nuevo Cliente</a>
                 <div>
                    <a href="formularioClienteF.php" class="a-alta">Nuevo cliente fisico</a>
                    <a href="formularioClienteJ.php" class="a-alta">Nuevo cliente Juridico</a>
                </div> 
            </div>
            <div class="btn-filtro-container">
                <button type="button" id="btnMostrarTodos" class="btn-filtro">Ver Todos</button>
                <button type="button" id="btnFisicos" class="btn-filtro">Ver Persona F&iacute;sica</button>
                <button type="button" id="btnJuridicos" class="btn-filtro">Ver Persona Jur&iacute;dica</button>
                <a href="listadoPersonaBaja.php" class="a-alta"> Ver Personas dados de baja</a>
            </div> -->

            <table class="tablamodal">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombres y Apellidos</th>
                        <th>Especialidad</th>
                        <th>Usuario</th>
                        <th>Activar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 1 ?>
                    <?php foreach ($datosempleado as $regEmpleado): ?>
                        <tr>
                            <td>
                                <?php echo $contador; ?>
                            </td>
                            <td>
                                <?php echo $regEmpleado['persona_nombre'] . ' ' . $regEmpleado['persona_apellido'] ?>
                            </td>
                            <td>
                                <?php echo $regEmpleado['descripcion'] ?>
                            </td>
                            <td>
                                <?php echo $regEmpleado['usuario_nombre'] ?>
                            </td>
                            <td>
                                <a href="<?php echo BASE_URL ?>modules\abogado\darAltaAbogado.php?idEmpleado=<?php echo $regEmpleado['id_empleado'] ?>"
                                    class="openModal">
                                    <button class="darDeAltaButton">
                                        <i class="fi fi-rr-check"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php $contador++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</div>


<?php
include(ROOT_PATH . 'includes\footter.php');
?>