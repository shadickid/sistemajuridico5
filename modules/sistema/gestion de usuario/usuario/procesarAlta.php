<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
$perfil = $_POST['perfil'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contrasena'];
$idempleado = $_POST['empleado'];
$hash = password_hash($contraseña, PASSWORD_DEFAULT);
agregarEmpleadoUsuario($usuario, $hash, $perfil, $idempleado);
