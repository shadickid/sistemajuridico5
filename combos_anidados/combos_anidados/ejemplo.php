<?php



$listadoPaises = [
	"1" => "Argentina",
	"2" => "Uruguay"
];


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<script
	  src="https://code.jquery.com/jquery-3.7.1.min.js"
	  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
	  crossorigin="anonymous"></script>

	<script type="text/javascript">
		
		function cargarProvincias() {
			// limpiar select de provincias
			$('#selectProvincia')
			    .find('option')
			    .remove()
			    .end()
			    .append('<option value="0">--Seleccionar--</option>');

			// 1 - obtener el id de pais seleccionado
			idPais = $("#selectPaises").val();
			// let idPais = document.getElementById("selectPaises").value;
			// alert(idPais);

			if (idPais == 0) {
				return false;
			}


			// 2 - enviar el id de pais al archivo obtener_provincias.php
			$.ajax({
			  metod: "GET",
			  url: "obtener_provincias.php",
			  data: { id_pais: idPais }
			})
			  .done(function( data ) {
			  	// 3 - capturar los valores devueltos 
			  	listadoProvincias = data.split('|||');

				for (let i=0; i < listadoProvincias.length; i++) {
					provincia = listadoProvincias[i].split("&");

					// 4 - cargar las provincias en el select correspondiente

					$('#selectProvincia').append($('<option>', {
					    value: provincia[0],
					    text: provincia[1]
					}));
				}
			  });

		}

	</script>
</head>
<body>

	<form>
		Paises:
		<select name='selectPaises' id='selectPaises' onchange="cargarProvincias();">

			<option value="0">--Seleccionar--</option>

			<?php foreach ($listadoPaises as $id => $nombre): ?>

			    <option value="<?php echo $id ?>">
			    	<?php echo $nombre ?>
			    </option>

		    <?php endforeach ?>

		</select>

		<br><br>

		Provincias:
		<select name='selectProvincia' id='selectProvincia'">
			<option value="0">--Seleccionar--</option>
		</select>
	</form>

</body>
</html>