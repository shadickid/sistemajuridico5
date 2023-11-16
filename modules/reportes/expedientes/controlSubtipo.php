<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'config\database\functions\expediente.php');


if (isset($_POST['function'])) {
    switch ($_POST['function']) {
        case 'leerSubTipo':
            leerSubTipo($_POST['idTipo']);
            break;
        case 1:
            echo "i es igual a 1";
            break;
    }
}

function leerSubTipo($idTipo)
{
    $subTipo = consultarSubTipo($idTipo);
    if (count($subTipo) > 0) {
        echo json_encode($subTipo);
    } else {
        echo 0;
    }
}