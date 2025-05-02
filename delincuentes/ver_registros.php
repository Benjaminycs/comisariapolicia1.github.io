<?php
$conexion = new mysqli("localhost", "root", "", "comisaria");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "SELECT * FROM delincuentes ORDER BY fecha_registro DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Presuntos Delincuentes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .tarjeta {
            border: 1px solid #ccc;
            border-radius: 10px;
            margin: 15px;
            padding: 15px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.2);
        }
        .tarjeta img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        h2 {
            margin-top: 0;
        }
        .contenedor {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
    </style>
</head>
<body>
    <h1>Listado de Presuntos Delincuentes</h1>
    <div class="contenedor">
        <?php
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<div class='tarjeta'>";
                echo "<img src='" . $fila["foto"] . "' alt='Foto'>";
                echo "<h2>" . $fila["nombres"] . " " . $fila["apellido_paterno"] . " " . $fila["apellido_materno"] . "</h2>";
                echo "<p><strong>Alias:</strong> " . $fila["alias"] . "</p>";
                echo "<p><strong>Edad:</strong> " . $fila["edad"] . "</p>";
                echo "<p><strong>Sexo:</strong> " . $fila["sexo"] . "</p>";
                echo "<p><strong>Rasgos:</strong> " . $fila["rasgos_personales"] . "</p>";
                echo "<p><strong>Tatuajes:</strong> " . $fila["tatuajes"] . "</p>";
                echo "<p><strong>Estatura:</strong> " . $fila["estatura"] . " m</p>";
                echo "<p><strong>Peso:</strong> " . $fila["peso"] . " kg</p>";
                echo "<p><strong>Familiares:</strong> " . $fila["familiares"] . "</p>";
                echo "<p><strong>Ingreso:</strong> " . $fila["fecha_ingreso"] . " " . $fila["hora_ingreso"] . "</p>";
                echo "<p><strong>Conducta:</strong> " . $fila["conducta"] . "</p>";
                echo "<p><strong>Crimen:</strong> " . $fila["crimen"] . "</p>";
                echo "<p><strong>Condena:</strong> " . $fila["condena"] . "</p>";
                echo "<p><strong>Origen:</strong> " . $fila["lugar_origen"] . "</p>";
                echo "<p><strong>Tiempo en prisión:</strong> " . $fila["tiempo_en_prision"] . "</p>";
                echo "<p><strong>Residencia:</strong> " . $fila["residencia"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay registros.</p>";
        }
        $conexion->close();
        ?>
    </div>
</body>
</html>