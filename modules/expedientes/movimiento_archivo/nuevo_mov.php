<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'config\database\functions\movimiento.php');
$id_expediente = $_GET['id_expediente'];
$conditional = [
    'id_expediente' => $id_expediente
];

$expediente = selectall('expediente', $conditional);

foreach ($expediente as $regExp) {
    $caratula = $regExp['expediente_nombre'];
}


$movimientos = consultarMovimientoExpedienteDESC($id_expediente);
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\expedientes\listado.php">Expediente</a>
    <span>/</span>
    <span>Movimientos
        <?php echo $caratula ?>
    </span>
</div>
<div class="dashboard">
    <h1>Movimiento de
        <?php echo $caratula ?>
    </h1>
    <a href="<?php echo BASE_URL; ?>modules\expedientes\listado.php" class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
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

            <div class="btn-filtro-container">
                <a href="nuevoMovExp.php?id_expediente=<?php echo $id_expediente ?>" class="a-alta">Nuevo movimiento</a>
                <div>
                    <form action="generarPDFs.php" method="post" target="_blank">
                        <input type="hidden" name="id_expediente" value="<?php echo $id_expediente; ?>">
                        <button type="submit" name="generar_pdfs" class="generar">Generar PDFs</button>
                    </form>
                </div>

            </div>
            <table class="tablamodal">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Movimiento</th>
                        <th>Fecha y Hora</th>
                        <th>Descripcion</th>
                        <th>Responsable</th>
                        <th>PDF</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <?php $contador = 1; ?>
                <?php foreach ($movimientos as $regmov): ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $contador; ?>
                            </td>
                            <td>
                                <?php echo $regmov['nombre'] ?>
                            </td>
                            <td>
                                <?php echo $regmov['movimiento_fecha'] ?>
                            </td>
                            <td>
                                <?php echo $regmov['movimiento_descripcion'] ?>
                            </td>
                            <td>
                                <?php echo $regmov['persona_nombre'] . " " . $regmov['persona_apellido'] ?>
                            </td>
                            <td><a href="<?php echo $regmov['detalle_movimiento_ubicacion'] ?>" class=" mov"
                                    target="_blank"><span class="material-symbols-outlined">
                                        picture_as_pdf
                                    </span></a>
                            <td>
                                <a
                                    href="<?php echo BASE_URL ?>modules\expedientes\movimiento_archivo\borrarMov.php?id_expediente=<?php echo $id_expediente ?>&idExpxMov=<?php echo $regmov['id_expedientemovimientotipo'] ?>">
                                    <button class=" darDeBajaButton">
                                        <i class="fi-rr-eraser"></i>
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