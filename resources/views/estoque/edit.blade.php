<!-- resources/views/estoque/edit.blade.php -->
<x-app-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900 dark:text-gray-200">Editar Material no Estoque</h2>
        </div>

        @if ($errors->any())
            <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm border border-gray-300 dark:border-gray-600 rounded-lg p-6 bg-white dark:bg-gray-800 shadow-md">
            <form action="{{ route('estoque.update', $material->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="mt-4">
                    <label for="material" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-300">Material:</label>
                    <div class="mt-2">
                        <input type="text" name="material" id="material" value="{{ old('material', $material->material) }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:text-gray-200">
                    </div>
                </div>

                <div>
                    <label for="descricao" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-300">Descrição:</label>
                    <div class="mt-2">
                        <input type="text" name="descricao" id="descricao" value="{{ old('descricao', $material->descricao) }}" required class="block w-full rounded-md px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:text-gray-200">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="estabelecimento_id" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-300">Estabelecimento:</label>
                    <div class="mt-2">
                        <select name="estabelecimento_id" id="estabelecimento_id" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:text-gray-200">
                            <option value="">Selecione um Estabelecimento</option>
                            @foreach($estabelecimentos as $estabelecimento)
                                <option value="{{ $estabelecimento->id }}" {{ old('estabelecimento_id', $material->estabelecimento_id) == $estabelecimento->id ? 'selected' : '' }}>
                                    {{ $estabelecimento->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="tipo" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-300">Tipo (Ativo/Inativo):</label>
                    <div class="mt-2">
                        <select name="tipo" id="tipo" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:text-gray-200" required>
                            <option value="1" {{ old('tipo', $material->tipo) == 1 ? 'selected' : '' }}>Ativo</option>
                            <option value="0" {{ old('tipo', $material->tipo) == 0 ? 'selected' : '' }}>Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full py-2 px-4" style="background-color: #009ef7; color: white; border-radius: 0.375rem; hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                        Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
