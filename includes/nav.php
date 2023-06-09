<?php
?>
<nav class="navbar-side">
    <a href="#" class="icon">
        <img src="<?php echo BASE_URL; ?>img/Mi proyecto.png" height="152px" width="150px" class="logo" />
    </a>
    <span>Hola <?php echo $_SESSION['nombre'] .''. $_SESSION['apellido']?></span>
    <span>Perfil:<?php echo $_SESSION['perfil'] ?></span>
    <span>Usuario:<?php echo $_SESSION['usuario'] ?></span>
 
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
        <li><a href="<?php echo BASE_URL; ?>/modules/login/logout.php">Cerrar Sesion</a></li>
    </ul>
</nav>