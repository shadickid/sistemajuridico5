<?php
require_once('../../config/path.php');
include(ROOT_PATH . 'config\database\connect.php');
$user = trim($_POST['username']);
$pass = trim($_POST['password']);
$sql = "SELECT usuario_nombre,usuario_contrasena  FROM usuario
        inner join empleado on empleado.id_empleado=usuario.id_empleado
        where usuario_nombre = '{$user}' and empleado.estado=1";

/* $sql = "SELECT p.id_perfil, usuario_nombre,usuario_contraseña,persona_nombre,persona_apellido,descripcion from sistemajuridico.perfil p
inner join usuario u on p.id_perfil=u.id_perfil
inner join abogado a on u.id_perfil=a.id_abogado
inner join persona_fisica pf on pf.id_persona_fisica=a.id_persona_fisica where usuario_nombre = '{$user}'"; */


/* SELECT * FROM sistemajuridico.usuario where usuario_nombre like '{$user}'; */
/* SELECT * FROM sistemajuridico.usuario where usuario_contraseña = '{$pass}'; */
$datos_user = $connect->query($sql);
if ($datos_user->num_rows == 1) {
    $reg2 = $datos_user->fetch_assoc();
    $contrasena = $reg2['usuario_contrasena'];


    $sql = "SELECT  p.id_perfil , 
                    u.usuario_nombre,
                    u.usuario_contrasena,
                    pf.persona_nombre,
                    pf.persona_apellido,
                    p.descripcion,
                    u.id_usuario 
                    from sistemajuridico.perfil p
    inner join usuario u on p.id_perfil=u.id_perfil
    inner join empleado e on u.id_perfil=e.id_empleado
    inner join persona_fisica pf on pf.id_persona_fisica=e.id_persona_fisica where usuario_contrasena = '{$contrasena}'";
    $datos_pass = $connect->query($sql);
    if ($datos_pass->num_rows == 1 && password_verify($pass, $contrasena)) {

        while ($reg = $datos_pass->fetch_assoc()) {
            $usuario = $reg['usuario_nombre'];
            $perfil = $reg['descripcion'];
            $nombre = $reg['persona_nombre'];
            $apellido = $reg['persona_apellido'];
            $id_perfil = $reg['id_perfil'];
            $id_usuario = $reg['id_usuario'];
            $contrasena = $reg['usuario_contrasena'];
        }
        session_start();
        $_SESSION['perfil'] = $perfil;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['id_perfil'] = $id_perfil;
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['contrasena'] = $contrasena;

        header('location:' . BASE_URL . 'modules/dashboard/dashboard.php');
    } else {
        header('location:' . BASE_URL . 'modules/login/login.php?error=2');
    }
} else {
    header('location:' . BASE_URL . 'modules/login/login.php?error=1');
}