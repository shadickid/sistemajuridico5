<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes/nav.php');
$expedienteId = isset($_GET['expedientes']) ? $_GET['expedientes'] : null;
$fechaInicio = isset($_GET['fechaInicio']) ? $_GET['fechaInicio'] : null;
$fechaFin = isset($_GET['fechaFin']) ? $_GET['fechaFin'] : null;


$expedientes = selectall('expediente');
//$listado = obtenerExpedienteporId($expedienteId, $fechaInicio, $fechaFin);
$totalMovimientos = "";
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <span>Reporte</span>
    <span>/</span>
    <span>Expedientes</span>
</div>
<div class="dashboard">
    <h1>Reportes de Expedientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\reportes\expedientes\menu.php" class="volver-atras-button">Volver Atrás</a>

    <section class="inicio">
        <div class="contenido">
            <div class="btn-filtro-container">
                <form method="get" id="filtroForm" action="generarReportePDF.php">
                    <div>
                        <label for="expedientes" class="formulario-label">Expedientes:</label>
                        <select name="expedientes" class="formulario-select" id="expedientes">
                            <option value="0">--Seleccione--</option>
                            <?php foreach ($expedientes as $regExp): ?>
                            <option value="<?php echo $regExp['id_expediente'] ?>">
                                <?php echo $regExp['expediente_nro'] ?>
                                |
                                <?php echo $regExp['expediente_nombre'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="fechaInicio" class="formulario-label">Fecha Desde:</label>
                        <input type="date" class="formulario-input" name="fechaInicio">
                    </div>
                    <div>
                        <label for="FechaFin" class="formulario-label">Fecha Hasta:</label>
                        <input type="date" class="formulario-input" name="fechaFin">
                        <div>
                            <button id="generarReporteBtn" class="generar">Generar Reporte</button>
                        </div>

                </form>


    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>