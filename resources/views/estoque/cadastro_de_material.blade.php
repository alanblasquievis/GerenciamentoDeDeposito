<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md">

        @if ($errors->any())
            <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white mb-6">Cadastrar Material no Estoque</h2>

        <form action="{{ route('estoque.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="material" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Material</label>
                <input type="text" name="material" id="material" value="{{ old('material') }}" required
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="descricao" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descrição</label>
                <input type="text" name="descricao" id="descricao" value="{{ old('descricao') }}" required
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="estabelecimento_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estabelecimento</label>
                <select name="estabelecimento_id" id="estabelecimento_id" required
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    <option value="">Selecione um Estabelecimento</option>
                    @foreach($estabelecimentos as $estabelecimento)
                        <option value="{{ $estabelecimento->id }}" {{ old('estabelecimento_id') == $estabelecimento->id ? 'selected' : '' }}>
                            {{ $estabelecimento->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="tipo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tipo (Ativo/Inativo)</label>
                <select name="tipo" id="tipo" required
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    <option value="1" {{ old('tipo') == 1 ? 'selected' : '' }}>Ativo</option>
                    <option value="0" {{ old('tipo') == 0 ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>

            <div>
                <button type="submit" class="w-full py-2 px-2" style="background-color: #009ef7; color: white; border-radius: 0.200rem; hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                    Cadastrar Material
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
