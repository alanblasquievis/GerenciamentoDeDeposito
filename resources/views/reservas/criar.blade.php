<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md">

        @if ($errors->any())
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white mb-6">Criar Reserva</h2>

        <form action="{{ route('reservas.store') }}" method="POST">
            @csrf

            <!-- Material -->
            <div class="mb-4">
                <label for="material_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Material</label>
                <select name="material_id" id="material_id" required
                    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="">Selecione um material</option>
                    @foreach ($materiais as $material)
                        <option value="{{ $material->id }}">
                            {{ $material->material }} - {{ $material->descricao }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Quantidade -->
            <div class="mb-4">
                <label for="quantidade" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" min="1" required
                    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    placeholder="Informe a quantidade a reservar">
            </div>

            <!-- Botão -->
            <div>
                <button type="submit" class="w-full py-2 px-2" style="background-color: #009ef7; color: white; border-radius: 0.200rem; hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                    Confirmar Reserva
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
