<main class="flex-grow max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-4">Cadastrar Peso</h1>
    <form method="POST" action="/?acao=newPeso">
        <div class="mb-4">
            <label for="diaCiclo" class="block text-gray-700">Dia do Ciclo:</label>
            <input type="number" id="diaCiclo" name="diaCiclo" value="<?= $diaCiclo ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded" min="1" max="365">
        </div>
        <div class="mb-4">
            <label for="peso_atual" class="block text-gray-700">Peso Atual (kg):</label>
            <input type="number" id="peso_atual" name="peso_atual" required class="mt-1 block w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="altura" class="block text-gray-700">Altura (m):</label>
            <input type="text" id="altura" name="altura" required class="mt-1 block w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="visceralAtual" class="block text-gray-700">Gordura Visceral (%):</label>
            <input type="number" step="0.1" id="visceralAtual" name="visceralAtual" required class="mt-1 block w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="gorduraAtual" class="block text-gray-700">Gordura Corporal (%):</label>
            <input type="number" step="0.1" id="gorduraAtual" name="gorduraAtual" required class="mt-1 block w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="musculoAtual" class="block text-gray-700">Músculo (%):</label>
            <input type="number" step="0.1" id="musculoAtual" name="musculoAtual" required class="mt-1 block w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="obs" class="block text-gray-700">Observações:</label>
            <textarea id="obs" name="obs" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
            Cadastrar
        </button>
    </form>
</main>
<script>
    // Função para aplicar a máscara de altura
    document.getElementById('altura').addEventListener('input', function (e) {
        let value = e.target.value;

        // Remove tudo que não for número
        value = value.replace(/\D/g, '');

        if (value.length > 1) {
            // Formatar inserindo o ponto automaticamente após o primeiro dígito
            value = value.slice(0, 1) + '.' + value.slice(1, 3); // Mantém 1 dígito antes do ponto e até 2 depois
        }

        // Atualiza o valor do campo com a formatação correta
        e.target.value = value;
    });
</script>