<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado: Verificación de Anagramas</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // 1. Recibir las palabras
                $palabra1 = trim($_POST['palabra1']);
                $palabra2 = trim($_POST['palabra2']);
                
                // 2. Validar que no estén vacías
                if (!empty($palabra1) && !empty($palabra2)) {
                    
                    // 3. Convertir a minúsculas (por si acaso)
                    $palabra1 = strtolower($palabra1);
                    $palabra2 = strtolower($palabra2);
                    
                    // 4. MÉTODO 1: Convertir a array, ordenar, comparar
                    // Convertir string a array de caracteres
                    $arr1 = str_split($palabra1);
                    $arr2 = str_split($palabra2);
                    
                    // Ordenar los arrays alfabéticamente
                    sort($arr1);
                    sort($arr2);
                    
                    // Convertir arrays ordenados nuevamente a strings
                    $ordenada1 = implode('', $arr1);
                    $ordenada2 = implode('', $arr2);
                    
                    // 5. Comparar si son iguales
                    if ($ordenada1 == $ordenada2) {
                        $resultado = "Sí";
                        $clase = "exito";
                        $explicacion = "Las palabras contienen exactamente las mismas letras: " . 
                                       implode(', ', array_unique($arr1));
                    } else {
                        $resultado = "No";
                        $clase = "error";
                        $explicacion = "Las palabras NO contienen las mismas letras o no tienen la misma longitud.";
                    }
                    
                    // 6. Mostrar el resultado
                    echo "<div class='resultado $clase'>";
                    echo "<p class='pregunta'>'$palabra1' ↔ '$palabra2'</p>";
                    echo "<p class='respuesta'>Resultado: <strong>$resultado</strong></p>";
                    echo "<p class='explicacion'>$explicacion</p>";
                    echo "</div>";
                    
                } else {
                    echo "<p class='error'>⚠️ Por favor, completa ambas palabras.</p>";
                }
            } else {
                echo "<p class='error'>Acceso no permitido. Usa el formulario.</p>";
            }
        ?>
        <br>
        <a href="index.html">← Verificar otras palabras</a>
    </div>
</body>
</html>