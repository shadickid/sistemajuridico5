<?php
require_once('../connect.php');

function selectall($table, $conditions = [])
{


    global $connect;
    if (empty($conditions)) {
        $sql = "select * from $table  ";



    } else {
        $sql = "select * from $table ";
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

$condition = [
    'id_tipo_documento' => 3,
    'descripcion' => 'libreta'



];



$records = selectall('tipo_documento', $condition);

foreach ($records as $rec) {
    echo $rec['descripcion'] . "<br>";
}


?>