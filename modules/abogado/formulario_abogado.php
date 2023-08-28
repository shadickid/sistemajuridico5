<?php
include('../../config/database/connect.php');
require_once('../../config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$conditional = [

];
$especializacion = selectall('especializacion', $conditional);
$sexo = selectall('sexo');
$metodocontacto = selectall('tipo_contacto', $conditional)
    ?>
<div>
    <h1>Registro de abogado</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <div class="formulario-container">
            <fieldset>
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
                    <label class="formulario-label" for="esp">Especialidad</label>
                    <select class="formulario-select" name="esp" id="esp">
                        <option>Escoga la especializacion</option>
                        <?php foreach ($especializacion as $registroesp): ?>
                            <option value="<?php echo $registroesp['id_especializacion'] ?>">
                                <?php echo $registroesp['descripcion'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <br>
                    <label class="formulario-label" for="sex">Sexo</label>
                    <select class="formulario-select" name="sex" id="sex">
                        <option>Escoga el sexo</option>
                        <?php foreach ($sexo as $registrosexo): ?>
                            <option value="<?php echo $registrosexo['id_sexo'] ?>"><?php echo $registrosexo['nombre'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <br>
                    <label class="formulario-label" for="contacto">contacto</label>
                    <select class="formulario-select" name="tipoContacto" id="tipoContacto">
                        <option>Escoga su metodo de contacto</option>
                        <?php foreach ($metodocontacto as $registrocontacto): ?>
                            <option value="<?php echo $registrocontacto['id_tipo_contacto'] ?>">
                                <?php echo $registrocontacto['tipo_contacto_nombre'] ?></option>
                            </option>

                        <?php endforeach ?>
                    </select>
                    <input class="formulario-input" type="text" name="contacto" id="">
                    <br>
                    <label class="formulario-label" for="Documento">Documento</label>
                    <select class="formulario-select" name="tipoDocumento" id="tipoDocumento">
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