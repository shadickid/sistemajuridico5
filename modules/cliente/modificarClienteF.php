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
$tipodocumento = selectall('documento', $conditional);
$sexo = selectall('sexo');

$idPersona = $_GET['idPersona'];

$datosCliente = datosClientesFisicosModificar($idPersona)

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
            <h2>Modificar de Cliente</h2>
            <div class="msj-container" id="msj-container">
                <?php switch ($vali):
                    case 1: ?>
                <span class="msj-error show">El cliente ya esta registrado</span>
                <?php
                        break;
                    case 2: ?>
                <span class="msj-modify show">Se ha modificado correctamente</span>

                <?php endswitch ?>
            </div>
            <form action="procesarmodificarClienteF.php" method="post" id="formularioClienteF">
                <?php foreach ($datosCliente as $regCliente): ?>


                <input type="hidden" name="idPersona" value="<?php echo $idPersona ?>">


                <div>

                    <label for="nombre" class="formulario-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Juan Perez" class="formulario-input"
                        value="<?php echo $regCliente['persona_nombre'] ?>">
                    <div class="msj-error"></div>
                </div>

                <div>
                    <label for="apellido" class="formulario-label">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Tom&aacute;s" class="formulario-input"
                        value="<?php echo $regCliente['persona_apellido'] ?>">
                    <div class="msj-error"></div>
                </div>
                <div>
                    <label for="fec_nac" class="formulario-label">Fecha de nacimiento:</label>
                    <input type="date" id="fec_nac" name="fec_nac" class="formulario-input"
                        value="<?php echo $regCliente['persona_fec_nac'] ?>">
                    <div class="msj-error"></div>
                </div>
                <div>
                    <label for="sexo" class="formulario-label">Sexo:</label>
                    <select id="sexo" name="sexo" class="formulario-select">
                        <option value='0'>--Seleccione--</option>
                        <?php foreach ($sexo as $sex): ?>
                        <option value="<?php echo $sex['id_sexo']; ?>" <?php if ($sex['id_sexo'] == $regCliente['id_sexo'])
                                       echo 'selected'; ?>>
                            <?php echo $sex['nombre']; ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <div class="msj-error"></div>
                </div>
                <div>
                    <label for="tipodocumento" class="formulario-label">Tipo documento:</label>
                    <select id="tipodocumento" name="tipodocumento" class="formulario-select">
                        <option value='0'>--Seleccione--</option>
                        <?php foreach ($tipodocumento as $regtipo): ?>
                        <option value="<?php echo $regtipo['id_tipo_documento'] ?>" <?php if ($regtipo['id_tipo_documento'] == $regCliente['id_tipo_documento'])
                                       echo 'selected'; ?>>
                            <?php echo $regtipo['descripcion'] ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <div class="msj-error"></div>
                </div>
                <div>
                    <label for="documento" class="formulario-label">Documento:</label>
                    <input type="number" name="documento" id="documento" class="formulario-input"
                        value="<?php echo $regCliente['detalle'] ?>">
                    <div class="msj-error"></div>
                    <input type="text" name="docuviejo" id="docuviejo" class="formulario-input"
                        value="<?php echo $regCliente['detalle'] ?>">
                </div>
                <div>
                    <button type="submit" name="submit" id="guardar" class="formulario-submit"> Guardar </button>
                </div>
                <?php endforeach; ?>
            </form>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>