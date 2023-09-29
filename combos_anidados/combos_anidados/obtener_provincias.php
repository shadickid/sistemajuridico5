<?php


$idPais = $_GET['id_pais'];

// Select * from provincias where id_pais=$idPais
// $datos = mysql->query($sql);



if ($idPais == 1) {
	$listadoProvincias = [
		"1" => "Formosa",
		"2" => "Chaco",
		"3" => "Corrientes"
	];
} else if ($idPais == 2) {
	$listadoProvincias = [
		"1" => "Montevideo",
		"2" => "Durazno"
	];
}


// echo "HOLA";
// echo "<br><br>";
// highlight_string(var_export($listadoProvincias));

$resultado = "";

foreach ($listadoProvincias as $id => $nombre) {
	if ($resultado == "") {
		$resultado = $id . "&" . $nombre;
	} else {
		$resultado = $resultado . "|||" . $id . "&" . $nombre; 
	}
}

echo $resultado;

/*

while ($registro = $datos->fetch_assoc()) {
	if ($resultado == "") {
		$resultado = $registro['id'] . "&" . $registro['nombre'];
	} else {
		$resultado = $resultado . "|||" . $registro['id'] . "&" . $registro['nombre']; 
	}
}

echo $resultado;

*/

?>