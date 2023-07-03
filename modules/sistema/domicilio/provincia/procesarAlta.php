<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/domicilio.php');
$nombre = $_POST['nombre'];
$id_pais = $_POST['id_pais'];
agregarProvincia($nombre, $id_pais);
header("location: listado.php");
