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
            <div id="tabs">
                <ul>
                    <li><a href="#datos">Datos Personales</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                    <li><a href="#documento">Documento</a></li>
                    <li><a href="#domicilio">Domicilio</a></li>

                </ul>

                <form action="procesarClienteF.php" method="post" id="formularioClienteF">
                    <input type="hidden" id="" name="tipopersona" value="1">
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

                    <div>
                        <button type="submit" name="submit" id="guardar" class="formulario-submit"> Guardar </button>
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
</script>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>