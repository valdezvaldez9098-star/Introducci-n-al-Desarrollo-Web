<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado: Par o Impar</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // 1. Recibir el número
                $numero = $_POST['numero'];
                
                // 2. Validar que sea un número entero
                if (is_numeric($numero) && strpos($numero, '.') === false) {
                    // 3. Calcular si es par o impar usando el operador módulo %
                    if ($numero % 2 == 0) {
                        $resultado = "Par";
                        $explicacion = "$numero dividido entre 2 tiene un resto de 0, por lo que es par.";
                    } else {
                        $resultado = "Impar";
                        $explicacion = "$numero dividido entre 2 tiene un resto de 1, por lo que es impar.";
                    }
                    
                    // 4. Mostrar el resultado con el formato requerido
                    echo "<p class='resultado'>$resultado</p>";
                    echo "<p class='explicacion'>$explicacion</p>";
                } else {
                    echo "<p class='error'>⚠️ Por favor, ingresa un número entero (sin decimales).</p>";
                }
            } else {
                echo "<p class='error'>Acceso no permitido. Usa el formulario.</p>";
            }
        ?>
        <br>
        <a href="index.html">← Analizar otro número</a>
    </div>
</body>
</html>