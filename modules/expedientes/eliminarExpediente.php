<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');
require_once(ROOT_PATH . 'config\database\functions\expediente.php');
$id_expediente = $_GET['id_expediente'];

borrarExpediente($id_expediente);

header("location: listado.php?vali=3");