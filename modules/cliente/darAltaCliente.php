<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\cliente.php');
include(ROOT_PATH . 'config\database\functions\usuario.php');

$idPersona = $_GET['idPersona'];
$records = buscarCliente($idPersona);
foreach ($records as $record) {
    $idCliente = $record['id_cliente'];

}
altaCliente($idCliente);
header("location: listadoPersonaBaja.php?vali=1");