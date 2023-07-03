<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$nombre = $_POST['nombre'];
$id_pais = $_POST['pais'];
$id_provincia = $_POST['id_provincia'];
modificarProvincia($nombre, $id_pais, $id_provincia);
header("location: listado.php");
