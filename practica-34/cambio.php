<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado: Cambio de Divisas</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // 1. Recibir los datos del formulario
                $cantidad = $_POST['cantidad'];
                $tasa = $_POST['tasa'];
                
                // 2. Validar que sean números y no estén vacíos
                if (is_numeric($cantidad) && is_numeric($tasa)) {
                    
                    // 3. Realizar la conversión (multiplicación)
                    $resultado = $cantidad * $tasa;
                    
                    // 4. Formatear con 2 decimales
                    $resultado_formateado = number_format($resultado, 2);
                    $cantidad_formateada = number_format($cantidad, 2);
                    $tasa_formateada = number_format($tasa, 4); // opcional: tasa con 4 decimales
                    
                    // 5. Mostrar el resultado
                    echo "<div class='resultado exito'>";
                    echo "<p class='operacion'>$cantidad_formateada × $tasa_formateada = ?</p>";
                    echo "<p class='respuesta'>El resultado es <strong>$resultado_formateado</strong></p>";
                    echo "</div>";
                    
                } else {
                    echo "<div class='resultado error'>";
                    echo "<p>⚠️ Por favor, ingresa valores numéricos válidos.</p>";
                    echo "</div>";
                }
            } else {
                echo "<div class='resultado error'>";
                echo "<p>Acceso no permitido. Usa el formulario.</p>";
                echo "</div>";
            }
        ?>
        <br>
        <a href="index.html">← Nueva conversión</a>
    </div>
</body>
</html>