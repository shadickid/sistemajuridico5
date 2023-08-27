<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/empleado.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_session = $_SESSION['id_usuario'];
$datos = datosPersonalesEmpleado($id_session);
$datosempleadocontacto = datosPersonalesEmpleadoContacto($id_session);
$datosempleadodocumento = datosPersonalesEmpleadoDocumento($id_session);
$conditional = [
    'estado' => 1
];
$records = selectall('tipo_contacto', $conditional);
$tipodoc = selectall('documento', $conditional);
$sexo = selectall('sexo');
?>
<div>
    <h1> Mi informacion</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <?php foreach ($datos as $reg): ?>
            <div class="formulario-container">
                <form class="formulario-form" method="POST" action="procesarFormularioInfo.php">
                    <label class="formulario-label" for="nombre">Nombres: </label>
                    <input class="formulario-input" type="text" name="nombre" id="nombre"
                        value="<?php echo $reg['persona_nombre'] ?>">
                    <label class="formulario-label" for="apellidos">Apellido: </label>
                    <input class="formulario-input" type="text" name="apellidos" id="apellidos"
                        value="<?php echo $reg['persona_apellido'] ?>">
                    <label class="formulario-label" for="fecnac">Fecha de nacimiento: </label>
                    <input class="formulario-input" type="date" name="fecnac" id="fecnac"
                        value="<?php echo $reg['persona_fec_nac'] ?>">
                    <label class="formulario-label" for="sex">Sexo</label>
                    <select class="formulario-select">
                        <option value="<?php echo $reg['id_sexo'] ?>"><?php echo $reg['nombre'] ?></option>
                        <?php foreach ($sexo as $sex): ?>
                            <option value="<?php echo $sex['id_sexo'] ?>"><?php echo $sex['nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <input class="formulario-submit" type="submit" value="Guardar cambios">
                </form>
            </div>
            <div class="modal-container">
                <!-- modal contacto -->
                <label for="contacto">Contacto</label>
                <!--Boton-->
                <div class="boton-modal">
                    <label for="btn-modal">
                        Editar
                    </label>
                </div>
                <!--Fin de Boton-->
                <!--Ventana Modal-->
                <input type="checkbox" id="btn-modal">
                <div class="container-modal">
                    <div class="content-modal">
                        <h2>Contacto</h2>
                        <form action="procesarAltacon.php" method="POST">
                            <select name="tipocontacto">
                                <?php foreach ($records as $reg2): ?>
                                    <option value="<?php echo $reg2['id_tipo_contacto'] ?>">
                                        <?php echo $reg2['tipo_contacto_nombre'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <label for="contacto">Agregar contacto</label>
                            <input type="text" class="formulario-input" name="valorcontacto">
                            <input type="hidden" name="id_persona" value="<?php echo $reg['id_persona'] ?>">
                            <input type="submit" class="formulario-submit" value="Guardar">
                        </form>
                        <table class="tablamodal">
                            <tr>
                                <th>Tipo contacto</th>
                                <th>Valor</th>
                                <th>Estado</th>
                            </tr>
                            <?php foreach ($datosempleadocontacto as $reg3): ?>
                                <tr>
                                    <td>
                                        <?php echo $reg3['tipo_contacto_nombre'] ?>
                                    </td>
                                    <td>
                                        <?php echo $reg3['contacto_detalle'] ?>
                                    </td>
                                    <td>
                                        <a href="procesarEliminarCon.php?id_contxper=<?php echo $reg3['id_contxper'] ?>">
                                            <button class="darDeBajaButton">
                                                <img src="<?php echo BASE_URL ?>assets\icons\delete-person-outlined-interface-button.png"
                                                    alt="Dar de Baja" width="14" height="14">
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                        <div class=" btn-cerrar">
                            <label for="btn-modal">Cerrar</label>
                        </div>
                    </div>
                    <label for="btn-modal" class="cerrar-modal"></label>
                </div>
                <!-- modal documento -->
                <label for="doc">Documento</label>
                <div class="boton-modal">
                    <label for="btn-modal2">
                        Editar
                    </label>
                </div>
                <!--Fin de Boton2-->
                <!--Ventana Modal2-->
                <input type="checkbox" id="btn-modal2">
                <div class="container-modal2">
                    <div class="content-modal">
                        <h2>Documento</h2>
                        <form action="procesarAltadoc.php" method="POST">
                            <select name="tipodocumento">
                                <?php foreach ($tipodoc as $reg4): ?>
                                    <option value="<?php echo $reg4['id_tipo_documento'] ?>">
                                        <?php echo $reg4['descripcion'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <label for="documento">Agregar documento</label>
                            <input type="text" class="formulario-input" name="valordocumento">
                            <input type="hidden" name="id_persona" value="<?php echo $reg['id_persona'] ?>">
                            <input type="submit" class="formulario-submit" value="Guardar">
                        </form>
                        <table class="tablamodal">
                            <tr>
                                <th>Tipo documento</th>
                                <th>Valor</th>
                                <th>Estado</th>
                            </tr>
                            <?php foreach ($datosempleadodocumento as $reg5): ?>
                                <tr>
                                    <td>
                                        <?php echo $reg5['descripcion'] ?>
                                    </td>
                                    <td>
                                        <?php echo $reg5['detalle'] ?>
                                    </td>
                                    <td>
                                        <a
                                            href="procesarEliminarDoc.php?id_docxperso=<?php echo $reg5['id_documentoxpersona'] ?>">
                                            <button class="darDeBajaButton">
                                                <img src="<?php echo BASE_URL ?>assets\icons\delete-person-outlined-interface-button.png"
                                                    alt="Dar de Baja" width="16" height="16">
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                        <div class="btn-cerrar">
                            <label for="btn-modal2">Cerrar</label>
                        </div>
                    </div>
                    <label for="btn-modal2" class="cerrar-modal"></label>
                </div>
                <!--Fin de Ventana Modal2-->
                <label for="domicilio">Domicilio</label>
                <div class="boton-modal">
                    <label for="btn-modal3">
                        Editar
                    </label>
                </div>
                <!--Ventana Modal2-->
                <input type="checkbox" id="btn-modal3">
                <div class="container-modal3">
                    <div class="content-modal">
                        <h2>Domicilio</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat illum voluptas </p>
                        <div class="btn-cerrar">
                            <label for="btn-modal3">Cerrar</label>
                        </div>
                    </div>
                    <label for="btn-modal3" class="cerrar-modal"></label>
                </div>
            <?php endforeach ?>
        </div>
    </section>

</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>