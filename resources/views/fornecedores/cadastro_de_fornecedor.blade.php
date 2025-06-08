<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md">

        @if ($errors->any())
            <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white mb-6">Adicionar Fornecedor</h2>

        <form action="{{ route('fornecedores.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nome</label>
                <input type="text" name="nome" id="nome" required
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="cnpj" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" required
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="endereco" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Endereço</label>
                <input type="text" name="endereco" id="endereco" required
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="telefone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Telefone</label>
                <input type="text" name="telefone" id="telefone" required
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
            </div>

            <div>
                <button type="submit" class="w-full py-2 px-4 rounded-lg" style="background-color: #009ef7; color: white; border-radius: 0.375rem; hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
