<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado: Verificación de voto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // 1. Recibir los datos del formulario
                $nombre = trim($_POST['nombre']);  // trim() elimina espacios extras
                $edad = $_POST['edad'];
                
                // 2. Validar que los campos no estén vacíos y edad sea numérica
                if (!empty($nombre) && is_numeric($edad)) {
                    
                    // 3. Verificar si puede votar (18 años o más)
                    if ($edad >= 18) {
                        $mensaje = "$nombre puede votar.";
                        $clase = "exito";
                    } else {
                        $mensaje = "$nombre no puede votar.";
                        $clase = "error";
                    }
                    
                    // 4. Mostrar el resultado
                    echo "<div class='resultado $clase'>";
                    echo "<p>$mensaje</p>";
                    echo "</div>";
                    
                } else {
                    echo "<p class='error'>⚠️ Por favor, completa todos los campos correctamente.</p>";
                }
            } else {
                echo "<p class='error'>Acceso no permitido. Usa el formulario.</p>";
            }
        ?>
        <br>
        <a href="index.html">← Verificar otra persona</a>
    </div>
</body>
</html>