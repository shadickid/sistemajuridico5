<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes/nav.php');
$conditional = [
    'estado' => 1
];
$expTipo = null;
$expSubTipo = null;
if (isset($_GET['expTipo'])) {
    $expTipo = $_GET['expTipo'];
    $expSubTipo = $_GET['expSubTipo'];
} else {
    $tipoFiltro = null;
    $filtro = null;
}
$tipo = selectall('expediente_tipo', $conditional);
$registro = obtenerListadoExpediente($expSubTipo, $expTipo);
$registrosj = obtenerListadoExpedienteJ($expSubTipo, $expTipo);

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
    <span>Por Cantidad de Expedientes</span>
</div>
<div class="dashboard">
    <h1>Reportes de Expedientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\reportes\expedientes\menu.php" class="volver-atras-button">Volver Atrás</a>

    <section class="inicio">
        <div class="contenido">
            <div class="btn-filtro-container">
                <form method="get" id="filtroForm">
                    <div>
                        <label for="expTipo" class="formulario-label">Tipo:</label>
                        <select name="expTipo" class="formulario-select" id="expTipo" onchange="cargarTipo(this.value)">
                            <option value="0">--Seleccione--</option>
                            <option value="50">Todos</option>
                            <?php foreach ($tipo as $regtipo): ?>
                                <option value="<?php echo $regtipo['id_expediente_tipo'] ?>">
                                    <?php echo $regtipo['expediente_tipo_nombre'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="expSubTipo" class="formulario-label">Sub Tipo:</label>
                        <select name="expSubTipo" id="expSubTipo" class="formulario-select">
                            <option value="0">--Selecione--</option>
                        </select>
                    </div>

                    <input type="submit" value="Filtrar" class="btn-filtro">

                </form>
                <form method="get" action="generarReportePDF.php" id="pdfForm" target="_blank">
                    <div>
                        <button id="generarReporteBtn" class="btn-filtro">Generar Reporte</button>
                    </div>
                    <input type="hidden" name="expTipo" value="<?php echo $expTipo; ?>">
                    <input type="hidden" name="expSubTipo" value="<?php echo $expSubTipo; ?>">
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

<script>
    function cargarTipo(id_tipo) {
        let datos_atributos;
        let nuevaOpcion;

        if (id_tipo != 0) {
            $('#expSubTipo').val('0');

            // AJAX con jQuery
            $.post("controlSubtipo.php", {
                function: 'leerSubTipo',
                idTipo: id_tipo
            }, function (resultado) {
                if (resultado != 0) {
                    datos_atributos = JSON.parse(resultado);

                    $("#expSubTipo").html("");
                    for (let i = 0; i < datos_atributos.length; i++) {
                        nuevaOpcion = new Option(datos_atributos[i]['subtipo_exp'], datos_atributos[i][
                            'id_exp_tipo_subtipo'
                        ]);
                        $('#expSubTipo').append(nuevaOpcion);
                    }
                } else {
                    $("#expSubTipo").html("");
                    var optionElement = document.createElement("option");
                    optionElement.value = "0";
                    optionElement.text = "--Seleccione--";
                    $('#expSubTipo').append(optionElement);
                }
            });
        } else {
            alert('Debe seleccionar una Tipo');
            $("#expSubTipo").html("");
            var optionElement = document.createElement("option");
            optionElement.value = "0";
            optionElement.text = "--Seleccione--";
            $('#expSubTipo').append(optionElement);
            return;
        }
    }
</script>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>