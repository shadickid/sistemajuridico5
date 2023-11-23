<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function consultarUsuarioPersona($idUsuario)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "SELECT * from persona 
    inner join persona_fisica on persona_fisica.id_persona=persona.id_persona
    inner join empleado on empleado.id_persona_fisica=persona_fisica.id_persona_fisica
    inner join usuario on usuario.id_empleado=empleado.id_empleado
    where usuario.id_usuario=$idUsuario";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();

    return $records;
}
function consultarUsuarioPerfil()
{
    global $connect;
    $sql = "SELECT  u.id_usuario,
                    u.usuario_contrasena,
                    u.usuario_nombre,
                    p.descripcion,
                    u.id_empleado from usuario u
                    inner join perfil p on p.id_perfil=u.id_perfil
                    where u.estado_logico=1;";
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
                    p.id_perfil,
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

function ModificarUsuario($usarioNombre, $perfil, $idUsuario)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`usuario` 
    SET `usuario_nombre`= '$usarioNombre',
    `id_perfil`         = '$perfil' 
    WHERE (`id_usuario` = '$idUsuario');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
        return 1;
    } else {
        $connect->rollback();
        return 0;
    }
}

function ModificarContra($idUsuario, $contra)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`usuario` SET 
    `usuario_contrasena` = '$contra' 
    WHERE (`id_usuario` = '$idUsuario');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
        return 1;
    } else {
        $connect->rollback();
        return 0;
    }
}

function borrarUsuario($idUsuario)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`usuario` 
    SET `estado_logico` = '0' 
    WHERE (`id_usuario` = '$idUsuario');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
        return 1;
    } else {
        $connect->rollback();
        return 0;
    }
}