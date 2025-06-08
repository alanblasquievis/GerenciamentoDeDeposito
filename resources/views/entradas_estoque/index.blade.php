<!-- resources/views/entradas_estoque/index.blade.php -->
<x-app-layout>
    <div class="space-y-6">

        <!-- Cabeçalho e botão -->
        <div class="relative mb-6 flex items-center justify-center">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">📥 Entradas de Estoque</h1>

            <a href="{{ route('entradas_estoque.create') }}" class="absolute right-0 top-0">
                <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Nova Entrada
                </button>
            </a>
        </div>
        <!-- Alerta de sucesso -->
        @if(session('success'))
            <div class="p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" id="success-alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabela -->
        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="w-full text-sm text-center text-gray-700 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-4">Material</th>
                        <th class="px-6 py-4">Fornecedor</th>
                        <th class="px-6 py-4">Depósito</th>
                        <th class="px-6 py-4">
                            <a href="{{ route('entradas_estoque.index', ['sort' => 'quantidade', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}" class="hover:underline">
                                Quantidade
                            </a>
                        </th>
                        <th class="px-6 py-4">
                            <a href="{{ route('entradas_estoque.index', ['sort' => 'data_entrada', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}" class="hover:underline">
                                Data de Entrada
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($entradas as $entrada)
                        <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-900">
                            <td class="px-6 py-4 font-medium">{{ $entrada->material->descricao ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $entrada->fornecedor->nome }}</td>
                            <td class="px-6 py-4">
                                @if($entrada->deposito)
                                    Rua {{ $entrada->deposito->rua }} - Gôndola {{ $entrada->deposito->gondola }}
                                @else
                                    Não informado
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $entrada->quantidade }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($entrada->data_entrada)->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                Nenhuma entrada registrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="mt-4">
            {{ $entradas->appends(request()->query())->links() }}
        </div>

    </div>
</x-app-layout>
