<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado: Conversión de Tiempo</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // 1. Recibir los segundos
                $segundos_totales = $_POST['segundos'];
                
                // 2. Validar que sea un número y no negativo
                if (is_numeric($segundos_totales) && $segundos_totales >= 0) {
                    
                    // 3. Convertir a entero (por si llega como decimal)
                    $segundos_totales = (int)$segundos_totales;
                    
                    // 4. Calcular horas (1 hora = 3600 segundos)
                    $horas = floor($segundos_totales / 3600);
                    
                    // 5. Resto después de quitar las horas
                    $resto = $segundos_totales % 3600;
                    
                    // 6. Calcular minutos (1 minuto = 60 segundos)
                    $minutos = floor($resto / 60);
                    
                    // 7. Resto después de quitar los minutos = segundos finales
                    $segundos = $resto % 60;
                    
                    // 8. Construir el mensaje con formato correcto
                    $mensaje = "$segundos_totales segundos corresponden a ";
                    
                    // Agregar horas (solo si es mayor a 0 o si todo es 0)
                    if ($horas > 0) {
                        $mensaje .= "{$horas}h, ";
                    } elseif ($segundos_totales == 0) {
                        $mensaje .= "0h, ";
                    }
                    
                    // Agregar minutos (solo si es necesario o para formato completo)
                    if ($minutos > 0 || ($horas == 0 && $segundos_totales == 0)) {
                        $mensaje .= "{$minutos}m y ";
                    } else if ($minutos == 0 && $horas > 0) {
                        $mensaje .= "0m y ";
                    }
                    
                    // Agregar segundos
                    if ($segundos > 0 || ($minutos == 0 && $horas == 0)) {
                        $mensaje .= "{$segundos}s";
                    } else if ($segundos == 0) {
                        $mensaje .= "0s";
                    }
                    
                    // Versión SIMPLIFICADA (la que pide el ejercicio):
                    $mensaje_simple = "$segundos_totales segundos corresponden a {$horas}h, {$minutos}m y {$segundos}s";
                    
                    // 9. Mostrar el resultado
                    echo "<div class='resultado exito'>";
                    echo "<p class='pregunta'>⏰ $segundos_totales segundos</p>";
                    echo "<p class='respuesta'>$mensaje_simple</p>";
                    echo "</div>";
                    
                } else {
                    echo "<div class='resultado error'>";
                    echo "<p>⚠️ Por favor, ingresa un número de segundos válido (0 o más).</p>";
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