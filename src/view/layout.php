<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeuPeso</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">

<!-- Menu Superior -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <div class="text-lg font-semibold text-gray-800"><a href="/">
                <img width="300" src="/src/dist/Logo%20perda%20de%20peso.png" alt="Perda de peso">
            </a></div>
        <div class="flex items-center space-x-4">
            <a href="/" class="bg-gray-200 text-gray-800 py-2 px-4 rounded hover:bg-gray-300 transition duration-200">
                Home
            </a>
            <a href="/?acao=newPeso"
               class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
                Cadastrar Peso
            </a>
            <a href="/?acao=relatorios" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">Relatórios</a>
            <div class="text-gray-700">Usuário: <span
                        id="username"><b><?= $_SESSION['usuario_nome'] ?? 'Visitante' ?></b></span></div>
            <form method="POST" action="/?acao=logout" class="inline">
                <button type="submit" class="bg-red-600 text-white font-bold py-2 px-4 rounded hover:bg-red-500">
                    Sair
                </button>
            </form>
        </div>
    </div>
</header>

<!-- Conteúdo Dinâmico -->
<main class="max-w-7xl mx-auto px-4 py-6">
    <?php include $view; ?>
</main>

<!-- Rodapé Fixo -->
<footer class="bg-white shadow mt-6">
    <div class="max-w-7xl mx-auto px-4 py-4 text-center text-gray-600">
        &copy; <?= date('Y') ?> MeuPeso. Todos os direitos reservados.
    </div>
</footer>

<style>
    /* CSS para manter o rodapé fixo na parte inferior */
    footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }
</style>

</body>
</html>
