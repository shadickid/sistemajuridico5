<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');
require_once(ROOT_PATH . 'config\database\functions\expediente.php');
$idExpxMov = $_GET['idExpxMov'];
$id_expediente = $_GET['id_expediente'];
if ($idExpxMov != null) {
    borrarDetalleMovimiento($idExpxMov);
    header("location:nuevo_mov.php?id_expediente=$id_expediente&vali=3");
} else {
    header("location:nuevo_mov.php?id_expediente=$id_expediente&vali=4");
}