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

$contratoconstitutivo = selectall('contrato_constitutivo');
$idPersona = $_GET['idPersona'];
$datosclientes = datosClientesJuridicosModificar($idPersona);



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
                        <span class="msj-error show">El cliente ya esta registrado</span>
                        <?php
                        break;
                    case 2: ?>
                        <span class="msj-modify show">Se ha modificado correctamente</span>

                <?php endswitch ?>
            </div>
            <h2>Modificar de Cliente</h2>
            <form action="procesarmodificarClienteJ.php" method="post" id="formularioClienteJ">
                <?php foreach ($datosclientes as $regCliente): ?>

                    <input type="hidden" name="idPersona" value="<?php echo $idPersona ?>">


                    <div id="">
                        <div>
                            <label for="razonSocial" class="formulario-label">Razon Social:</label>
                            <input type="text" id="razonSocial" name="razonSocial" placeholder="JUAN SRL"
                                class="formulario-input" value="<?php echo $regCliente['razon_social'] ?>">
                        </div>
                        <div>
                            <label for="cuit" class="formulario-label">CUIT:</label>
                            <input type="hidden" name="tipodocumento" value="3">
                            <input type="number" id="cuit" name="cuit" placeholder="cuit de la empresa"
                                class="formulario-input" value="<?php echo $regCliente['detalle'] ?>">
                        </div>
                        <div>
                            <label for="nroIngresoBruto" class="formulario-label">Nro de ingreso bruto:</label>
                            <input type="number" id="nroIngresoBruto" name="nroIngresoBruto" placeholder="algo"
                                class="formulario-input" value="<?php echo $regCliente['numero_de_ing_bruto'] ?>">
                        </div>
                        <div>
                            <label for="cc" class="formulario-label">Contrato Constitutivo:</label>
                            <select id="cc" class="formulario-select" name="cc">
                                <option value="0">--Seleccione--</option>
                                <?php foreach ($contratoconstitutivo as $regcc): ?>
                                    <option value="<?php echo $regcc['id_contrato_cons']; ?>" <?php if ($regcc['id_contrato_cons'] == $regCliente['id_contrato_constitutivo'])
                                           echo 'selected'; ?>>
                                        <?php echo $regcc['nombre']; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div>
                            <label for="fechadeconstitucion" class="formulario-label">Fecha de constitucion:</label>
                            <input type="date" id="fechadeconstitucion" name="fechadeconstitucion" class="formulario-input"
                                value="<?php echo $regCliente['fecha_de_constitucion'] ?>">
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="submit" class="formulario-submit"> Guardar </button>
                    </div>
                <?php endforeach; ?>
            </form>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>