<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');


function datosClientes()
{
    global $connect;
    $connect->begin_transaction();
    $sql = "SELECT
                    c.id_cliente AS id_cliente_fisico,
                    pf.id_persona_fisica AS id_persona_fisica,
                    pf.persona_nombre AS nombre,
                    pf.persona_apellido AS apellido,
                    'Persona Física' AS tipo_cliente
                                                            FROM
                                                            cliente c
                    INNER JOIN
                        persona_fisica pf ON c.id_persona_fisica = pf.id_persona_fisica
                    WHERE
                        c.estado = 1

UNION

            SELECT
                    cj.id_cliente_juridico AS id_cliente_juridico,
                    pj.id_persona_juridica AS id_persona_juridica,
                    pj.razon_social AS razon_social,
                    pj.fecha_de_constitucion AS fecha_de_constitucion,
                    'Persona Jurídica' AS tipo_cliente
                                                            FROM
                                                            cliente_juridico cj
                    INNER JOIN
                        persona_juridica pj ON cj.id_persona_juridica = pj.id_persona_juridica
                    WHERE
                        cj.estado = 1;";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
