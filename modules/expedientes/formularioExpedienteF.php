<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');

include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'config\database\functions\cliente.php');
$conditional = [
    'estado' => 1
];
$clientesF = datosClientesFisicos();
$estado = selectall('expediente_estado', $conditional);
$tipo = selectall('expediente_tipo', $conditional);


?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\expedientes\listado.php">Expediente</a>
    <span>/</span>
    <span>Registro de Expediente Fisico</span>
</div>
<div class="dashboard">
    <h1>Listado de expedientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\expedientes\listado.php" class="volver-atras-button">Volver Atrás</a>
    <section class="inicio">
        <div class="contenido">
            <div class="msj-container" id="msj-container">
                <?php switch ($vali):
                    case 1: ?>
                        <span class="msj-error show">El expediente ya esta registrado</span>
                        <?php
                        break;
                    case 2: ?>
                        <span class="msj-modify show">Se ha modificado correctamente</span>

                <?php endswitch ?>
                <h2>Registro de Expediente f&iacute;sico</h2>
                <form action="procesarExpedienteF.php" method="post" id="formularioExpedienteF">
                    <div id="">
                        <div>
                            <label for="nroExpediente" class="formulario-label">Numero de Expediente:</label>
                            <input type="text" id="nroExpediente" name="nroExpediente" placeholder="Nº de Expediente"
                                class="formulario-input">
                        </div>
                        <div>
                            <label for="caratula" class="formulario-label">Car&aacute;tula:</label>
                            <input type="text" id="caratula" name="caratula" placeholder="Car&aacute;tula"
                                class="formulario-input">
                        </div>
                        <div>
                            <label for="fechaInicio" class="formulario-label">Fecha de Inicio:</label>
                            <input type="date" id="fechaInicio" name="fechaInicio" class="formulario-input">
                        </div>
                        <div>
                            <label for="fechaFin" class="formulario-label">Fecha de Finalizaci&oacute;n:</label>
                            <input type="date" id="fechaFin" name="fechaFin" class="formulario-input">

                        </div>
                        <div>
                            <label for="clienteF" class="formulario-label">Clientes:</label>
                            <select name="clienteF" id="clienteF" name="clienteF" class="formulario-select">
                                <option value="0">--Seleccione--</option>
                                <?php foreach ($clientesF as $regcliente): ?>
                                    <option value="<?php echo $regcliente['id_persona'] ?>">
                                        <?php echo $regcliente['persona_nombre'] . ' ' . $regcliente['persona_apellido'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <lable for="estadoExp" class="formulario-label">Estado:</lable>
                            <select name="estadoExp" id="estadoExp" name="estadoExp" class="formulario-select">
                                <option value="0">--Seleccione--</option>
                                <?php foreach ($estado as $regestado): ?>
                                    <option value="<?php echo $regestado['id_expediente_estado'] ?>">
                                        <?php echo $regestado['expediente_estado_nombre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                        </div>

                        <div>
                            <label for="expTipo" class="formulario-label">Tipo:</label>
                            <select name="expTipo" class="formulario-select" id="expTipo"
                                onchange="cargarTipo(this.value)">
                                <option value="0">--Seleccione--</option>
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


                        <div>
                            <label for="descripcion" class="formulario-label">Comentario:</label>
                            <textarea class="formulario-input" name="comentario"></textarea>
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="submit" id="guardar" class="formulario-submit"> Guardar </button>
                    </div>
                </form>
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

                        alert('Sin Atributos');
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