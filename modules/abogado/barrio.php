<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');

require_once(ROOT_PATH . 'config\database\functions\domicilio.php');
if (isset($_POST['idLocalidad'])) {
    $idLocalidad = $_POST['idLocalidad'];
    $barrios = consultarBarrios($idLocalidad); // Reemplaza esto con la función real que obtiene las provincias

    echo json_encode($barrios);
} else {
    echo json_encode([]);
}
?>