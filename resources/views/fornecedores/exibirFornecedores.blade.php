<x-app-layout>
    <div class="space-y-6">
        <!-- Cabeçalho -->
        <div class="relative mb-6 flex items-center justify-center">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">🏢 Lista de Fornecedores</h1>

            <a href="{{ route('cadastro_de_fornecedor') }}" class="absolute right-0 top-0">
                <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    {{ __('Cadastrar Fornecedor') }}
                </button>
            </a>
        </div>

        <!-- Alertas -->
        @if(session('success'))
            <div class="p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" id="success-alert">
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
                        <th class="px-6 py-4">Nome</th>
                        <th class="px-10 py-4">CNPJ</th>
                        <th class="px-6 py-4">Endereço</th>
                        <th class="px-10 py-4">Telefone</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Excluir</th>
                        <th class="px-6 py-4">Editar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($fornecedores as $fornecedor)
                        <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-900">
                            <td class="px-6 py-4">{{ $fornecedor->nome }}</td>
                            <td class="px-10 py-4">{{ $fornecedor->cnpj }}</td>
                            <td class="px-6 py-4">{{ $fornecedor->endereco }}</td>
                            <td class="px-10 py-4">{{ $fornecedor->telefone }}</td>
                            <td class="px-6 py-4">{{ $fornecedor->email }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este fornecedor?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-gray-500 dark:text-gray-400">Nenhum fornecedor encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <script>
            setTimeout(() => {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = 0;
                    setTimeout(() => alert.remove(), 500);
                }
            }, 5000);
        </script>
    </div>
</x-app-layout>
