<?php
include ('../../config/connect.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/estilos.css" />
    <meta name="author" content="Renzo Nathaniel Tomás" />
    <meta name="description" content="Formulario de abogado" />
    <link rel="icon" type="image/x-icon" href="../../img/Mi proyecto.png" />
    <title>Formulario de abogado</title>
</head>
<!-- <header>
    <nav class="navbar-side">
        <a href="#" class="icon">
            <img src="../../img/Mi proyecto.png" height="152px" width="150px" class="logo" />
        </a>
        <span>Hola, echo $_SESSION['usuario'] </span>
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
 -->
<body>
    <h1>Registro de abogado</h1>
    <fieldset>
        <form action="enviar_abogado.php" method="post">
        <legend>Datos personales</legend>
            <br>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name">
            <br>
            <label for="lastname">Apellido</label>
            <input type="text" name="lastname" id="lastname">
            <br>
            <label for="fec_nac">Fecha de nacimiento</label>
            <input type="date" name="fec_nac" id="fec_nac">
            <br>
            <label for="esp">Especialidad</label><!-- Aca va un select para abajo -->
            <select name="esp" id="esp">
                <option>Derecho de Daños</option>
                <option>Derecho de Familia</option>
                <option>Derecho de la Empresa</option>
                <option>Derecho Laboral</option>
                <option>Derecho Notarial, Registral e Inmobiliario</option>
                <option>Derecho Penal</option>
                <option>Derecho Procesal Civil</option>
                <option>Derecho Procesal Penal</option>
                <option>Derecho Sucesorio</option>
                <option>Derecho Tributario</option>
            </select>
            <br>
            <label for="sex">Sexo</label>
            <select name="sex" id="sex">
                <?php
                $query="SELECT * FROM sistemajuridico.sexo;";
                $resultado=$connect->query($query);
                while ($reg=$resultado->fetch_assoc()){
                ?>
                <option value="<?php echo $reg['id_sexo']; ?>" ><?php echo $reg['nombre']; ?></option>
                <?php }?>
            </select>
            <br>
            <label for="contacto">contacto</label>
            <select name="tipoContacto" id="tipoContacto">
            <?php
                $query="SELECT * FROM sistemajuridico.tipo_contacto;";
                $resultado=$connect->query($query);
                while ($reg=$resultado->fetch_assoc()){
                ?>
                <option value="<?php echo $reg['id_tipo_contacto']; ?>" ><?php echo $reg['tipo_contacto_nombre']; ?></option>
                <?php }?>
            </select>
            <input type="text" name="contacto" id="">
            <br>
            <label for="Documento">Documento</label>
            <select name="tipoDocumento" id="tipoDocumento">
            <?php
                $query="SELECT * FROM sistemajuridico.documento;";
                $resultado=$connect->query($query);
                while ($reg=$resultado->fetch_assoc()){
                ?>
                <option value="<?php echo $reg['id_tipo_documento']; ?>" ><?php echo $reg['descripcion']; ?></option>
                <?php }?>
            </select>
            <input type="text" name="Documento" id="Documento">
            <button  type="submit">Guardar</button>
            </form>
    </fieldset>
</body>

</html>