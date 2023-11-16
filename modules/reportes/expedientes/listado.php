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
$tipo = selectall('expediente_tipo', $conditional);

if (isset($_GET['selectFiltro'])) {
    $tipoFiltro = $_GET['selectFiltro'];
    $filtro = $_GET['txtFiltro'];
} else {
    $tipoFiltro = null;
    $filtro = null;
}

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
                            <option value="0">--Seleccione--</option>
                        </select>
                    </div>
                    <input type="submit" value="Filtrar">
                </form>

            </div>

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

            //AJAX

            let xmlhttp;
            if (window.XMLHttpRequest) { //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () { //Cuando cambia el estado de la petición
                if (xmlhttp.readyState == 4 && xmlhttp.status ==
                    200) { //4 significa que terminó y 200 es la rpta OK del server
                    resultado = xmlhttp.responseText;








                    //ACA MANIPULO LA RESPUESTA DEL SERVIDOR

                    if (resultado != 0) {
                        datos_atributos = JSON.parse(resultado); //El json en texto plano, se convierte en OBJETO json
                        $("#expSubTipo").html("");
                        //document.getElementById('tipoAtributo').innerHTML = "";

                        // Crear una option con value igual a 0
                        var optionElement = document.createElement("option");
                        optionElement.value = "0";
                        optionElement.text = "--Seleccione--";

                        // Agregar la opción al select
                        document.getElementById('expSubTipo').appendChild(optionElement);
                        //("#expSubTipo").append(optionElement)
                        for (let i = 0; i < datos_atributos.length; i++) {
                            nuevaOpcion = new Option(datos_atributos[i]['subtipo_exp'], datos_atributos[i][
                                'id_exp_tipo_subtipo'
                            ]);
                            //$("#expSubTipo").add(nuevaOpcion, undefined);
                            document.getElementById('expSubTipo').add(nuevaOpcion, undefined);
                        }
                    } else {


                        document.getElementById('tipoAtributo').innerHTML = "";
                        $("#expSubTipo").html("");
                        // Crear una option con value igual a 0
                        var optionElement = document.createElement("option");
                        optionElement.value = "0";
                        optionElement.text = "--Seleccione--";

                        // Agregar la opción al select
                        document.getElementById('tipoAtributo').appendChild(optionElement);
                        $("#expSubTipo").append(optionElement);

                    }












                }
            }
            xmlhttp.open("POST", "controlSubtipo.php", true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); //Modo en que se envia el dato
            xmlhttp.send("function=leerSubTipo&idTipo=" + id_tipo);
        } else {
            alert('Debe seleccionar una Tipo');
            $("#expSubTipo").html("");
            //document.getElementById('tipoAtributo').innerHTML = "";

            // Crear una option con value igual a 0
            var optionElement = document.createElement("option");
            optionElement.value = "0";
            optionElement.text = "--Seleccione--";

            // Agregar la opción al select
            document.getElementById('expSubTipo').appendChild(optionElement);
            return;
        }
    }
</script>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>