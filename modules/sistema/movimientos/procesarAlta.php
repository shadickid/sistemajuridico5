<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/movimiento.php');
$nombre = $_POST['nombre'];

agregarMovimiento($nombre);
header("location: listado.php");