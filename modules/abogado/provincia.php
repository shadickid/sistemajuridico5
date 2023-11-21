<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');

require_once(ROOT_PATH . 'config\database\functions\domicilio.php');
if (isset($_POST['id_pais'])) {
    $idPais = $_POST['id_pais'];
    $provincias = consultarProvincia($idPais); // Reemplaza esto con la función real que obtiene las provincias

    echo json_encode($provincias);
} else {
    echo json_encode([]);
}
?>