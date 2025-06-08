<x-app-layout>
    <div class="space-y-6">

        <!-- Cabeçalho -->
        <div class="relative mb-6 flex items-center justify-center">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                📦 Estoque de Materiais
            </h1>

            <div class="absolute right-0 top-0 flex space-x-8 px-4 py-2">
                <a href="{{ route('materiais.transferir.form', ['material' => $materiais->first()?->id ?? 0]) }}"
                   class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 
                          focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 
                          dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 
                          dark:hover:border-gray-600 dark:focus:ring-gray-700 transition">
                    <i class="fas fa-exchange-alt mr-2"></i> Transferir
                </a>

                <a href="{{ route('cadastro_de_material') }}">
                    <button type="button"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 
                                   focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 
                                   dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 
                                   dark:hover:border-gray-600 dark:focus:ring-gray-700 transition">
                        {{ __('Cadastrar Material') }}
                    </button>
                </a>
            </div>
        </div>

        <!-- Alertas de sucesso -->
        @if(session('success'))
            <div id="success-alert"
                 class="p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        <!-- Alertas de erro -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Tabela de Materiais -->
        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="w-full text-sm text-center text-gray-700 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-4">Material</th>
                        <th class="px-6 py-4">Descrição</th>
                        <th class="px-6 py-4">Estabelecimento de utilização</th>
                        <th class="px-6 py-4">Em Estoque</th>
                        <th class="px-6 py-4">Depósito</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Excluir</th>
                        <th class="px-6 py-4">Editar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($materiais as $material)
                        <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-900">
                            <td class="px-6 py-4 font-medium">{{ $material->material }}</td>
                            <td class="px-6 py-4">{{ $material->descricao }}</td>
                            <td class="px-6 py-4">{{ $material->estabelecimento->nome }}</td>
                            <td class="px-6 py-4 font-semibold">{{ $material->em_estoque }}</td>
                            <td class="px-6 py-4">{{ $material->deposito->codigo ?? 'Não definido' }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full"
                                      style="background-color: {{ $material->tipo == 1 ? '#50cd98' : '#f1416c' }}; color: white;">
                                    {{ $material->tipo == 1 ? 'Ativo' : 'Inativo' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('estoque.destroy', $material->id) }}" method="POST"
                                      onsubmit="return confirm('Tem certeza que deseja excluir este material?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-[#f1416c]">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('estoque.edit', $material->id) }}" class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                Nenhum material encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
