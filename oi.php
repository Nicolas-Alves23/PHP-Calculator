<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Calculadora PHP</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>

</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen p-4">

    <h2 class="text-3xl font-bold mb-6 text-gray-800">Calculadora Simples em PHP</h2>

    <form method="post" class="bg-white p-6 rounded shadow-md w-full max-w-sm">
        <input type="number" name="num4" step="any" placeholder="Número 1" required
            class="w-full mb-4 px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />

        <select name="operacao" required
            class="w-full mb-4 px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="+">Somar (+)</option>
            <option value="-">Subtrair (-)</option>
            <option value="*">Multiplicar (*)</option>
            <option value="/">Dividir (/)</option>
        </select>

        <input type="number" name="num2" step="any" placeholder="Número 2" required
            class="w-full mb-4 px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />

        <button type="submit"
            class="w-full bg-blue-600 text-white font-semibold py-2 rounded hover:bg-blue-700 transition">
            Calcular
        </button>
    </form>

    <?php
    // Verifica se o formulário foi enviado via método POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        // Converte o valor enviado no campo 'num4' para número decimal (float)
        $num4 = floatval($_POST["num4"]);
        
        // Converte o valor enviado no campo 'num2' para número decimal (float)
        $num2 = floatval($_POST["num2"]);
        
        // Pega a operação escolhida no formulário (string: "+", "-", "*", "/")
        $operacao = $_POST["operacao"];
        
        // Inicializa a variável que armazenará o resultado da operação
        $resultado = null;

        // Executa a operação matemática com base no valor de $operacao
        switch ($operacao) {
            case '+':
                $resultado = $num4 + $num2; // Soma
                break;
            case '-':
                $resultado = $num4 - $num2; // Subtração
                break;
            case '*':
                $resultado = $num4 * $num2; // Multiplicação
                break;
            case '/':
                // Antes de dividir, verifica se o segundo número é zero para evitar erro
                if ($num2 == 0) {
                    // Exibe mensagem de erro e para a execução do script
                    echo "<p style='color:red;'>Erro: Divisão por zero não é permitida.</p>";
                    exit;
                }
                $resultado = $num4 / $num2; // Divisão
                break;
            default:
                // Caso o valor da operação não seja válido, exibe erro e para o script
                echo "<p style='color:red;'>Operação inválida.</p>";
                exit;
        }

        // Exibe o resultado formatado na tela
        echo "<h3 class=\"mt-10 bg-white p-5 shadow-md font-mono rounded-sm\">Resultado: $num4 $operacao $num2 = $resultado</h3>";
    }
    ?>


<script src="https://cdn.tailwindcss.com"></script>

</body>
</html>
