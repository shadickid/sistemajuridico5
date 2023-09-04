<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function verificarUsername($user)
{
    $hash = "";
    global $connect;
    $sql = "SELECT usuario_nombre,usuario_contrasena FROM usuario where usuario_nombre = '{$user}'";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
    if ($records->num_rows == 1) {
        foreach ($records as $reg) {
            $hash = $reg['usuario.contrasena'];
        }
    }
    $s->close();
    return $hash;
}

function verificarPassword($hash)
{

    global $connect;
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
    inner join persona_fisica pf on pf.id_persona_fisica=e.id_persona_fisica 
    where usuario_contrasena = '{$hash}'";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
    $s->close();
    return $records;
}

function desencriptarPass($pass)
{
    global $connect;
    $sql = "SELECT * from usuario";
}