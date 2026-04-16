<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prácticas PHP - Ejercicios 21 al 26</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }

        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .menu {
            display: flex;
            flex-wrap: wrap;
            background: #f8f9fa;
            border-bottom: 3px solid #667eea;
            padding: 0 20px;
        }

        .menu button {
            background: none;
            border: none;
            padding: 15px 25px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            color: #333;
            font-weight: 500;
        }

        .menu button:hover {
            background: #e9ecef;
            color: #667eea;
        }

        .menu button.active {
            background: #667eea;
            color: white;
            border-radius: 5px 5px 0 0;
        }

        .content {
            padding: 30px;
            min-height: 500px;
        }

        .practice {
            display: none;
            animation: fadeIn 0.5s;
        }

        .practice.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
        }

        button[type="submit"] {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: transform 0.3s;
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            border-radius: 5px;
        }

        .result h3 {
            color: #667eea;
            margin-bottom: 10px;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table tr:nth-child(even) {
            background: #f8f9fa;
        }

        .error {
            color: #dc3545;
            margin-top: 10px;
        }

        .success {
            color: #28a745;
        }

        @media (max-width: 768px) {
            .menu button {
                padding: 10px 15px;
                font-size: 14px;
            }
            
            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>📚 Prácticas PHP</h1>
            <p>Ejercicios 21 al 26 - Programación del lado del servidor</p>
        </header>

        <div class="menu">
            <button onclick="showPractice(21)" class="active">Práctica 21</button>
            <button onclick="showPractice(22)">Práctica 22</button>
            <button onclick="showPractice(23)">Práctica 23</button>
            <button onclick="showPractice(24)">Práctica 24</button>
            <button onclick="showPractice(25)">Práctica 25</button>
            <button onclick="showPractice(26)">Práctica 26</button>
        </div>

        <div class="content">
            <!-- Práctica 21: Operaciones aritméticas -->
            <div id="practice21" class="practice active">
                <h2>🔢 Práctica 21: Operaciones Aritméticas</h2>
                <form method="POST">
                    <div class="form-group">
                        <label>Número 1:</label>
                        <input type="number" name="num1_21" step="any" required>
                    </div>
                    <div class="form-group">
                        <label>Número 2:</label>
                        <input type="number" name="num2_21" step="any" required>
                    </div>
                    <div class="form-group">
                        <label>Operación:</label>
                        <select name="operacion_21" required>
                            <option value="suma">Suma (+)</option>
                            <option value="resta">Resta (-)</option>
                            <option value="multiplicacion">Multiplicación (×)</option>
                            <option value="division">División (÷)</option>
                        </select>
                    </div>
                    <button type="submit" name="calcular_21">Calcular</button>
                </form>

                <?php
                if (isset($_POST['calcular_21'])) {
                    $num1 = $_POST['num1_21'];
                    $num2 = $_POST['num2_21'];
                    $operacion = $_POST['operacion_21'];
                    $resultado = "";
                    
                    switch ($operacion) {
                        case 'suma':
                            $resultado = $num1 + $num2;
                            echo "<div class='result'><h3>Resultado:</h3><p>$num1 + $num2 = $resultado</p></div>";
                            break;
                        case 'resta':
                            $resultado = $num1 - $num2;
                            echo "<div class='result'><h3>Resultado:</h3><p>$num1 - $num2 = $resultado</p></div>";
                            break;
                        case 'multiplicacion':
                            $resultado = $num1 * $num2;
                            echo "<div class='result'><h3>Resultado:</h3><p>$num1 × $num2 = $resultado</p></div>";
                            break;
                        case 'division':
                            if ($num2 != 0) {
                                $resultado = $num1 / $num2;
                                echo "<div class='result'><h3>Resultado:</h3><p>$num1 ÷ $num2 = $resultado</p></div>";
                            } else {
                                echo "<div class='result error'>Error: No se puede dividir entre cero</div>";
                            }
                            break;
                    }
                }
                ?>
            </div>

            <!-- Práctica 22: Fórmula General -->
            <div id="practice22" class="practice">
                <h2>📐 Práctica 22: Fórmula General</h2>
                <form method="POST">
                    <div class="form-group">
                        <label>Valor de a:</label>
                        <input type="number" name="a" step="any" required>
                    </div>
                    <div class="form-group">
                        <label>Valor de b:</label>
                        <input type="number" name="b" step="any" required>
                    </div>
                    <div class="form-group">
                        <label>Valor de c:</label>
                        <input type="number" name="c" step="any" required>
                    </div>
                    <button type="submit" name="calcular_22">Calcular x₁ y x₂</button>
                </form>

                <?php
                if (isset($_POST['calcular_22'])) {
                    $a = $_POST['a'];
                    $b = $_POST['b'];
                    $c = $_POST['c'];
                    
                    $discriminante = ($b * $b) - (4 * $a * $c);
                    
                    if ($discriminante > 0) {
                        $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
                        $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
                        echo "<div class='result'>
                                <h3>Resultados:</h3>
                                <p>x₁ = " . round($x1, 4) . "</p>
                                <p>x₂ = " . round($x2, 4) . "</p>
                              </div>";
                    } elseif ($discriminante == 0) {
                        $x = -$b / (2 * $a);
                        echo "<div class='result'>
                                <h3>Resultado:</h3>
                                <p>x = " . round($x, 4) . " (raíz única)</p>
                              </div>";
                    } else {
                        echo "<div class='result error'>No tiene solución real (discriminante negativo)</div>";
                    }
                }
                ?>
            </div>

            <!-- Práctica 23: IMC -->
            <div id="practice23" class="practice">
                <h2>⚖️ Práctica 23: Índice de Masa Corporal (IMC)</h2>
                <form method="POST">
                    <div class="form-group">
                        <label>Peso (kg):</label>
                        <input type="number" name="peso" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label>Altura (m):</label>
                        <input type="number" name="altura" step="0.01" required>
                    </div>
                    <button type="submit" name="calcular_23">Calcular IMC</button>
                </form>

                <?php
                if (isset($_POST['calcular_23'])) {
                    $peso = $_POST['peso'];
                    $altura = $_POST['altura'];
                    $imc = $peso / ($altura * $altura);
                    
                    if ($imc < 18.5) {
                        $grado = "Bajo peso";
                        $color = "#ffc107";
                    } elseif ($imc < 25) {
                        $grado = "Peso normal";
                        $color = "#28a745";
                    } elseif ($imc < 30) {
                        $grado = "Sobrepeso";
                        $color = "#ff9800";
                    } elseif ($imc < 35) {
                        $grado = "Obesidad I";
                        $color = "#f44336";
                    } elseif ($imc < 40) {
                        $grado = "Obesidad II";
                        $color = "#d32f2f";
                    } else {
                        $grado = "Obesidad III (Mórbida)";
                        $color = "#c62828";
                    }
                    
                    echo "<div class='result'>
                            <h3>Resultado del IMC:</h3>
                            <p><strong>IMC:</strong> " . round($imc, 2) . "</p>
                            <p style='color: $color;'><strong>Grado:</strong> $grado</p>
                          </div>";
                }
                ?>
            </div>

            <!-- Práctica 24: Fechas -->
            <div id="practice24" class="practice">
                <h2>📅 Práctica 24: Formato de Fecha</h2>
                <?php
                if (isset($_POST['mostrar_fecha'])) {
                    $dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
                    $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", 
                                   "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
                    
                    $diaSemana = $dias[date('w')];
                    $dia = date('j');
                    $mes = $meses[date('n') - 1];
                    $anio = date('Y');
                    
                    echo "<div class='result'>
                            <h3>Fecha Actual:</h3>
                            <p>Hoy es $diaSemana $dia de $mes del año $anio</p>
                          </div>";
                }
                ?>
                <form method="POST">
                    <button type="submit" name="mostrar_fecha">Mostrar Fecha Actual</button>
                </form>
            </div>

            <!-- Práctica 25: Tablas de multiplicar 1-10 -->
            <div id="practice25" class="practice">
                <h2>📊 Práctica 25: Tablas de Multiplicar (1 al 10)</h2>
                <form method="POST">
                    <button type="submit" name="generar_25">Generar Tablas</button>
                </form>

                <?php
                if (isset($_POST['generar_25'])) {
                    echo "<div class='table-container'>";
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<div style='margin-bottom: 20px;'>
                                <h3>Tabla del $i</h3>
                                <table>";
                        for ($j = 1; $j <= 10; $j++) {
                            $resultado = $i * $j;
                            echo "<tr><td>$i × $j = $resultado</td></tr>";
                        }
                        echo "</table></div>";
                    }
                    echo "</div>";
                }
                ?>
            </div>

            <!-- Práctica 26: Tablas dinámicas -->
            <div id="practice26" class="practice">
                <h2>🎯 Práctica 26: Tablas de Multiplicar Dinámicas</h2>
                <form method="POST">
                    <div class="form-group">
                        <label>Número positivo y entero:</label>
                        <input type="number" name="numero" min="1" required>
                    </div>
                    <button type="submit" name="generar_26">Generar Tablas</button>
                </form>

                <?php
                if (isset($_POST['generar_26'])) {
                    $numero = $_POST['numero'];
                    if ($numero > 0 && is_numeric($numero)) {
                        echo "<div class='table-container'>";
                        for ($i = 1; $i <= $numero; $i++) {
                            echo "<div style='margin-bottom: 20px;'>
                                    <h3>Tabla del $i</h3>
                                    <table>";
                            for ($j = 1; $j <= 10; $j++) {
                                $resultado = $i * $j;
                                echo "<tr><td>$i × $j = $resultado</td></tr>";
                            }
                            echo "</table></div>";
                        }
                        echo "</div>";
                    } else {
                        echo "<div class='result error'>Por favor, ingrese un número positivo entero</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        function showPractice(num) {
            // Ocultar todas las prácticas
            for (let i = 21; i <= 26; i++) {
                document.getElementById(`practice${i}`).classList.remove('active');
            }
            // Mostrar la práctica seleccionada
            document.getElementById(`practice${num}`).classList.add('active');
            
            // Actualizar botones activos
            const buttons = document.querySelectorAll('.menu button');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
        }
    </script>
</body>
</html>