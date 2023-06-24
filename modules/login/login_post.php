<?php
require_once('../../config/path.php');
include(ROOT_PATH . 'config\database\connect.php');
$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT p.id_perfil, usuario_nombre,usuario_contraseña,persona_nombre,persona_apellido,descripcion from sistemajuridico.perfil p
inner join usuario u on p.id_perfil=u.id_perfil
inner join abogado a on u.id_perfil=a.id_abogado
inner join persona_fisica pf on pf.id_persona_fisica=a.id_persona_fisica where usuario_nombre like '{$user}'";


/* SELECT * FROM sistemajuridico.usuario where usuario_nombre like '{$user}'; */
/* SELECT * FROM sistemajuridico.usuario where usuario_contraseña = '{$pass}'; */
$datos_user = $connect->query($sql);
if ($datos_user->num_rows == 1) {
    $sql = "SELECT p.id_perfil , usuario_nombre,usuario_contraseña,persona_nombre,persona_apellido,descripcion from sistemajuridico.perfil p
    inner join usuario u on p.id_perfil=u.id_perfil
    inner join abogado a on u.id_perfil=a.id_abogado
    inner join persona_fisica pf on pf.id_persona_fisica=a.id_persona_fisica where usuario_contraseña = '{$pass}'";
    $datos_pass = $connect->query($sql);
    if ($datos_pass->num_rows == 1) {

        while ($reg = $datos_pass->fetch_assoc()) {
            $usuario = $reg['usuario_nombre'];
            $perfil = $reg['descripcion'];
            $nombre = $reg['persona_nombre'];
            $apellido = $reg['persona_apellido'];
            $id_perfil = $reg['id_perfil'];
        }
        session_start();
        $_SESSION['perfil'] = $perfil;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['id_perfil'] = $id_perfil;

        header('location:' . BASE_URL . 'modules/dashboard/dashboard.php');
    } else {
        header('location:' . BASE_URL . 'modules/login/login.php?error=2');
    }
} else {
    header('location:' . BASE_URL . 'modules/login/login.php?error=1');
}
