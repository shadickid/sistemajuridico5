<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');
require_once(ROOT_PATH . 'config\database\functions\expediente.php');
$nroExpediente = $_POST['nroExpediente'];
$caratula = $_POST['caratula'];
$fechaInicio = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFin'];
$clienteF = $_POST['clienteF'];
$estadoExp = $_POST['estadoExp'];
$expSubTipo = $_POST['expSubTipo'];
$comentario = $_POST['comentario'];


$sql = "SELECT * from expediente where  expediente_nro like '$nroExpediente';";

$verificar_datos_expediente = $connect->query($sql);

if ($verificar_datos_expediente->num_rows > 0) {
    header("location: formularioExpedienteF.php?vali=1");
} else {
    agregarExpediente($nroExpediente, $caratula, $fechaInicio, null, $comentario, $estadoExp, $expSubTipo, $clienteF);

}