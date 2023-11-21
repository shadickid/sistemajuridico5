<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
$contra = $_POST['nuevaContrasena'];
$newcontra = $_POST['confirmarContrasena'];
$idUsuario = $_POST['idUsuario'];

if ($contra == $newcontra) {
    $hash = password_hash($newcontra, PASSWORD_DEFAULT);
    actualizarContrasena($idUsuario, $hash);
    session_start();
    session_destroy();
    header('location:' . BASE_URL . 'modules\login\login.php');

}