<?php
/* require_once('../../../config/path.php'); */
/* no funciona asi, pero si le pongo ../ si funciona */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'vendor\autoload.php');
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:' . BASE_URL . 'modules/login/login.php');
}
include(ROOT_PATH . 'config\database\connect.php');
$vali = null;
if (isset($_GET['vali']) && $_GET['vali'] !== null) {
    $vali = intval($_GET['vali']);

} else {
    $vali = null;
}




?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/estilos.css" />
    <meta name="author" content="Renzo Nathaniel Tomas" />
    <meta name="description" content="Dashboard" />
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>assets\img\Logo_Renzo_Law.png" />
    <link rel="stylesheet"
        href="<?php echo BASE_URL; ?>assets\icons\uicons-regular-rounded\css\uicons-regular-rounded.css" />
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
    <header>
        <h1></h1>
    </header>