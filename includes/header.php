<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:'. BASE_URL .'modules/login/login.php');
}
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
        <nav class="navbar-side">
            <a href="#" class="icon">
                <img src="<?php echo BASE_URL ;?>img/Mi proyecto.png" height="152px" width="150px" class="logo" />
            </a>
            <span>Hola,<?php echo $_SESSION['usuario'] ?></span>
            <ul>
                <li><a href="#">INICIO</a></li>
                <li><a href="#">Cliente</a>
                    <ul>
                        <li><a href="#">Listado</a></li>
                        <li><a href="#">Nuevo</a></li>
                    </ul>
                </li>
                <li><a href="#">Abogado</a>
                    <ul>
                        <li><a href="#">Listado</a></li>
                        <li><a href="#">Nuevo</a></li>
                    </ul>
                </li>
                <li><a href="#">Expediente</a>
                    <ul>
                        <li><a href="#">Listado</a></li>
                        <li><a href="#">Nuevo</a></li>
                    </ul>
                </li>
                <li><a href="#">Movimiento</a></li>
                <li><a href="#">Reporte</a></li>
                <li><a href="#">Informe</a></li>
                <li><a href="../login/logout.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>