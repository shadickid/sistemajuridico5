<?php

$error_nombre = false;
$error_apellido = false;
$error_fecNac = false;
$error_sex = false;
$error_tipodoc = false;
$error_doc = false;
$validacion_ok = false;


$error_nombre_mensaje = "";
$error_apellido_mensaje = "";
$error_fecNac_mensaje = "";
$error_sex_mensaje = "";
$error_tipodoc_mensaje = "";
$error_doc_mensaje = "";




$error_razon_social = false;
$error_obra_social = false;
$error_nro_ingr_bruto = false;
$error_constitutivo = false;

$error_razon_social_mensaje = "";
$error_òbra_social_mensaje = "";
$error_nro_ingr_bruto_mensaje = "";
$error_constitutivo_mensaje = "";


function validarPersonafisica($nombre, $apellido, $fecNac, $sex, $tipodoc, $doc)
{
    if (empty($nombre)) {
        $error_nombre = true;
        $error_nombre_mensaje = 'Ingrese el nombre';
    } else {
        if (strlen($nombre) < 2) {
            $error_nombre = true;
            $error_nombre_mensaje = 'El nombre debe tener más de 2 caracteres.';
        }
    }


    if (empty($apellido)) {
        $error_apellido = true;
        $error_apellido_mensaje = 'Ingrese el apellido';
    } else {
        if (strlen($apellido) < 2) {
            $error_apellido = true;
            $error_apellido_mensaje = 'El apellido debe tener más de 2 caracteres.';
        }
    }

    if (empty($fecNac)) {
        $error_fecNac = true;
        $error_fecNac_mensaje = "Ingrese la fecha de nacimiento";
    }

    if ($sex == 0) {
        $error_sex = true;
        $error_sex_mensaje = "Seleccione alguna de las opciones por favor";
    }

    if ($tipodoc == 0) {
        $error_tipodoc = true;
        $error_tipodoc_mensaje = "Seleccione alguna de las opciones por favor";
    }

    if (empty($doc)) {
        $error_doc = true;
        $error_doc_mensaje = "Ingrese el documento";
    } else {
        if (!is_numeric($doc)) {
            $error_doc = true;
            $error_doc_mensaje = "Debe ingresar números";

        }
    }
}

function validarPersonaJuridica($razon_social, $obra_social, $nro_ingr_bruto, $constitutivo)
{

}