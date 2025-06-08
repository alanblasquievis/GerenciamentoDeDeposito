<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md">
        <h1 class="align=center text-2xl font-bold text-gray-800 dark:text-white mb-6">Entrada de Material</h1>

        <form action="{{ route('entradas_estoque.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="controle_de_estoque_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Material</label>
                <select name="controle_de_estoque_id" required
    class="block w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg
           focus:ring-blue-500 focus:border-blue-500
           dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
    <option value="">Selecione</option>
    @foreach($materiais as $material)
        <option value="{{ $material->id }}">{{ $material->descricao }}</option>
    @endforeach
</select>

            </div>

            <div class="mb-4">
                <label for="fornecedor_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fornecedor</label>
                <select name="fornecedor_id"
                        class="block w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        required>
                    <option value="">Selecione</option>
                    @foreach($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="deposito_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Depósito</label>
                <select name="deposito_id"
                        class="block w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    <option value="">Nenhum</option>
                    @foreach($depositos as $deposito)
                        <option value="{{ $deposito->id }}">Rua {{ $deposito->rua }} - Gôndola {{ $deposito->gondola }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <label for="quantidade" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Quantidade</label>
                    <input type="number" name="quantidade" min="1" required
                        class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                </div>

                <div class="flex-1">
                    <label for="data_entrada" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Data de Entrada</label>
                    <input type="date" name="data_entrada" required
                        class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                </div>
            </div>

            <div>
                <button type="submit" class="w-full py-2 px-2" style="background-color: #009ef7; color: white; border-radius: 0.200rem; hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">Registrar Entrada</button>
            </div>
        </form>
    </div>
</x-app-layout>
