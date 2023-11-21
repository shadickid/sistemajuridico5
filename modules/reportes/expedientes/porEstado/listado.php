<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes/nav.php');
$conditional = [
    'estado' => 1
];
$estado = null;

if (isset($_GET['estado'])) {
    $estado = $_GET['estado'];

} else {
    $estado = 50;
}
$estadoLista = selectall('expediente_estado', $conditional);
$registro = obtenerListadoExpedientePorEstado($estado);
$registrosj = obtenerListadoExpedientePorEstadoJ($estado);

$totalExpedientes = count($registro) + count($registrosj);
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules/reportes/menu.php">Reporte</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\reportes\expedientes\menu.php">Expedientes</a>
    <span>/</span>
    <span>Por Estado</span>
</div>
<div class="dashboard">
    <h1>Reportes de Expedientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\reportes\expedientes\menu.php" class="volver-atras-button">Volver Atrás</a>

    <section class="inicio">
        <div class="contenido">
            <div class="btn-filtro-container">
                <form method="get" id="filtroForm">
                    <div>
                        <label for="estado" class="formulario-label">Estado:</label>
                        <select name="estado" class="formulario-select" id="estado">
                            <option value="0">--Seleccione--</option>
                            <option value="50">Todos</option>
                            <?php foreach ($estadoLista as $regestado): ?>
                                <option value="<?php echo $regestado['id_expediente_estado'] ?>">
                                    <?php echo $regestado['expediente_estado_nombre'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="submit" value="Filtrar" class="btn-filtro">

                </form>
                <form method="get" action="generarReportePDF.php" id="pdfForm">
                    <div>
                        <button id="generarReporteBtn" class="btn-filtro">Generar Reporte</button>
                    </div>
                    <input type="hidden" name="estado" value="<?php echo $estado; ?>">

                </form>

            </div>




        </div>

        <div class="">
            <table class="tablamodal">
                <thead>
                    <tr>
                        <th>ID Expediente</th>
                        <th>Nombre Persona/Razon Social</th>
                        <th>Número Expediente</th>
                        <th>Nombre Expediente</th>
                        <th>Fecha Inicio</th>
                        <th>Tipo Expediente</th>
                        <th>Subtipo Expediente</th>
                        <th>Estado Expediente</th>
                        <th>Descripción Expediente</th>
                        <th>Fecha Fin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registro as $reg): ?>
                        <tr>
                            <td>
                                <?php echo $reg['id_expediente']; ?>
                            </td>
                            <td>
                                <?php echo $reg['persona_nombre'] . ' ' . $reg['persona_apellido']; ?>
                            </td>
                            <td>
                                <?php echo $reg['expediente_nro']; ?>
                            </td>
                            <td>
                                <?php echo $reg['expediente_nombre']; ?>
                            </td>
                            <td>
                                <?php echo $reg['expediente_fecha_inicio']; ?>
                            </td>
                            <td>
                                <?php echo $reg['expediente_tipo_nombre']; ?>
                            </td>
                            <td>
                                <?php echo $reg['subtipo_exp']; ?>
                            </td>
                            <td>
                                <?php echo $reg['expediente_estado_nombre']; ?>
                            </td>
                            <td>
                                <?php echo $reg['expediente_descripcon']; ?>
                            </td>
                            <td>
                                <?php echo $reg['expediente_fecha_fin']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($registrosj as $registrosj): ?>
                        <tr>
                            <td>
                                <?php echo $registrosj['id_expediente']; ?>
                            </td>
                            <td>
                                <?php echo $registrosj['razon_social'] ?>
                            </td>
                            <td>
                                <?php echo $registrosj['expediente_nro']; ?>
                            </td>
                            <td>
                                <?php echo $registrosj['expediente_nombre']; ?>
                            </td>
                            <td>
                                <?php echo $registrosj['expediente_fecha_inicio']; ?>
                            </td>
                            <td>
                                <?php echo $registrosj['expediente_tipo_nombre']; ?>
                            </td>
                            <td>
                                <?php echo $registrosj['subtipo_exp']; ?>
                            </td>
                            <td>
                                <?php echo $registrosj['expediente_estado_nombre']; ?>
                            </td>
                            <td>
                                <?php echo $registrosj['expediente_descripcon']; ?>
                            </td>
                            <td>
                                <?php echo $registrosj['expediente_fecha_fin']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>


        <div class="contenido">
            <p>Total de expedientes:
                <?php echo $totalExpedientes; ?>
            </p>
        </div>



    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>