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
            <div class="formulario-container">
                <form class="formulario-form" action="enviar_abogado.php" method="post">
                    <legend>Datos personales</legend>
                    <br>
                    <label class="formulario-label" for="name">Nombre</label>
                    <input class="formulario-input" type="text" name="name" id="name">
                    <br>
                    <label class="formulario-label" for="lastname">Apellido</label>
                    <input class="formulario-input" type="text" name="lastname" id="lastname">
                    <br>
                    <label class="formulario-label" for="fec_nac">Fecha de nacimiento</label>
                    <input class="formulario-input" type="date" name="fec_nac" id="fec_nac">
                    <br>
                    <label class="formulario-label" for="esp">Especialidad</label><!-- Aca va un select para abajo -->
                    <select class="formulario-select" name="esp" id="esp">
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
                    <label class="formulario-label" for="sex">Sexo</label>
                    <select class="formulario-select" name="sex" id="sex">
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
                    <label class="formulario-label" for="contacto">contacto</label>
                    <select class="formulario-select" name="tipoContacto" id="tipoContacto">
                        <?php
                        $query = "SELECT * FROM sistemajuridico.tipo_contacto;";
                        $resultado = $connect->query($query);
                        while ($reg = $resultado->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $reg['id_tipo_contacto']; ?>">
                                <?php echo $reg['tipo_contacto_nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <input class="formulario-input" type="text" name="contacto" id="">
                    <br>
                    <label class="formulario-label" for="Documento">Documento</label>
                    <select class="formulario-select" name="tipoDocumento" id="tipoDocumento">
                        <?php
                        $query = "SELECT * FROM sistemajuridico.documento;";
                        $resultado = $connect->query($query);
                        while ($reg = $resultado->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $reg['id_tipo_documento']; ?>"><?php echo $reg['descripcion']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <input class="formulario-input" type="text" name="Documento" id="Documento">
                    <button class="formulario-submit" type="submit">Guardar</button>
                </form>
            </div>
        </fieldset>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>