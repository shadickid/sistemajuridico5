<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');

include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'config\database\functions\cliente.php');

$conditional = [
    'estado' => 1
];

$tipodocumento = selectall('documento', $conditional);
$sexo = selectall('sexo');
$atributoDomicilio = selectall('atributo_domiclio');
$metodocontacto = selectall('tipo_contacto', $conditional);
$pais = selectall('pais');
$tipoDom = selectall('tipo_dom');
$contratoconstitutivo = selectall('contrato_constitutivo');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\cliente\listado.php">Cliente</a>
    <span>/</span>
    <span>Registro de Cliente</span>
</div>
<div class="dashboard">
    <h1>Registro de clientes</h1>
    <div class="msj-container" id="msj-container">
        <?php switch ($vali):
            case 1: ?>
                <span class="msj-error show">El numero de DNI ya existe en el sistema</span>
                <?php
                break;
            case 2: ?>
                <span class="msj-modify show">Se ha modificado correctamente</span>
                <?php
                break;
            case 3: ?>
                <span class="msj-modify show">Se ha producido un error correctamente</span>
                <?php
                break;
            case 4: ?>
                <span class="msj-delete show">Se ha borrado el dato correctamente</span>

        <?php endswitch ?>
    </div>
    <a href="<?php echo BASE_URL; ?>modules\cliente\listado.php" class="volver-atras-button">Volver Atrás</a>
    <section class="inicio">
        <div class="contenido">

            <form action="procesarClienteDefinitivo.php" method="post" id="formularioClienteF">
                <div>
                    <label for="tipoPersona" class="formulario-label"> Tipo de Persona:</label>
                    <select id="tipoPersona" name="tipoPersona" class="formulario-select">
                        <option value="1">Persona Física</option>
                        <option value="2">Persona Jurídica</option>
                    </select>
                </div>

                <div id="formularioFisico">
                    <div id="tabs">
                        <ul>
                            <li><a href="#datos">Datos Personales</a></li>
                            <li><a href="#contacto">Contacto</a></li>
                            <li><a href="#documento">Documento</a></li>
                            <li><a href="#domicilio">Domicilio</a></li>

                        </ul>
                        <div id="datos">
                            <legend>Datos personales</legend>
                            <br>
                            <div>
                                <label for="nombre" class="formulario-label">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" placeholder="Juan Perez"
                                    class="formulario-input">
                                <div class=" msj-error">
                                </div>
                            </div>
                            <div>
                                <label for="apellido" class="formulario-label">Apellido:</label>
                                <input type="text" id="apellido" name="apellido" placeholder="Tom&aacute;s"
                                    class="formulario-input">
                                <div class=" msj-error">
                                </div>
                            </div>
                            <div>
                                <label for="fec_nac" class="formulario-label">Fecha de nacimiento:</label>
                                <input type="date" id="fec_nac" name="fec_nac" class="formulario-input">
                                <div class=" msj-error">
                                </div>
                            </div>
                            <div>
                                <label for="sexo" class="formulario-label">Sexo:</label>
                                <select id="sexo" name="sexo" class="formulario-select">
                                    <option value='0'>--Seleccione--</option>
                                    <?php foreach ($sexo as $sex): ?>
                                        <option value="<?php echo $sex['id_sexo']; ?>">
                                            <?php echo $sex['nombre']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                                <div class=" msj-error">
                                </div>
                            </div>
                        </div>
                        <div id="contacto">
                            <legend>Contacto</legend>
                            <br>
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
                        </div>
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
                                <input type="text" class="formulario-input" name="documentoValor">
                            </div>
                        </div>
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
                                <!-- <label for="domicilio" class="formulario-label">Domicilio</label> -->
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

                    </div>
                </div>

                <div id="formularioJuridico">
                    <div id="tabs2">
                        <ul>
                            <li><a href="#datos">Datos Personales</a></li>
                            <li><a href="#contactoJ">Contacto</a></li>
                            <li><a href="#documentoJ">Documento</a></li>
                            <li><a href="#domicilioJ">Domicilio</a></li>
                        </ul>

                        <div id="datos">
                            <div>
                                <label for="razonSocial" class="formulario-label">Razón Social:</label>
                                <input type="text" id="razonSocial" name="razonSocial" placeholder="JUAN SRL"
                                    class="formulario-input">
                            </div>
                            <!-- <div>
                            <label for="cuit" class="formulario-label">CUIT:</label>
                            <input type="hidden" name="tipodocumento" value="3">
                            <input type="number" id="cuit" name="cuit" placeholder="CUIT de la empresa"
                                class="formulario-input">
                        </div> -->
                            <div>
                                <label for="nroIngresoBruto" class="formulario-label">Nro de Ingreso Bruto:</label>
                                <input type="number" id="nroIngresoBruto" name="nroIngresoBruto" placeholder="Algo"
                                    class="formulario-input">
                            </div>
                            <div>
                                <label for="cc" class="formulario-label">Contrato Constitutivo:</label>
                                <select id="cc" class="formulario-select" name="cc">
                                    <option value="0">--Seleccione--</option>
                                    <?php foreach ($contratoconstitutivo as $regcc): ?>
                                        <option value="<?php echo $regcc['id_contrato_cons'] ?>">
                                            <?php echo $regcc['nombre'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label for="fechadeconstitucion" class="formulario-label">Fecha de Constitución:</label>
                                <input type="date" id="fechadeconstitucion" name="fechadeconstitucion"
                                    class="formulario-input">
                            </div>
                        </div>
                        <div id="contactoJ">
                            <legend>Contacto</legend>
                            <br>
                            <div>
                                <label class="formulario-label" for="tipoContactoJ">Tipo de Contacto:</label>
                                <select class="formulario-select" name="tipoContactoJ">
                                    <option value="0">--Seleccione--</option>
                                    <?php foreach ($metodocontacto as $regcontacto): ?>
                                        <option value="<?php echo $regcontacto['id_tipo_contacto'] ?>">
                                            <?php echo $regcontacto['tipo_contacto_nombre'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="text" class="formulario-input" name="contactoValorJ">
                            </div>
                        </div>
                        <div id="documentoJ">
                            <legend>Documento</legend>
                            <br>
                            <div>
                                <label class="formulario-label" for="tipoDocumentoJ">Documento:</label>
                                <select class="formulario-select" name="tipoDocumentoJ">
                                    <option value="0">--Seleccione--</option>
                                    <?php foreach ($tipodocumento as $regDoc): ?>
                                        <option value="<?php echo $regDoc['id_tipo_documento'] ?>" <?php if ($regDoc['id_tipo_documento'] == 3)
                                               echo 'selected'; ?>>
                                            <?php echo $regDoc['descripcion'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="text" class="formulario-input" name="documentoValorJ">
                            </div>
                        </div>
                        <div id="domicilioJ">
                            <legend>Domicilio</legend>
                            <br>
                            <div>
                                <label for="paisJ" class="formulario-label">Pais:</label>
                                <select name="paisJ" id="paisJ" class="formulario-select"
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
                                <label for="provinciasJ" class="formulario-label">Provincia:</label>
                                <select name="provinciasJ" id="provinciasJ" class="formulario-select"
                                    onchange="cargarLocalidades(this.value)">
                                </select>
                            </div>

                            <div>
                                <label for="localidadJ" class="formulario-label">Localidad:</label>
                                <select name="localidadJ" id="localidadJ" class="formulario-select"
                                    onchange="cargarBarrios(this.value)">
                                </select>
                            </div>

                            <div>
                                <label for="barrioJ" class="formulario-label">Barrio:</label>
                                <select name="barrioJ" id="barrioJ" class="formulario-select">
                                </select>
                            </div>
                            <div>
                                <label for="tipoDomJ">Tipo de domicilio</label>
                                <select name="tipoDomJ" id="tipoDomJ" class="formulario-select">
                                    <option value="0">--Seleccione--</option>
                                    <?php foreach ($tipoDom as $regTipoDom): ?>
                                        <option value=<?php echo $regTipoDom['id_tipo_dom'] ?>>
                                            <?php echo $regTipoDom['valor'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <!-- <label for="domicilio" class="formulario-label">Domicilio</label> -->
                                <table id="atributosDomiciliosJuridico" class="tablamodal">
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
                                                <select id="tipoAtributoJuridico" name="tipoAtributoJuridico">
                                                    <option value="0"> - Seleccionar Opci&oacute;n - </option>

                                                    <?php foreach ($atributoDomicilio as $atributo) { ?>
                                                        <option value="<?php echo $atributo['id_atri_dom']; ?>">
                                                            <?php echo $atributo['valor']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </th>
                                            <th>
                                                <input type="text" id="valorAtributoJuridico"
                                                    name="valorAtributoJuridico">
                                            </th>
                                            <th>
                                                <button type="button" title="Agregar"
                                                    onclick="agregarAtributoJuridico()"> +
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div>
                        <button type="submit" name="submit" id="guardar" class="formulario-submit"> Guardar
                        </button>
                    </div>
                </div>
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
    function agregarAtributoJuridico() {
        let tipoAtributo = document.getElementById('tipoAtributoJuridico');
        let valorAtributo = document.getElementById('valorAtributoJuridico');

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
        input_tipoAtributo.setAttribute('name', 'atributosSeleccionadosJuridico[]');
        input_tipoAtributo.setAttribute('value', tipoAtributo_val);

        let input_valorAtributo = document.createElement('input');
        input_valorAtributo.setAttribute('type', 'hidden');
        input_valorAtributo.setAttribute('name', 'valoresIngresadosJuridico[]');
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
            '<button type="button" class="eliminar" onclick="eliminarAtributoJuridico(this)" title="Eliminar"> X </button>';
        fila.appendChild(celda_boton);

        /* Se identifica la tabla y le asigno la fila creada */
        let tabla = document.getElementById('atributosDomiciliosJuridico');
        tabla.tBodies[0].appendChild(fila);

        /* Se resetean el combo y la caja de texto */
        tipoAtributo.value = 0;
        valorAtributo.value = "";
    }

    function eliminarAtributoJuridico(boton) {
        let fila = boton.parentNode.parentNode;

        let tabla = document.getElementById('atributosDomiciliosJuridico');
        tabla.tBodies[0].removeChild(fila);
    }
</script>


<?php
include(ROOT_PATH . 'includes\footter.php');
?>