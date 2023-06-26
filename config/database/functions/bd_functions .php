<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function selectall($table, $conditions = [])
{


    global $connect;
    if (empty($conditions)) {
        $sql = "SELECT * from $table  ";
    } else {
        $sql = "SELECT * from $table ";
        $i = 0;
        foreach ($conditions as $key => $valor) {
            if ($i == 0) {
                $sql = $sql . " where $key = $valor";
            } else {
                $sql = $sql . " and $key = '$valor'";
            }
            $i++;
        }
    }
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();



    return $records;
}

/* $condition = [
    'id_tipo_contacto' => 1,
    'tipo_contacto_nombre' => 'Celular',
    ,



]; */


/* 
$records = selectall('tipo_documento', $condition);

foreach ($records as $rec) {
    echo $rec['descripcion'] . "<br>";
}
 */