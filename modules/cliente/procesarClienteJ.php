<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');
include(ROOT_PATH . 'config\database\functions\persona.php');
include(ROOT_PATH . 'config\database\functions\cliente.php');
include(ROOT_PATH . 'config\database\functions\documento.php');

$tipopersona = $_POST['tipopersona'];
$razonSocial = $_POST['razonSocial'];
$tipodocumento = $_POST['tipodocumento'];
$documento = $_POST['cuit'];
$nroIngresoBruto = $_POST['nroIngresoBruto'];
$cc = $_POST['cc'];
$fechadeconstitucion = $_POST['fechadeconstitucion'];



$sql = "SELECT * FROM persona
        inner join persona_juridica on persona_juridica.id_persona=persona.id_persona
        inner join cliente on cliente.id_persona =persona.id_persona
        inner join documentoxpersona on persona.id_persona=documentoxpersona.id_persona
        where cliente.estado=1 and documentoxpersona.detalle=$documento";

$verificar_datos_cliente = $connect->query($sql);

if ($verificar_datos_cliente->num_rows > 0) {
    header("location: formularioClienteJ.php?vali=1");
} else {
    $id_persona = agregarPersona($tipopersona);
    agregarCliente($id_persona);
    agregarEmpleadoDocumento($documento, $id_persona, $tipodocumento);
    agregarPersonaJuridica($razonSocial, $nroIngresoBruto, $cc, $fechadeconstitucion, $id_persona);
    header("location: listado.php?vali=1");

}