<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/empleado.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes/header.php');
include(ROOT_PATH . 'includes/nav.php');
include(ROOT_PATH . 'config\database\functions\persona.php');
$pais = selectall('pais');
$tipoDom = selectall('tipo_dom');
$atributoDomicilio = selectall('atributo_domiclio');
$idPersonaFisica = $_GET['idPersonaFisica'];
$datosEmpleado = selectModificarDatosPersonalesEmpleado($idPersonaFisica);

$conditional = [
    'estado' => 1
];
$sexo = selectall('sexo');
$metodocontacto = selectall('tipo_contacto', $conditional);
$tipodocumento = selectall('documento', $conditional);
$datosContacto = personaContacto($idPersonaFisica);
$datosDocumento = personaDocumento($idPersonaFisica);
$datosDomicilio = personaDomicilio($idPersonaFisica);
foreach ($datosEmpleado as $regemp):
    $idPersona = $regemp['id_persona'];
    ?>

    <div class="breadcrumbs">
        <a href="<?php echo BASE_URL; ?>">INICIO</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules/abogado/listado.php">Abogado</a>
        <span>/</span>
        <span>Modificar Datos del Abogado</span>
    </div>

    <div class="dashboard">
        <h1>Modificar datos del abogado</h1>
        <a href="listado.php" class="volver-atras-button">Volver Atrás</a>
        <section class="inicio">
            <div class="contenido">
                <div class="msj-container" id="msj-container">
                    <?php switch ($vali):
                        case 1: ?>
                            <span class="msj-error show">La persona ya tiene DNI asignado</span>
                            <?php
                            break;
                        case 2: ?>
                            <span class="msj-modify show">Se ha modificado correctamente</span>
                            <?php
                            break;
                        case 3: ?>
                            <span class="msj-modify show">Se ha eliminado un contacto</span>
                            <?php
                            break;
                        case 4: ?>
                            <span class="msj-delete show">Se ha borrado el dato correctamente</span>

                    <?php endswitch ?>
                </div>
                <div id="tabs">
                    <ul>
                        <li><a href="#datos">Datos Personales</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                        <li><a href="#documento">Documento</a></li>
                        <li><a href="#domicilio">Domicilio</a></li>
                    </ul>

                    <form class="formulario-form" action="procesarModificar.php" method="post" id="formularioAbogado">
                        <input type="hidden" name="idPersonaFisica" value="<?php echo $idPersonaFisica; ?>">
                        <input type="hidden" name="idPersona" value="<?php echo $idPersona; ?>">

                        <div id="datos">
                            <legend>Datos personales</legend>
                            <br>

                            <div>
                                <label class="formulario-label" for="nombre">Nombre:</label>
                                <input class="formulario-input" type="text" name="nombre"
                                    value="<?php echo $regemp['persona_nombre']; ?>" autocomplete="off">
                            </div>

                            <div>
                                <label class="formulario-label" for="apellido">Apellido:</label>
                                <input class="formulario-input" type="text" name="apellido"
                                    value="<?php echo $regemp['persona_apellido']; ?>" autocomplete="off">
                            </div>

                            <div>
                                <label class="formulario-label" for="fecnac">Fecha de nacimiento:</label>
                                <input class="formulario-input" type="date" name="fecnac"
                                    value="<?php echo $regemp['persona_fec_nac']; ?>" autocomplete="off">
                            </div>

                            <div>
                                <label class="formulario-label" for="sex">Sexo:</label>
                                <select class="formulario-select" name="sex">
                                    <?php foreach ($sexo as $sex): ?>
                                        <option value="<?php echo $sex['id_sexo']; ?>" <?php if ($sex['id_sexo'] == $regemp['id_sexo'])
                                               echo 'selected'; ?>>
                                            <?php echo $sex['nombre']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div id="contacto">
                            <legend>Contacto</legend>
                            <div>
                                <label class="formulario-label" for="contacto">Tipo de Contacto:</label>
                                <select class="formulario-select" name="tipoContacto">
                                    <option value="0">--Seleccione--</option>
                                    <?php foreach ($metodocontacto as $regcontacto): ?>
                                        <option value="<?php echo $regcontacto['id_tipo_contacto'] ?>">
                                            <?php echo $regcontacto['tipo_contacto_nombre'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="text" class="formulario-input" name="contactoValor">
                            </div>
                            <div>
                                <table class="tablamodal">
                                    <tr>
                                        <th>Tipo contacto</th>
                                        <th>Valor</th>
                                        <th>Estado</th>
                                    </tr>
                                    <?php foreach ($datosContacto as $registro): ?>
                                        <tr>
                                            <td>
                                                <?php echo $registro['tipo_contacto_nombre'] ?>
                                            </td>
                                            <td>
                                                <?php echo $registro['contacto_detalle'] ?>
                                            </td>
                                            <td>
                                                <a href="procesarEliminarCon.php?id_contxper=<?php echo $registro['id_contxper'] ?>&idPersonaFisica=<?php echo $idPersonaFisica ?> "
                                                    <button class="darDeBajaButton">
                                                    <i class="fi-rr-eraser"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                        <!-- Documento -->
                        <div id="documento">
                            <legend>Documento</legend>
                            <br>
                            <div>
                                <label class="formulario-label" for="tipoDocumento">Documento:</label>
                                <select class="formulario-select" name="tipoDocumento">
                                    <option value="0">--Seleccione--</option>
                                    <?php foreach ($tipodocumento as $regDoc): ?>
                                        <option value="<?php echo $regDoc['id_tipo_documento'] ?>">
                                            <?php echo $regDoc['descripcion'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="text" class="formulario-input" name="contactoValor">
                            </div>
                            <div>
                                <table class="tablamodal">
                                    <tr>
                                        <th>Tipo contacto</th>
                                        <th>Valor</th>
                                        <th>Estado</th>
                                    </tr>
                                    <?php foreach ($datosDocumento as $registro): ?>
                                        <tr>
                                            <td>
                                                <?php echo $registro['descripcion'] ?>
                                            </td>
                                            <td>
                                                <?php echo $registro['detalle'] ?>
                                            </td>
                                            <td>
                                                <a href="procesarEliminarDoc.php?id_documentoxpersona=<?php echo $registro['id_documentoxpersona'] ?>&idPersonaFisica=<?php echo $idPersonaFisica ?> "
                                                    <button class="darDeBajaButton">
                                                    <i class="fi-rr-eraser"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>

                        <!-- Domicilio -->
                        <div id="domicilio">
                            <legend>Domicilio</legend>
                            <br>
                            <div>
                                <label for="pais" class="formulario-label">Pais:</label>
                                <select name="pais" id="pais" class="formulario-select"
                                    onchange="cargarProvincias(this.value)">
                                    <option value="0">--Seleccione--</option>
                                    <?php foreach ($pais as $regpais): ?>
                                        <option value="<?php echo $regpais['id_pais'] ?>">
                                            <?php echo $regpais['nombre'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label for="provincias" class="formulario-label">Provincia:</label>
                                <select name="provincias" id="provincias" class="formulario-select"
                                    onchange="cargarLocalidades(this.value)">
                                </select>
                            </div>

                            <div>
                                <label for="localidad" class="formulario-label">Localidad:</label>
                                <select name="localidad" id="localidad" class="formulario-select"
                                    onchange="cargarBarrios(this.value)">
                                </select>
                            </div>

                            <div>
                                <label for="barrio" class="formulario-label">Barrio:</label>
                                <select name="barrio" id="barrio" class="formulario-select">
                                </select>
                            </div>
                            <div>
                                <label for="tipoDom">Tipo de domicilio</label>
                                <select name="tipoDom" id="tipoDom" class="formulario-select">
                                    <option value="0">--Seleccione--</option>
                                    <?php foreach ($tipoDom as $regTipoDom): ?>
                                        <option value=<?php echo $regTipoDom['id_tipo_dom'] ?>>
                                            <?php echo $regTipoDom['valor'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <table id="atributosDomicilios" class="tablamodal">
                                    <thead>
                                        <tr>
                                            <th>
                                                Atributo
                                            </th>
                                            <th>
                                                Valor
                                            </th>
                                            <th>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <select id="tipoAtributo" name="tipoAtributo">
                                                    <option value="0"> - Seleccionar Opci&oacute;n - </option>

                                                    <?php foreach ($atributoDomicilio as $atributo) { ?>
                                                        <option value="<?php echo $atributo['id_atri_dom']; ?>">
                                                            <?php echo $atributo['valor']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </th>
                                            <th>
                                                <input type="text" id="valorAtributo" name="valorAtributo">
                                            </th>
                                            <th>
                                                <button type="button" title="Agregar" onclick="agregarAtributo()"> +
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <button class="formulario-submit" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script>
        function agregarAtributo() {
            let tipoAtributo = document.getElementById('tipoAtributo');
            let valorAtributo = document.getElementById('valorAtributo');

            if (tipoAtributo.value === '0' || valorAtributo.value.trim() === '') {
                alert('Por favor, seleccione un tipo de atributo y proporcione un valor.');
                return;
            }
            let tipoAtributo_val = tipoAtributo.value;
            let valorAtributo_val = valorAtributo.value;



            /* Se obtiene la descripcion en texto de la opcion seleccionada */
            let tipoAtributo_desc = tipoAtributo.options[tipoAtributo.selectedIndex].text;

            /* Se crea la fila nueva */
            let fila = document.createElement('tr');
            fila.innerHTML = '<tr></tr>';

            /* Se crean inputs ocultos para guardar los valores seleccionados */
            let input_tipoAtributo = document.createElement('input');
            input_tipoAtributo.setAttribute('type', 'hidden');
            input_tipoAtributo.setAttribute('name', 'atributosSeleccionados[]');
            input_tipoAtributo.setAttribute('value', tipoAtributo_val);

            let input_valorAtributo = document.createElement('input');
            input_valorAtributo.setAttribute('type', 'hidden');
            input_valorAtributo.setAttribute('name', 'valoresIngresados[]');
            input_valorAtributo.setAttribute('value', valorAtributo_val);

            /* Se crean las celdas */
            let celda_tipoAtributo = document.createElement('td');
            celda_tipoAtributo.innerHTML = tipoAtributo_desc;
            celda_tipoAtributo.appendChild(input_tipoAtributo);
            fila.appendChild(celda_tipoAtributo);

            let celda_valorAtributo = document.createElement('td');
            celda_valorAtributo.innerHTML = valorAtributo_val;
            celda_valorAtributo.appendChild(input_valorAtributo);
            fila.appendChild(celda_valorAtributo);

            let celda_boton = document.createElement('td');
            celda_boton.innerHTML =
                '<button type="button" class="eliminar" onclick="eliminarAtributo(this)" title="Eliminar"> X </button>';
            fila.appendChild(celda_boton);

            /* Se identifica la tabla  y le asigno la fila creada */
            let tabla = document.getElementById('atributosDomicilios');
            tabla.tBodies[0].appendChild(fila);

            /* Se resetean el combo y la caja  de texto */
            tipoAtributo.value = 0;
            valorAtributo.value = "";

        }

        function eliminarAtributo(boton) {
            let fila = boton.parentNode.parentNode;

            let tabla = document.getElementById('atributosDomicilios');
            tabla.tBodies[0].removeChild(fila);
        }
    </script>
    <script>
        // Obtener datos de domicilio desde PHP
        var datosDomicilioDesdePHP = <?php echo json_encode($datosDomicilio); ?>;

        // Iterar sobre los datos organizados
        for (const domicilioId in datosDomicilioDesdePHP) {
            if (datosDomicilioDesdePHP.hasOwnProperty(domicilioId)) {
                const datosDomicilio = datosDomicilioDesdePHP[domicilioId];

                // Llenar los campos del domicilio con los datos recuperados
                document.getElementById('pais').value = datosDomicilio[0].nombre_pais;
                document.getElementById('provincias').value = datosDomicilio[0].nombre_provincia;
                document.getElementById('localidad').value = datosDomicilio[0].nombre_localidad;
                document.getElementById('barrio').value = datosDomicilio[0].nombre_barrio;
                document.getElementById('tipoDom').value = datosDomicilio[0].fkpersonaDOMtipoDOM;

                // Iterar sobre los atributos del domicilio y agregarlos a la tabla
                for (const atributo of datosDomicilio) {
                    agregarAtributoDesdePHP(atributo);
                }
            }
        }

        function agregarAtributoDesdePHP(atributo) {
            // Esta función debería ser similar a la función agregarAtributo en tu código original
            // Puedes adaptarla según tus necesidades
            let fila = document.createElement('tr');

            // Crea las celdas y agrega los valores
            let celda_tipoAtributo = document.createElement('td');
            celda_tipoAtributo.innerHTML = atributo.valorAtri;
            fila.appendChild(celda_tipoAtributo);

            let celda_valorAtributo = document.createElement('td');
            celda_valorAtributo.innerHTML = atributo.valorDomAtri;
            fila.appendChild(celda_valorAtributo);

            let celda_boton = document.createElement('td');
            celda_boton.innerHTML = '<button type="button" class="eliminar" onclick="eliminarAtributo(this)" title="Eliminar"> X </button>';
            fila.appendChild(celda_boton);

            // Agrega la fila a la tabla
            let tabla = document.getElementById('atributosDomicilios');
            tabla.tBodies[0].appendChild(fila);
        }
    </script>


    <?php
endforeach;
include(ROOT_PATH . 'includes/footter.php');
?>