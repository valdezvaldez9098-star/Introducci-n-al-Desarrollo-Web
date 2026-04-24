<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Conversión</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // 1. Recibir el dato del formulario
                $celsius = $_POST['celsius'];
                
                // 2. Validar que no esté vacío y sea numérico
                if (is_numeric($celsius)) {
                    // 3. Aplicar la fórmula
                    $fahrenheit = $celsius * 9/5 + 32;
                    
                    // 4. Mostrar con el formato exacto
                    echo "<p class='resultado'>$celsius Celsius = $fahrenheit Fahrenheit</p>";
                } else {
                    echo "<p class='error'>Por favor, ingresa un número válido.</p>";
                }
            } else {
                echo "<p class='error'>Acceso no permitido.</p>";
            }
        ?>
        <br>
        <a href="index.html">← Nueva conversión</a>
    </div>
</body>
</html>