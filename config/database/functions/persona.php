<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function agregarPersona($tipoPersona)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`persona` (`tipo`) VALUES ('$tipoPersona');";
    $s = $connect->prepare($sql);

    $s->execute();
    $id_persona = $connect->insert_id;
    $s->close();
    return $id_persona;
}
function personaContacto($personaFisica)
{
    global $connect;
    $sql = "SELECT * from persona
            inner join persona_fisica on persona_fisica.id_persona=persona.id_persona
            inner join contactoxpersona on contactoxpersona.id_persona=persona.id_persona
            inner join tipo_contacto on tipo_contacto.id_tipo_contacto=contactoxpersona.id_tipo_contacto
            where id_persona_fisica=$personaFisica";

    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
function personaContactoJ($personaJuridica)
{
    global $connect;
    $sql = "SELECT * from persona
            inner join persona_juridica on persona_juridica.id_persona=persona.id_persona
            inner join contactoxpersona on contactoxpersona.id_persona=persona.id_persona
            inner join tipo_contacto on tipo_contacto.id_tipo_contacto=contactoxpersona.id_tipo_contacto
            where persona_juridica.id_persona_juridica=$personaJuridica";

    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
function personaDocumento($personaFisica)
{
    global $connect;
    $sql = "SELECT * from persona
                inner join persona_fisica on persona_fisica.id_persona=persona.id_persona
                inner join documentoxpersona on documentoxpersona.id_persona=persona.id_persona
                inner join documento on documento.id_tipo_documento=documentoxpersona.id_tipo_documento
                where id_persona_fisica=$personaFisica";

    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
function personaDocumentoJ($personaJuridica)
{
    global $connect;
    $sql = "SELECT * from persona
                inner join persona_juridica on persona_juridica.id_persona=persona.id_persona
                inner join documentoxpersona on documentoxpersona.id_persona=persona.id_persona
                inner join documento on documento.id_tipo_documento=documentoxpersona.id_tipo_documento
                where persona_juridica.id_persona_juridica=$personaJuridica";

    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}

function personaDomicilio($idPersonaFisica)
{
    global $connect;
    $connect->begin_transaction();
    $sql = " SELECT 
    pais.nombre AS nombre_pais,
    provincia.nombre AS nombre_provincia,
    localidad.nombre AS nombre_localidad,
    barrio.nombre AS nombre_barrio,
    domicilio.id_domicilio AS domicilioID,
    barrio.id_barrio AS barrioID,
    localidad.id_localidad AS localidadID,
    provincia.id_provincia AS provinciaID,
    pais.id_pais AS paisID,
    tipo_dom.valor AS valortipoDom,
    persona_dom.id_tipo_dom AS fkpersonaDOMtipoDOM,
    dom_atri_dom.valor AS valorDomAtri,
    atributo_domiclio.valor AS valorAtri,
    dom_atri_dom.id_atri_dom AS fkValorAtri
FROM persona
INNER JOIN persona_fisica ON persona_fisica.id_persona = persona.id_persona
INNER JOIN persona_dom ON persona_dom.id_persona = persona.id_persona
INNER JOIN tipo_dom ON tipo_dom.id_tipo_dom = persona_dom.id_tipo_dom
INNER JOIN domicilio ON domicilio.id_domicilio = persona_dom.id_domicilio
INNER JOIN dom_atri_dom ON dom_atri_dom.id_domicilio = domicilio.id_domicilio
INNER JOIN barrio ON barrio.id_barrio = domicilio.id_barrio
INNER JOIN localidad ON localidad.id_localidad = barrio.id_localidad
INNER JOIN provincia ON provincia.id_provincia = localidad.id_provincia
INNER JOIN pais ON pais.id_pais = provincia.id_pais
INNER JOIN atributo_domiclio ON atributo_domiclio.id_atri_dom = dom_atri_dom.id_atri_dom
WHERE persona_fisica.id_persona_fisica=$idPersonaFisica";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    // Organizar los resultados por ID de domicilio
    $organizedRecords = [];
    foreach ($records as $record) {
        $domicilioId = $record['domicilioID'];
        if (!isset($organizedRecords[$domicilioId])) {
            $organizedRecords[$domicilioId] = [];
        }
        $organizedRecords[$domicilioId][] = $record;
    }

    return $organizedRecords;
}
function agregarPersonaFisicaEmpleado($nombre, $apellido, $fecnac, $sex, $id_persona)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`persona_fisica` 
            (`persona_nombre`, 
            `persona_apellido`, 
            `persona_fec_nac`, 
            `id_sexo`, 
            `id_persona`) 
            VALUES ('$nombre', '$apellido', '$fecnac', '$sex', '$id_persona');";
    $s = $connect->prepare($sql);

    $s->execute();
    $id_persona_fisica = $connect->insert_id;
    $s->close();
    return $id_persona_fisica;
}


function modificarPersonaFisicaEmpleado($nombre, $apellido, $fecnac, $sexo, $id)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`persona_fisica` SET 
    `persona_nombre` = '$nombre', 
    `persona_apellido` = '$apellido',
    `persona_fec_nac` = '$fecnac', 
    `id_sexo` = '$sexo' 
     WHERE (`id_persona_fisica` = '$id');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
    } else {
        $connect->rollback();
        return 0;
    }
}
function agregarPersonaJuridica($razonSocial, $nroIngresoBruto, $cc, $fechadeconstitucion, $idpersona)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "INSERT INTO `sistemajuridico`.`persona_juridica` (
        `id_persona`, 
        `fecha_de_constitucion`, 
        `id_contrato_constitutivo`, 
        `numero_de_ing_bruto`, 
        `razon_social`)
         VALUES ('$idpersona', '$fechadeconstitucion', '$cc', '$nroIngresoBruto', '$razonSocial');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
    } else {
        $connect->rollback();
        return 0;
    }
}

function modificarPersonaJuridico($razonSocial, $nroIngresoBruto, $cc, $fechadeconstitucion, $id_persona_juridica)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`persona_juridica` SET 
            `fecha_de_constitucion` = '$fechadeconstitucion', 
            `id_contrato_constitutivo` = '$cc',
            `numero_de_ing_bruto` = '$nroIngresoBruto',
            `razon_social` = '$razonSocial' 
            WHERE (`id_persona_juridica` = '$id_persona_juridica');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
    } else {
        $connect->rollback();
        return 0;
    }
}
function agregarSexo($nombre)
{
    global $connect;
    $connect->begin_transaction();

    $sql = "INSERT INTO `sistemajuridico`.`sexo` (`nombre`) VALUES ('$nombre');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
    } else {
        $connect->rollback();
        return 0;
    }
}

function modificarSexo($idsexo, $nombre)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`sexo` SET `nombre` = '$nombre' WHERE (`id_sexo` = '$idsexo');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
    } else {
        $connect->rollback();
        return 0;
    }
}

function borrarSexo($idSexo)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "DELETE FROM `sistemajuridico`.`sexo` WHERE (`id_sexo` = '$idSexo');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
    } else {
        $connect->rollback();
        return 0;
    }
}