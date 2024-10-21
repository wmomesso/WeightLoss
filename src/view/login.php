<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white rounded-lg shadow-md p-8 max-w-sm w-full">
    <h1 class="text-2xl font-bold text-center mb-6">Login</h1>
    <form method="post">
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="email" id="email" name="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-6">
            <label for="senha" class="block text-sm font-medium text-gray-700">Senha:</label>
            <input type="password" id="senha" name="senha" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-200">Entrar</button>
    </form>
    <p class="mt-4 text-sm text-center text-gray-600">
        Não tem uma conta? <a href="#" class="text-blue-500 hover:underline">Criar conta</a>
    </p>
</div>
</body>
</html>
