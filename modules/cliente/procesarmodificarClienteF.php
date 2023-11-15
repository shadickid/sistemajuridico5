<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php';
require_once ROOT_PATH . 'config/database/connect.php';
include ROOT_PATH . 'config\database\functions\persona.php';
include ROOT_PATH . 'config\database\functions\cliente.php';
include ROOT_PATH . 'config\database\functions\documento.php';

$idPersona = $_POST['idPersona'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fec_nac = $_POST['fec_nac'];
$sexo = $_POST['sexo'];
$tipodocumento = $_POST['tipodocumento'];
$documento = $_POST['documento'];



$verificar_datos_cliente = verificarDocumento($documento);
foreach ($verificar_datos_cliente as $cliente) {
    $dnicliente = $cliente["detalle"];
    $id_persona_fisica = $cliente['id_persona_fisica'];
    $id_documentoxpersona = $cliente['id_documentoxpersona'];
}


if ($dnicliente == $documento) {
    header("location: modificarClienteF.php?idPersona=$idPersona&vali=1");
} else {
    modificarPersonaFisicaEmpleado($nombre, $apellido, $fec_nac, $sexo, $id_persona_fisica);
    modificarPersonaDocumento($documento, $idPersona, $tipodocumento, $id_documentoxpersona);
    header("location: listado.php?vali=2");
}

?>