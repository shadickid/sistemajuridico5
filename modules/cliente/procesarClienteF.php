<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');
include(ROOT_PATH . 'config\database\functions\persona.php');
include(ROOT_PATH . 'config\database\functions\cliente.php');
include(ROOT_PATH . 'config\database\functions\documento.php');


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fec_nac = $_POST['fec_nac'];
$sexo = $_POST['sexo'];
$tipodocumento = $_POST['tipodocumento'];
$documento = $_POST['documento'];
$tipopersona = $_POST['tipopersona'];


$sql = "SELECT * FROM persona
        inner join persona_fisica on persona_fisica.id_persona=persona.id_persona
        inner join cliente on cliente.id_persona =persona.id_persona
        inner join documentoxpersona on persona.id_persona=documentoxpersona.id_persona
        where cliente.estado=1 and documentoxpersona.detalle=$documento";

$verificar_datos_cliente = $connect->query($sql);

if ($verificar_datos_cliente->num_rows > 0) {
    header("location: formularioClienteF.php?vali=1");
} else {
    $id_persona = agregarPersona($tipopersona);
    agregarCliente($id_persona);
    agregarEmpleadoDocumento($documento, $id_persona, $tipodocumento);
    agregarPersonaFisicaEmpleado($nombre, $apellido, $fec_nac, $sexo, $id_persona);
    header("location: listado.php?vali=1");

}