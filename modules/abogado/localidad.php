<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');

require_once(ROOT_PATH . 'config\database\functions\domicilio.php');
if (isset($_POST['idProvincia'])) {
    $idProvincia = $_POST['idProvincia'];
    $localidades = consultarLocalidades($idProvincia); // Reemplaza esto con la función real que obtiene las provincias

    echo json_encode($localidades);
} else {
    echo json_encode([]);
}
?>