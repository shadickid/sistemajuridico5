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


$movimientos = consultarMovimientoExpediente($id_expediente);
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
            <div class="btn-filtro-container">
                <a href="nuevoMovExp.php?id_expediente=<?php echo $id_expediente ?>" class="a-alta">Nuevo movimiento</a>
            </div>
            <table class="tablamodal">
                <thead>
                    <tr>
                        <th>Fecha y Hora</th>
                        <th>Movimiento</th>
                        <th>Descripcion</th>
                        <th>Responsable</th>
                        <th>PDF</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <?php foreach ($movimientos as $regmov): ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $regmov['movimiento_fecha'] ?>
                            </td>
                            <td>
                                <?php echo $regmov['nombre'] ?>
                            </td>
                            <td>
                                <?php echo $regmov['movimiento_descripcion'] ?>
                            </td>
                            <td>Abogado1</td>
                            <td><span class="material-symbols-outlined">
                                    picture_as_pdf
                                </span></td>
                            <td>
                                <a href="<?php echo BASE_URL ?>">
                                    <button class="editarButton">
                                        <i class="fi fi-rr-edit"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo BASE_URL ?>" <button class="darDeBajaButton">
                                    <i class="fi-rr-eraser"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>