<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function agregarModulo($nombre)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "INSERT INTO `sistemajuridico`.`modulo` (`descripcion`) VALUES ('$nombre');";
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
function modificarModulo($nombre, $id_modulo)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`modulo` SET `descripcion` = '$nombre' WHERE (`id_modulo` = '$id_modulo');";
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
function borrarModulo($id_modulo)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`modulo` SET `estado_logico` = '0' WHERE (`id_modulo` = '$id_modulo');";
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

function consultarPerfilxModulo($id_perfil)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "SELECT * from modulo m
            inner join perfilxmodulo pxm on pxm.id_modulo=m.id_modulo
            inner join perfil p on p.id_perfil=pxm.id_perfil
            where p.id_perfil=$id_perfil;";
    $s = $connect->prepare($sql);
    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}

function agregarPerfilxModulo($id_perfil, $Modulo)
{
    global $connect;
    $connect->begin_transaction();

    try {
        for ($i = 0; $i < count($Modulo); $i++) {
            $idModulo = $Modulo[$i];
            $sql = "INSERT INTO `sistemajuridico`.`perfilxmodulo` 
            (`id_perfil`, `id_modulo`) VALUES (?, ?)";
            $s = $connect->prepare($sql);

            if ($s) {
                $s->bind_param('ii', $id_perfil, $idModulo);
                $s->execute();
                $s->close();
            } else {
                throw new Exception("Error en la preparación de la consulta.");
            }
        }

        $connect->commit();
        return 1;
    } catch (Exception $e) {
        $connect->rollback();
        return 0;
    }
}

function eliminarPerfilxModulo($id_perfil, $id_modulo)
{
    global $connect;

    $connect->begin_transaction();

    try {
        $sql = "DELETE FROM `sistemajuridico`.`perfilxmodulo` 
                WHERE `id_perfil` = ? AND `id_modulo` = ?";

        $stmt = $connect->prepare($sql);

        if ($stmt) {
            $stmt->bind_param('ii', $id_perfil, $id_modulo);
            $stmt->execute();
            $stmt->close();

            $connect->commit();
            return true;
        } else {
            throw new Exception("Error en la preparación de la consulta.");
        }
    } catch (Exception $e) {
        $connect->rollback();
        return false;
    }
}