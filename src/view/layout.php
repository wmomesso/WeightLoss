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
        <div class="hidden sm:block text-lg font-semibold text-gray-800">
            <a href="/">
                <img width="300" src="/src/dist/Logo%20perda%20de%20peso.png" alt="Perda de peso">
            </a>
        </div>
        <div class="flex items-center md:space-x-4">
            <button class="md:hidden text-gray-800 hover:text-gray-600 focus:outline-none" id="menu-button">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>


            <nav class="hidden md:flex space-x-4">
                <a href="/" class="bg-gray-200 text-gray-800 py-2 px-4 rounded hover:bg-gray-300 transition duration-200">
                    Home
                </a>
                <a href="/?acao=newPeso" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
                    Novo
                </a>
                <a href="/?acao=relatorios" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">Relatórios</a>
                <div class="text-gray-700">Usuário: <span id="username"><b><?= $_SESSION['usuario_nome'] ?? 'Visitante' ?></b></span></div>
                <form method="POST" action="/?acao=logout" class="inline">
                    <button type="submit" class="bg-red-600 text-white font-bold py-2 px-4 rounded hover:bg-red-500">
                        Sair
                    </button>
                </form>
            </nav>
        </div>
    </div>

    <nav id="mobile-menu" class="hidden md:hidden absolute z-10 bg-white w-full shadow-md">
        <ul class="py-2">
            <li><a href="/" class="block px-4 py-2 hover:bg-gray-100">Home</a></li>
            <li><a href="/?acao=newPeso" class="block px-4 py-2 hover:bg-gray-100">Cadastrar Peso</a></li>
            <li><a href="/?acao=relatorios" class="block px-4 py-2 hover:bg-gray-100">Relatórios</a></li>
            <li><div class="px-4 py-2 text-gray-700">Usuário: <span id="username"><b><?= $_SESSION['usuario_nome'] ?? 'Visitante' ?></b></span></div></li>
            <li>
                <form method="POST" action="/?acao=logout" class="inline">
                    <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600 font-bold">
                        Sair
                    </button>
                </form>
            </li>
        </ul>
    </nav>
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

<script>
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    menuButton.addEventListener('click',
        () => {
            mobileMenu.classList.toggle('hidden');
        });
</script>

</body>
</html>
