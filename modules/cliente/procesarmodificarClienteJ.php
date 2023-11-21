<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php';
require_once ROOT_PATH . 'config/database/connect.php';
include ROOT_PATH . 'config\database\functions\persona.php';

$idPersona = $_POST['idPersona'];
$razonSocial = $_POST['razonSocial'];
$nroIngresoBruto = $_POST['nroIngresoBruto'];
$cc = $_POST['cc'];
$fechadeconstitucion = $_POST['fechadeconstitucion'];
$idPersonaJuridica = $_POST['idPersonaJuridica'];

if ($idPersona != null && $razonSocial != null && $nroIngresoBruto != null && $cc != null && $fechadeconstitucion != null && $idPersonaJuridica != null) {

    modificarPersonaJuridico($razonSocial, $nroIngresoBruto, $cc, $fechadeconstitucion, $idPersonaJuridica);

    header("location: listado.php?vali=2");
    exit;
} else {
    header("location: modificarClienteJ.php?idPersona=$idPersona&idPersonaJuridica=$idPersonaJuridica&vali=3#datos");
    exit;
}
?>