<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:' . BASE_URL . 'modules/login/login.php');
}
require_once('../../config/path.php');
include (ROOT_PATH.'config\database\connect.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/estilos.css" />
    <meta name="author" content="Renzo Nathaniel Tomàs" />
    <meta name="description" content="Dashboard" />
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>img/Mi proyecto.png" />
    <title>Dashboard</title>
</head>

<body>
    <header>
        <h1>Bienvenidos al sistema</h1>
    </header>