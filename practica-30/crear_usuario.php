<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado: Usuario creado</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // 1. Recibir los datos del formulario
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                
                // 2. Validar que no estén vacíos
                if (!empty($nombre) && !empty($apellido)) {
                    
                    // 3. Crear nombre de usuario (unir + minúsculas)
                    $nombre_completo = $nombre . $apellido;  // "JuanLopez"
                    $nombre_usuario = strtolower($nombre_completo);  // "juanlopez"
                    
                    // 4. Obtener iniciales (primera letra de cada nombre en MAYÚSCULA)
                    $inicial_nombre = strtoupper($nombre[0]);  // "J"
                    $inicial_apellido = strtoupper($apellido[0]);  // "L"
                    $iniciales = $inicial_nombre . $inicial_apellido;  // "JL"
                    
                    // 5. Mostrar el resultado con el formato exacto
                    echo "<div class='resultado'>";
                    echo "<p><strong>Nombre de usuario:</strong> $nombre_usuario</p>";
                    echo "<p><strong>Iniciales:</strong> $iniciales</p>";
                    echo "</div>";
                    
                } else {
                    echo "<p class='error'>⚠️ Por favor, completa ambos campos.</p>";
                }
            } else {
                echo "<p class='error'>Acceso no permitido. Usa el formulario.</p>";
            }
        ?>
        <br>
        <a href="index.html">← Crear otro usuario</a>
    </div>
</body>
</html>