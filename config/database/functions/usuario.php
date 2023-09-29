<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');


function consultarUsuarioPerfil()
{
    global $connect;
    $sql = "SELECT  u.id_usuario,
                    u.usuario_contrasena,
                    u.usuario_nombre,
                    p.descripcion,
                    u.id_empleado from usuario u
                    inner join perfil p on p.id_perfil=u.id_perfil;";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}


function consultarUsurioModificar($id_usuario)
{
    global $connect;
    $sql = "SELECT    u.id_usuario,
                    u.usuario_contrasena,
                    u.usuario_nombre,
                    p.descripcion,
                    pf.persona_nombre,
                    pf.persona_apellido,
                    u.id_empleado from usuario u
                    inner join perfil p on p.id_perfil=u.id_perfil
                    inner join empleado e on e.id_empleado=u.id_empleado
                    inner join persona_fisica pf on pf.id_persona_fisica=e.id_persona_fisica
                    where id_usuario=$id_usuario;";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
