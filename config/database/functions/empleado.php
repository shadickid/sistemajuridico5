<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');


function obtenerEmpleadoUsuarios($idEmpleado)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "SELECT * from usuario
    inner join empleado on empleado.id_empleado=usuario.id_usuario
    inner join persona_fisica on persona_fisica.id_persona_fisica=empleado.id_persona_fisica
    inner join persona on persona.id_persona=persona_fisica.id_persona
    where empleado.id_empleado=$idEmpleado";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();



    return $records;
}
function agregarEmpleado($id_persona_fisica, $id_tipo_empleado)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`empleado` 
            (`id_persona_fisica`, 
            `empleado_fec_alta`, 
            `estado`, 
            `id_tipo_empleado`) 
            VALUES ('$id_persona_fisica', now(), '1', '$id_tipo_empleado');";
    $s = $connect->prepare($sql);
    $s->execute();
    $id_empleado = $connect->insert_id;
    $s->close();
    return $id_empleado;
}
function datosPersonalesEmpleado($id_usuario)
{
    global $connect;
    $sql = "SELECT * from usuario
            inner join empleado empleado on empleado.id_empleado=usuario.id_empleado
            inner join persona_fisica pers_fisc on pers_fisc.id_persona_fisica=empleado.id_persona_fisica
            inner join persona pers on pers.id_persona=pers_fisc.id_persona
            inner join sexo on sexo.id_sexo=pers_fisc.id_sexo
            where id_usuario=$id_usuario;";

    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();



    return $records;
}
function datosPersonalesEmpleadoContacto($id_usuario)
{
    global $connect;
    $sql = "SELECT * from usuario
            inner join empleado empleado on empleado.id_empleado=usuario.id_empleado
            inner join persona_fisica pers_fisc on pers_fisc.id_persona_fisica=empleado.id_persona_fisica
            inner join persona pers on pers.id_persona=pers_fisc.id_persona
            inner join sexo on sexo.id_sexo=pers_fisc.id_sexo
            inner join contactoxpersona conxper on conxper.id_persona=pers.id_persona
            inner join tipo_contacto tipocontacto on tipocontacto.id_tipo_contacto=conxper.id_tipo_contacto
            where id_usuario=$id_usuario";

    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}

