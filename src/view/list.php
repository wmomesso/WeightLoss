<main class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Dados de Peso Cadastrados</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full table-fixed bg-white border border-gray-300">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-300 text-left">Dia do Ciclo</th>
                <th class="py-2 px-4 border-b border-gray-300 text-left">Data</th>
                <th class="py-2 px-4 border-b border-gray-300 text-left">Peso Atual</th>
                <th class="py-2 px-4 border-b border-gray-300 text-left">IMC Atual</th>
                <th class="py-2 px-4 border-b border-gray-300 text-left">Status</th>
                <th class="py-2 px-4 border-b border-gray-300 text-left">Observações</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($pesos)): ?>
                <?php foreach ($pesos as $peso): ?>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300"><?= $peso->getDiaCiclo() ?></td>
                        <td class="py-2 px-4 border-b border-gray-300"><?= $peso->getData() ?></td>
                        <td class="py-2 px-4 border-b border-gray-300"><?= $peso->getPesoAtual() ?> kg</td>
                        <td class="py-2 px-4 border-b border-gray-300"><?= $peso->getImcAtual() ?></td>
                        <td class="py-2 px-4 border-b border-gray-300"><?= $peso->getStatus() ?></td>
                        <td class="py-2 px-4 border-b border-gray-300"><?= $peso->getObs() ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="py-2 px-4 border-b border-gray-300 text-center">Nenhum peso cadastrado.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>