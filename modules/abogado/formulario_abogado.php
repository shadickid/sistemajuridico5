<?php
include('../../config/database/connect.php');
require_once('../../config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$conditional = [
    'estado_logico' => 1
];
$conditional2 = [
    'estado' => 1
];
$especializacion = selectall('especializacion', $conditional);
$sexo = selectall('sexo');
$metodocontacto = selectall('tipo_contacto', $conditional2);
$tipodocumento = selectall('documento', $conditional2)
    ?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\abogado\listado.php">Abogado</a>
    <span>/</span>
    <span>Registro de Abogado</span>
</div>
<div class="dashboard">
    <h1>Registro de abogado</h1>
    <a href="#" onclick="window.history.go(-1); return false;" class="volver-atras-button">Volver Atrás</a>

    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <fieldset>
                    <form class="formulario-form" action="enviar_abogado.php" method="post">
                        <input type="hidden" value="1" name="tipopersona">
                        <legend>Datos personales</legend>
                        <br>
                        <label class=" formulario-label" for="name">Nombre</label>
                        <input class="formulario-input" type="text" name="name" id="name" autocomplete="off">
                        <br>
                        <label class="formulario-label" for="lastname">Apellido</label>
                        <input class="formulario-input" type="text" name="lastname" id="lastname" autocomplete="off">
                        <br>
                        <label class="formulario-label" for="fec_nac">Fecha de nacimiento</label>
                        <input class="formulario-input" type="date" name="fec_nac" id="fec_nac" autocomplete="off">
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
                        <input class="formulario-input" type="text" name="contacto" id="" autocomplete="off">
                        <br>
                        <label class="formulario-label" for="tipoDocumento">Documento</label>
                        <select class="formulario-select" name="tipoDocumento" id="tipoDocumento">
                            <option>Escoga su documento</option>
                            <?php foreach ($tipodocumento as $registrodocumento): ?>
                                <option value="<?php echo $registrodocumento['id_tipo_documento'] ?>">
                                    <?php echo $registrodocumento['descripcion'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <input class="formulario-input" type="text" name="Documento" id="Documento" autocomplete="off">
                        <button class="formulario-submit" type="submit">Guardar</button>
                    </form>
                </fieldset>
            </div>
        </div>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>