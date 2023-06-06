<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/estilos.css" />
    <meta name="author" content="Renzo Nathaniel Tomàs" />
    <meta name="description" content="Dashboard" />
    <link rel="icon" type="image/x-icon" href="../../img/Mi proyecto.png" />
    <title>Dashboard</title>
</head>

<body>
    <header>
        <nav class="navbar-side">
            <a href="#" class="icon">
                <img src="../../img/Mi proyecto.png" height="152px" width="150px" class="logo" />
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
                <li><a href="#">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>
        <h1>Bienvenidos al sistema</h1>
    <section class="inicio">
       
            <img src="../../img/shaking-hands-3091906_1280.jpg" width="434px" height="360px" />
       
      
            <ul>
                <li>
                    Objetivo 1
                    <p class="esconder">
                        El sistema deberá registrar a las personas que no se hayan
                        registrado anteriormente.
                    </p>
                </li>
                <li>
                    Objetivo 2
                    <p class="esconder">
                        El sistema deberá modificar a los expedientes que se hayan
              registrados anteriormente.
                    </p>
                </li>
                <li>
                    Objetivo 3
                    <p class="esconder">
                        El sistema deberá registrar expedientes que no se hayan registrado
              anteriormente.
                    </p>
                </li>
                <li>
                    Objetivo 4
                    <p class="esconder">
                        El sistema deberá mostrar una consulta de expedientes que se hayan
                        registrado anteriormente.
                    </p>
                </li>
            </ul>

    </section>
    <footer>
        <span>Creador por Renzo</span>
    </footer>
</body>

</html>