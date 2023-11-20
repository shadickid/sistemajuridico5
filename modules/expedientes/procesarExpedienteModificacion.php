<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');
require_once(ROOT_PATH . 'config\database\functions\expediente.php');
$nroExpediente = $_POST['nroExpediente'];
$caratula = $_POST['caratula'];
$fechaInicio = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFin'];
$cliente = $_POST['cliente'];
$estadoExp = $_POST['estadoExp'];
$expSubTipo = $_POST['expSubTipo'];
$comentario = $_POST['comentario'];
$idExpediente = $_POST['idExpediente'];

if ($fechaFin !== "") {
    modificarExpediente($nroExpediente, $caratula, $fechaInicio, $fechaFin, $comentario, $estadoExp, $expSubTipo, $cliente, $idExpediente);
    header("location: listado.php?vali=2");


} else {
    modificarExpediente($nroExpediente, $caratula, $fechaInicio, $fechaFin, $comentario, $estadoExp, $expSubTipo, $cliente, $idExpediente);
    header("location: listado.php?vali=2");

}