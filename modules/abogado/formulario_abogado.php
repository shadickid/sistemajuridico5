<?php
include('../../config/database/connect.php');
require_once('../../config/path.php');

include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');

?>
<div>
    <h1>Registro de abogado</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <fieldset>
            <form action="enviar_abogado.php" method="post">
                <legend>Datos personales</legend>
                <br>
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name">
                <br>
                <label for="lastname">Apellido</label>
                <input type="text" name="lastname" id="lastname">
                <br>
                <label for="fec_nac">Fecha de nacimiento</label>
                <input type="date" name="fec_nac" id="fec_nac">
                <br>
                <label for="esp">Especialidad</label><!-- Aca va un select para abajo -->
                <select name="esp" id="esp">
                    <option>Derecho de Daños</option>
                    <option>Derecho de Familia</option>
                    <option>Derecho de la Empresa</option>
                    <option>Derecho Laboral</option>
                    <option>Derecho Notarial, Registral e Inmobiliario</option>
                    <option>Derecho Penal</option>
                    <option>Derecho Procesal Civil</option>
                    <option>Derecho Procesal Penal</option>
                    <option>Derecho Sucesorio</option>
                    <option>Derecho Tributario</option>
                </select>
                <br>
                <label for="sex">Sexo</label>
                <select name="sex" id="sex">
                    <?php
                    $query = "SELECT * FROM sistemajuridico.sexo;";
                    $resultado = $connect->query($query);
                    while ($reg = $resultado->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $reg['id_sexo']; ?>">
                        <?php echo $reg['nombre']; ?>
                    </option>
                    <?php } ?>
                </select>
                <br>
                <label for="contacto">contacto</label>
                <select name="tipoContacto" id="tipoContacto">
                    <?php
                    $query = "SELECT * FROM sistemajuridico.tipo_contacto;";
                    $resultado = $connect->query($query);
                    while ($reg = $resultado->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $reg['id_tipo_contacto']; ?>"><?php echo $reg['tipo_contacto_nombre']; ?>
                    </option>
                    <?php } ?>
                </select>
                <input type="text" name="contacto" id="">
                <br>
                <label for="Documento">Documento</label>
                <select name="tipoDocumento" id="tipoDocumento">
                    <?php
                    $query = "SELECT * FROM sistemajuridico.documento;";
                    $resultado = $connect->query($query);
                    while ($reg = $resultado->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $reg['id_tipo_documento']; ?>"><?php echo $reg['descripcion']; ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="Documento" id="Documento">
                <button type="submit">Guardar</button>
            </form>
        </fieldset>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>