<?php

include_once "Api.php";
include_once "Clases.php";

try {
    session_start();
    $api = new ApiUsuario();

    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $contra = $_POST["contra"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $rfc = $_POST["rfc"];
    $usertype = $_POST["usertype"];

    $foto = fopen($_FILES['foto']['tmp_name'], 'rb');
    $tipoFoto = $_FILES['foto']['type'];

    $datos = new Usuario(0, $nombre, $telefono, $correo, $contra, $fecha_nacimiento, $rfc, $foto, $usertype);
    $msj = $api->Agregar($datos);
    echo json_encode($msj);
} catch (PDOException $e) {
    $msj = "Error en servidor: " . $e->getMessage();
    echo json_encode($msj);
}
