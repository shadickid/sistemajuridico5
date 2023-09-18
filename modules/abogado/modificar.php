<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/empleado.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$idPersonaFisica = $_GET['idPersonaFisica'];
$datosEmpleado = selectModificarDatosPersonalesEmpleado($idPersonaFisica);
$conditional = [
    'estado' => 1
];
$sexo = selectall('sexo');

foreach ($datosEmpleado as $regemp) :
?>
<div class="dashboard">
    <h1>Modificar datos del abogado</h1>
    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <fieldset>
                    <form class="formulario-form" action="procesarModificar.php" method="post">
                        <legend>Datos del abogado</legend>
                        <label class="formulario-label" for="nombre">Nombre:</label>
                        <input class="formulario-input" type="hidden" name="idPersonaFisica"
                            value="<?php echo $idPersonaFisica ?>" />
                        <input class="formulario-input" type="text" name="nombre"
                            value="<?php echo $regemp['persona_nombre'] ?>" autocomplete="off">
                        <label class="formulario-label" for="apellido">Apellido:</label>
                        <input class="formulario-input" type="text" name="apellido"
                            value="<?php echo $regemp['persona_apellido'] ?>" autocomplete="off">
                        <label class="formulario-label" for="fecnac">Fecha de nacimiento:</label>
                        <input class="formulario-input" type="date" name="fecnac"
                            value="<?php echo $regemp['persona_fec_nac'] ?>" autocomplete="off">
                        <label class="formulario-label" for="sex">Sexo</label>
                        <select name="sex" class="formulario-select">
                            <?php foreach ($sexo as $sex) : ?>
                            <option value="<?php echo $sex['id_sexo']; ?>"
                                <?php if ($sex['id_sexo'] == $regemp['id_sexo']) echo 'selected'; ?>>
                                <?php echo $sex['nombre']; ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <button class="formulario-submit" type="submit">Guardar</button>
                    </form>
                </fieldset>
            </div>
        </div>
    </section>
</div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');

?>