function datosPersonalesEmpleadoDocumento($id_usuario)
{
    global $connect;
    $sql = "SELECT * from usuario
            inner join empleado empleado on empleado.id_empleado=usuario.id_empleado
            inner join persona_fisica pers_fisc on pers_fisc.id_persona_fisica=empleado.id_persona_fisica
            inner join persona pers on pers.id_persona=pers_fisc.id_persona
            inner join documentoxpersona docxper on pers.id_persona=docxper.id_persona
            inner join documento doc on docxper.id_tipo_documento=doc.id_tipo_documento
            where id_usuario=$id_usuario;";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}


function agregarEmpleadoUsuario($usuario, $contraseña, $perfil, $id_empleado)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`usuario` 
            (`usuario_nombre`,
            `usuario_contrasena`,
            `usuario_fec_creacion`,
            `id_perfil`,
            `id_empleado`) 
          VALUES ('$usuario', 
          '$contraseña',
          now(), 
          '$perfil', 
          '$id_empleado');";
    $s = $connect->prepare($sql);
    $s->execute();
    $s->close();
}
function datosEmpleadoAbogado()
{
    global $connect;
    $sql = "SELECT  e.id_empleado,
    u.usuario_nombre,
    pf.persona_nombre,
    pf.persona_apellido,
    esp.descripcion,
    pf.id_persona_fisica,
    p.id_persona 
    FROM sistemajuridico.persona p
    inner join persona_fisica pf on p.id_persona=pf.id_persona
    inner join empleado e on e.id_persona_fisica=pf.id_persona_fisica
    inner join empleadoxespecializacion ee on e.id_empleado=ee.id_empleadoxespecializacion
    inner join especializacion esp on ee.id_especializacion=esp.id_especializacion
    inner join usuario u on u.id_empleado=e.id_empleado
    where e.estado=1";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
function datosEmpleadoAbogadoBaja()
{
    global $connect;
    $sql = "SELECT  e.id_empleado,
    u.usuario_nombre,
    pf.persona_nombre,
    pf.persona_apellido,
    esp.descripcion,
    pf.id_persona_fisica,
    p.id_persona 
    FROM sistemajuridico.persona p
    inner join persona_fisica pf on p.id_persona=pf.id_persona
    inner join empleado e on e.id_persona_fisica=pf.id_persona_fisica
    inner join empleadoxespecializacion ee on e.id_empleado=ee.id_empleadoxespecializacion
    inner join especializacion esp on ee.id_especializacion=esp.id_especializacion
    inner join usuario u on u.id_empleado=e.id_empleado
    where e.estado=0";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
function datosEmpleadoAbogadosinUser()
{
    global $connect;
    $sql = "SELECT  e.id_empleado,
    pf.persona_nombre,
    pf.persona_apellido,
    esp.descripcion,
    pf.id_persona_fisica 
    FROM sistemajuridico.persona p
    inner join persona_fisica pf on p.id_persona=pf.id_persona
    inner join empleado e on e.id_persona_fisica=pf.id_persona_fisica
    inner join empleadoxespecializacion ee on e.id_empleado=ee.id_empleadoxespecializacion
    inner join especializacion esp on ee.id_especializacion=esp.id_especializacion  
    left join usuario u on u.id_empleado=e.id_empleado
    where e.estado=1 and u.id_usuario is null;";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}

function selectModificarDatosPersonalesEmpleado($idPersonaFisica)
{
    global $connect;
    $sql = "SELECT 
                    pf.id_persona_fisica,
                    persona_nombre,
                    persona_apellido,
                    persona_fec_nac,
                    pf.id_sexo,
                    pf.id_persona,
                    sexo.nombre,
                    id_empleado
                    FROM persona
                    inner join persona_fisica pf on persona.id_persona=pf.id_persona
                    inner join sexo on sexo.id_sexo = pf.id_sexo
                    inner join empleado on empleado.id_persona_fisica=pf.id_persona_fisica
                    where pf.id_persona_fisica=$idPersonaFisica;";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
function selectModificarDatosEmpleado($id_empleado)
{
    global $connect;
    $sql = "SELECT 
                    pf.id_persona_fisica,
                    persona_nombre,
                    persona_apellido,
                    persona_fec_nac,
                    pf.id_sexo,
                    pf.id_persona,
                    sexo.nombre,
                    id_empleado
                    FROM persona
                    inner join persona_fisica pf on persona.id_persona=pf.id_persona
                    inner join sexo on sexo.id_sexo = pf.id_sexo
                    inner join empleado on empleado.id_persona_fisica=pf.id_persona_fisica
                    where empleado.id_empleado=$id_empleado;";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
function ModificarDatosPersonalesEmpleado($idPersonaFisica, $nombre, $apellido, $fecnac, $sex)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`persona_fisica` SET 
            `persona_nombre` = '$nombre', 
            `persona_apellido` = '$apellido', 
            `persona_fec_nac` = '$fecnac',
            `id_sexo`=$sex 
            WHERE (`id_persona_fisica` = '$idPersonaFisica');";
    $s = $connect->prepare($sql);
    $s->execute();
    $s->close();
}
// function modificarDatosEmpleados($idPersonaFisica, $nombre, $apellido, $fecnac, $idSexo)
// {
//     global $connect;
//     $connect->begin_transaction();

//     $sql = "UPDATE `sistemajuridico`.`persona_fisica` 
//     SET 
//     `persona_nombre`        = '$nombre', 
//     `persona_apellido`      = '$apellido', 
//     `persona_fec_nac`       = '$fecnac', 
//     `id_sexo`               = ''                   WHERE 
//     (`id_persona_fisica`    = '$idPersonaFisica');";
// }
function borrarPersonaEmpleado($idEmpleado)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`empleado` SET `estado` = '0' WHERE (`id_empleado` = '$idEmpleado');";
    $s = $connect->prepare($sql);
    $s->execute();
    $s->close();
}

function actualizarContrasena($idUsuario, $contra)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`usuario` SET `usuario_contrasena` = '$contra' WHERE (`id_usuario` = '$idUsuario');";
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