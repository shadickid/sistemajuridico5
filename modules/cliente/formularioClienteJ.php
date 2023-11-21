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

$contratoconstitutivo = selectall('contrato_constitutivo');
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
    <h1>Listado de clientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\cliente\listado.php" class="volver-atras-button">Volver Atrás</a>
    <section class="inicio">
        <div class="contenido">
            <div class="msj-container" id="msj-container">
                <?php switch ($vali):
                    case 1: ?>
                        <span class="msj-error show">El cliente ya está registrado</span>
                        <?php break;
                    case 2: ?>
                        <span class="msj-modify show">Se ha modificado correctamente</span>
                <?php endswitch ?>
            </div>
            <h2>Registro de Cliente</h2>
            <div id="tabs">
                <ul>
                    <li><a href="#datos">Datos Personales</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                    <li><a href="#documento">Documento</a></li>
                    <li><a href="#domicilio">Domicilio</a></li>
                </ul>

                <form action="procesarClienteJ.php" method="post" id="formularioClienteJ">
                    <input type="hidden" value="2" name="tipopersona">

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
                                    <option value="<?php echo $regDoc['id_tipo_documento'] ?>" <?php if ($regDoc['id_tipo_documento'] == 3)
                                           echo 'selected'; ?>>
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
                        <button type="submit" name="submit" class="formulario-submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>