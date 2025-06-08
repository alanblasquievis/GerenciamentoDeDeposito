<x-app-layout>
    <div class="max-w-xl mx-auto space-y-6">
        <!-- Cabeçalho -->
        <div class="relative mb-6 flex items-center justify-center w-full max-w-xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">🏬 Lista de Depósitos</h1>

    <a href="{{ route('depositos.create') }}" class="absolute right-0 top-0">
        <button type="button"
            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100
            focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2
            dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700
            dark:hover:border-gray-600 dark:focus:ring-gray-700">
            {{ __('Cadastrar Depósito') }}
        </button>
    </a>
</div>

        <!-- Alertas -->
        @if(session('success'))
            <div class="p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Tabela -->
        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="w-full text-sm text-center text-gray-700 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-4">Rua</th>
                        <th class="px-6 py-4">Gôndola</th>
                        <th class="px-6 py-4">Código</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($depositos as $deposito)
                        <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-900">
                            <td class="px-6 py-4">{{ $deposito->rua }}</td>
                            <td class="px-6 py-4">{{ $deposito->gondola }}</td>
                            <td class="px-6 py-4 font-semibold">{{ $deposito->codigo }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-gray-500 dark:text-gray-400">Nenhum depósito cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
