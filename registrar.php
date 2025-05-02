<?php
$conexion = new mysqli("localhost", "root", "", "comisaria");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$foto = $_FILES['foto']['name'];
$foto_tmp = $_FILES['foto']['tmp_name'];
$ruta_destino = "fotos/" . $foto;

move_uploaded_file($foto_tmp, $ruta_destino);

// Obtener datos del formulario
$nombres = $_POST['nombres'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$alias = $_POST['alias'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$rasgos_personales = $_POST['rasgos_personales'];
$tatuajes = $_POST['tatuajes'];
$estatura = $_POST['estatura'];
$peso = $_POST['peso'];
$familiares = $_POST['familiares'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$hora_ingreso = $_POST['hora_ingreso'];
$conducta = $_POST['conducta'];
$crimen = $_POST['crimen'];
$condena = $_POST['condena'];
$lugar_origen = $_POST['lugar_origen'];
$tiempo_en_prision = $_POST['tiempo_en_prision'];
$residencia = $_POST['residencia'];

// Insertar en la base de datos
$sql = "INSERT INTO delincuentes (foto, nombres, apellido_paterno, apellido_materno, alias, edad, sexo, rasgos_personales, tatuajes, estatura, peso, familiares, fecha_ingreso, hora_ingreso, conducta, crimen, condena, lugar_origen, tiempo_en_prision, residencia)
VALUES ('$ruta_destino', '$nombres', '$apellido_paterno', '$apellido_materno', '$alias', '$edad', '$sexo', '$rasgos_personales', '$tatuajes', '$estatura', '$peso', '$familiares', '$fecha_ingreso', '$hora_ingreso', '$conducta', '$crimen', '$condena', '$lugar_origen', '$tiempo_en_prision', '$residencia')";

if ($conexion->query($sql) === TRUE) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>