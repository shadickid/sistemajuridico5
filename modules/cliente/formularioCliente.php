<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');

include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'config\database\functions\cliente.php');

require_once('control.php');

if (isset($_POST['submit'])) {

    if ($_POST['tipoPersona'] == 2) {
        validarPersonafisica($_POST['nombre'], $_POST['apellido'], $_POST['fec_nac'], $_POST['sexo'], $_POST['tipodocumento'], $_POST['documento']);

        if (($error_nombre == false) && ($error_apellido == false) && ($error_fecNac == false) && ($error_sex == false) && ($error_tipodoc == false) && ($error_doc == false)) {
            echo 'exito';
        }
    } else if ($_POST['tipoPersona'] == 1) {
        //validarPersonaJuridica();
    }



}



$conditional = [
    'estado' => 1
];

$tipodocumento = selectall('documento', $conditional);
$contratoconstitutivo = selectall('contrato_constitutivo');
$sexo = selectall('sexo');



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
            <h2>Registro de Cliente</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="tipoPersona" class="formulario-label">Tipo Persona:</label>
                <select id="tipoPersona" name="tipoPersona" class="formulario-select" onchange="formularioCliente()">
                    <option value="0">--Seleccione--</option>
                    <option value="1">Persona Jur&iacute;dica</option>
                    <option value="2">Persona F&iacute;sica</option>
                </select>

                <div id="formPersonaFisica">
                    <div>
                        <label for="nombre" class="formulario-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Juan Perez" class="formulario-input"
                            value="<?php if (isset($_POST['nombre'])) {
                                echo $_POST['nombre'];
                            } ?>">
                        <?php
                        if ($error_nombre) {
                            echo $error_nombre_mensaje;
                        }
                        ?>
                    </div>

                    <div>
                        <label for="apellido" class="formulario-label">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" placeholder="Tom&aacute;s"
                            class="formulario-input" value="<?php if (isset($_POST['apellido'])) {
                                echo $_POST['apellido'];
                            } ?>">
                        <?php
                        if ($error_apellido) {
                            echo $error_apellido_mensaje;
                        }
                        ?>
                    </div>
                    <div>
                        <label for="fec_nac" class="formulario-label">Fecha de nacimiento:</label>
                        <input type="date" id="fec_nac" name="fec_nac" class="formulario-input">
                    </div>
                    <div>
                        <label for="sexo" class="formulario-label">Sexo:</label>
                        <select id="sexo" name="sexo" class="formulario-select">
                            <option value='0'>--Seleccione--</option>
                            <?php foreach ($sexo as $regsex): ?>
                                <option value="<?php echo $regsex['id_sexo'] ?>">
                                    <?php echo $regsex['nombre'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label for="tipodocumento" class="formulario-label">Tipo documento:</label>
                        <select id="tipodocumento" name="tipodocumento" class="formulario-select">
                            <option value='0'>--Seleccione--</option>
                            <?php foreach ($tipodocumento as $regtipo): ?>
                                <option value="<?php echo $regtipo['id_tipo_documento'] ?>">
                                    <?php echo $regtipo['descripcion'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label for="documento" class="formulario-label">Documento:</label>
                        <input type="number" name="documento" id="documento" class="formulario-input">
                    </div>
                </div>

                <div id="formPersonaJuridica">
                    <div>
                        <label for="razonSocial" class="formulario-label">Razon Social:</label>
                        <input type="text" id="razonSocial" name="razonSocial" placeholder="JUAN SRL"
                            class="formulario-input">
                    </div>
                    <div>
                        <label for="obraSocial" class="formulario-label">Obra Social:</label>
                        <input type="text" id="obraSocial" name="obraSocial" placeholder="algo"
                            class="formulario-input">
                    </div>
                    <div>
                        <label for="nroIngresoBruto" class="formulario-label">Nro de ingreso bruto:</label>
                        <input type="number" id="nroIngresoBruto" name="nroIngresoBruto" placeholder="algo"
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
                </div>
                <div>
                    <button type="submit" name="submit" class="formulario-submit"> Guardar </button>
                </div>
            </form>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>