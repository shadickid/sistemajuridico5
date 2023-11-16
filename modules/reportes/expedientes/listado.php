<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes/nav.php');
$expedienteF = listadoExpedienteFisico();
$expedieneJ = listadoExpedienteJ();
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
    <a href="<?php echo BASE_URL; ?>modules\dashboard\dashboard.php" class="volver-atras-button">Volver Atrás</a>

    <section class="inicio">
        <div class="contenido">
            <div class="btn-filtro-container">
                <form method="get">
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
                <div>
                    <button id="generarReporteBtn" class="btn-filtro">Generar Reporte</button>
                </div>
            </div>




        </div>

        <div class="">
            <table class="tablamodal">
                <thead>
                    <tr>
                        <th>ID Expediente</th>
                        <th>Nombre Persona</th>
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
                </tbody>
            </table>
        </div>


        <div class="contenido">
            <p>Total de expedientes:
                <?php echo count($registro); ?>
            </p>
        </div>



    </section>
</div>

<script>
function cargarTipo(id_tipo) {
    let resultado;
    let datos_atributos;
    let nuevaOpcion;

    if (id_tipo != 0) {
        $('#expSubTipo').val('0');

        // AJAX

        let xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                resultado = xmlhttp.responseText;

                if (resultado != 0) {
                    datos_atributos = JSON.parse(resultado);

                    $("#expSubTipo").html("");
                    for (let i = 0; i < datos_atributos.length; i++) {
                        nuevaOpcion = new Option(datos_atributos[i]['subtipo_exp'], datos_atributos[i][
                            'id_exp_tipo_subtipo'
                        ]);
                        document.getElementById('expSubTipo').add(nuevaOpcion, undefined);
                    }
                } else {
                    document.getElementById('tipoAtributo').innerHTML = "";
                    $("#expSubTipo").html("");
                    var optionElement = document.createElement("option");
                    optionElement.value = "0";
                    optionElement.text = "--Seleccione--";
                    document.getElementById('tipoAtributo').appendChild(optionElement);
                    $("#expSubTipo").append(optionElement);
                }
            }
        };

        xmlhttp.open("POST", "controlSubtipo.php", true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.send("function=leerSubTipo&idTipo=" + id_tipo);
    } else {
        alert('Debe seleccionar una Tipo');
        $("#expSubTipo").html("");
        var optionElement = document.createElement("option");
        optionElement.value = "0";
        optionElement.text = "--Seleccione--";
        document.getElementById('expSubTipo').appendChild(optionElement);
        return;
    }
}
</script>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>