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
