<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

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