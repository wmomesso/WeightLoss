<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: 1; /* Define um z-index menor para o vídeo */
        }

        .content {
            position: fixed;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 100%;
            padding: 20px;
        }

        #myBtn {
            width: 200px;
            font-size: 18px;
            padding: 10px;
            border: none;
            background: #000;
            color: #fff;
            cursor: pointer;
        }

        #myBtn:hover {
            background: #ddd;
            color: black;
        }

        .login-container { /* Adiciona um contêiner para o formulário */
            position: relative;
            z-index: 2; /* Define um z-index maior para o formulário */
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<video autoplay muted loop id="myVideo">
    <source src="../../src/dist/background.mp4" type="video/mp4">
</video>

<div class="login-container">
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
</div>

<script>
    var video = document.getElementById("myVideo");
    var btn = document.getElementById("myBtn");

    function myFunction() {
        if (video.paused) {
            video.play();
            btn.innerHTML = "Pause";
        } else {
            video.pause();
            btn.innerHTML = "Play";
        }
    }
</script>
</body>
</html>