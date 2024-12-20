<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$expedienteF = listadoExpedienteFisico();
$expedieneJ = listadoExpedienteJ();

?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <span>Expedientes</span>
</div>
<div class="dashboard">
    <h1>Listado de Expedientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\dashboard\dashboard.php" class="volver-atras-button">Volver Atrás</a>
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
                <span class="msj-delete show">Se ha borrado correctamente</span>
                <?php
                break;
            case 4: ?>
                <span class="msj-error show">Se ha producido un error correctamente</span>
        <?php endswitch ?>
    </div>
    <section class="inicio">

        <div class="btn-filtro-container">
            <a href="formularioExpediente.php" class="a-alta">Nuevo Expediente</a>
            <button type="button" id="btnMostrarTodos" class="btn-filtro">Ver Todos</button>
            <button type="button" id="btnFisicos" class="btn-filtro">Ver Expediente F&iacute;sica</button>
            <button type="button" id="btnJuridicos" class="btn-filtro">Ver Expediente Jur&iacute;dica</button>
            <!-- <div>
                <a href="formularioExpedienteF.php" class="a-alta">Nuevo Expediente fisico</a>
                <a href="formularioExpedienteJ.php" class="a-alta">Nuevo Expediente Juridico</a>
            </div> -->
        </div>

        <table class="tablamodal">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Car&aacute;tula</th>
                    <th>Nro de expediente</th>
                    <th>Nombres y Apellidos/Raz&oacute;n Social</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                    <th>Tipo</th>
                    <th>SubTipo</th>
                    <th>Estado</th>
                    <th>Descripcion</th>
                    <th>Movimiento</th>
                    <th>Modificar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <?php $contador = 1; ?>
            <?php foreach ($expedienteF as $regExpF): ?>
                <tbody>

                    <tr class="clienteFisico">
                        <td>
                            <?php echo $contador ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_nombre'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_nro'] ?>
                        </td>

                        <td>
                            <?php echo $regExpF['persona_nombre'] . ' ' . $regExpF['persona_apellido'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_fecha_inicio'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_fecha_fin'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_tipo_nombre'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['subtipo_exp'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_estado_nombre'] ?>
                        </td>
                        <td>
                            <?php echo $regExpF['expediente_descripcon'] ?>
                        </td>
                        <td>
                            <a href="<?php echo BASE_URL ?>modules\expedientes\movimiento_archivo\nuevo_mov.php?id_expediente=<?php echo $regExpF['id_expediente'] ?>"
                                class="mov">
                                <span class="material-symbols-outlined">
                                    library_add</span>
                            </a>
                        </td>
                        <td>
                            <a
                                href="<?php echo BASE_URL ?>modules\expedientes\modificarExpediente.php?id_expediente=<?php echo $regExpF['id_expediente'] ?>">
                                <button class="editarButton">
                                    <i class="fi fi-rr-edit"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a
                                href="<?php echo BASE_URL ?>modules\expedientes\eliminarExpediente.php?id_expediente=<?php echo $regExpF['id_expediente'] ?>">
                                <button class="darDeBajaButton">
                                    <i class="fi-rr-eraser"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php $contador++ ?>
                <?php endforeach ?>
                <?php foreach ($expedieneJ as $regExpJ): ?>
                    <tr class="clienteJuridico">
                        <td>
                            <?php echo $contador; ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['razon_social'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_nro'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_nombre'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_fecha_inicio'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_fecha_fin'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_tipo_nombre'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['subtipo_exp'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_estado_nombre'] ?>
                        </td>
                        <td>
                            <?php echo $regExpJ['expediente_descripcon'] ?>
                        </td>
                        <td>
                            <a href="<?php echo BASE_URL ?>modules\expedientes\movimiento_archivo\nuevo_mov.php?id_expediente= <?php echo $regExpJ['id_expediente'] ?>"
                                class=" mov">
                                <span class="material-symbols-outlined mov">
                                    library_add
                                </span>
                            </a>
                        </td>
                        <td>
                            <a
                                href="<?php echo BASE_URL ?>modules\expedientes\modificarExpediente.php?id_expediente= <?php echo $regExpJ['id_expediente'] ?>">
                                <button class="editarButton">
                                    <i class="fi fi-rr-edit"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a
                                href="<?php echo BASE_URL ?>modules\expedientes\eliminarExpediente.php?id_expediente= <?php echo $regExpJ['id_expediente'] ?>">
                                <button class="darDeBajaButton">
                                    <i class="fi-rr-eraser"></i>
                                </button>
                            </a>
                        </td>
                        <?php $contador++ ?>
                    <?php endforeach ?>
                </tr>

            </tbody>
        </table>

    </section>
</div>


<?php
include(ROOT_PATH . 'includes\footter.php');
?>