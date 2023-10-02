<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\usuario.php');
$idUsuario = $_POST['id_usuario'];
$usuario = $_POST['usuario'];
$perfil = $_POST['perfil'];


if (!empty(trim($usuario)) && $perfil !== 0) {
    ModificarUsuario($usuario, $perfil, $idUsuario);
    header("location: listado.php?vali=2");
} else {
    header("location: listado.php?vali=4");
}



// if (!empty($usuario) || trim($usuario)) {
//     if ($perfil !== 0) {
//         ModificarUsuario($usuario, $perfil, $idUsuario);
//     } else {
//         return 0;
//     }
// } else {
//     return 0;
// } 1 exito 2 modificar 3 baja 4 error