<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado: Calificación</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // 1. Recibir la puntuación
                $puntuacion = $_POST['puntuacion'];
                
                // 2. Validar que sea numérica y esté en rango 0-100
                if (is_numeric($puntuacion) && $puntuacion >= 0 && $puntuacion <= 100) {
                    
                    // 3. Estructura if-elseif-else para determinar la calificación
                    if ($puntuacion >= 90) {
                        $calificacion = "A";
                        $explicacion = "$puntuacion es mayor o igual a 90, por lo tanto, la calificación es A";
                    } elseif ($puntuacion >= 80) {
                        $calificacion = "B";
                        $explicacion = "$puntuacion está entre 80 y 89, por lo tanto, la calificación es B";
                    } elseif ($puntuacion >= 70) {
                        $calificacion = "C";
                        $explicacion = "$puntuacion está entre 70 y 79, por lo tanto, la calificación es C";
                    } elseif ($puntuacion >= 60) {
                        $calificacion = "D";
                        $explicacion = "$puntuacion está entre 60 y 69, por lo tanto, la calificación es D";
                    } else {
                        $calificacion = "F";
                        $explicacion = "$puntuacion es menor a 60, por lo tanto, la calificación es F";
                    }
                    
                    // 4. Mostrar el resultado
                    echo "<div class='resultado'>";
                    echo "<p class='calificacion'>Calificación: <strong>$calificacion</strong></p>";
                    echo "<p class='explicacion'>$explicacion</p>";
                    echo "</div>";
                    
                } else {
                    echo "<p class='error'>⚠️ Por favor, ingresa una puntuación válida entre 0 y 100.</p>";
                }
            } else {
                echo "<p class='error'>Acceso no permitido. Usa el formulario.</p>";
            }
        ?>
        <br>
        <a href="index.html">← Calcular otra calificación</a>
    </div>
</body>
</html>