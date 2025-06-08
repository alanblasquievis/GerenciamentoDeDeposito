<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md">

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white mb-6">
            Transferir Material de Depósito
        </h2>

        <form action="{{ route('materiais.transferir') }}" method="POST" onsubmit="return confirm('Deseja realmente transferir o material?')">
            @csrf

            <div class="mb-4">
                <label for="material_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Material</label>
                <select name="material_id" id="material_id"
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg
                           focus:ring-blue-500 focus:border-blue-500
                           dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    @foreach ($materiais as $material)
                        <option value="{{ $material->id }}">
                            {{ $material->material }} - {{ $material->descricao }} (Atual: {{ $material->deposito->codigo ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="novo_deposito_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Novo Depósito</label>
                <select name="novo_deposito_id" id="novo_deposito_id"
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg
                           focus:ring-blue-500 focus:border-blue-500
                           dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    @foreach ($depositos as $deposito)
                        <option value="{{ $deposito->id }}">{{ $deposito->codigo }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="w-full py-2 px-2" style="background-color: #009ef7; color: white; border-radius: 0.200rem; hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                    Transferir
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
