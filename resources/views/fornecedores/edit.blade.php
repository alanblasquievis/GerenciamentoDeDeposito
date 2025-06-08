<x-app-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900 dark:text-gray-200">Editar Fornecedor</h2>
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
            <form action="{{ route('fornecedores.update', $fornecedor->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nome" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-300">Nome:</label>
                    <div class="mt-2">
                        <input type="text" name="nome" id="nome" value="{{ old('nome', $fornecedor->nome) }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:text-gray-200">
                    </div>
                </div>

                <div>
                    <label for="cnpj" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-300">CNPJ:</label>
                    <div class="mt-2">
                        <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj', $fornecedor->cnpj) }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:text-gray-200">
                    </div>
                </div>

                <div>
                    <label for="endereco" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-300">Endereço:</label>
                    <div class="mt-2">
                        <input type="text" name="endereco" id="endereco" value="{{ old('endereco', $fornecedor->endereco) }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:text-gray-200">
                    </div>
                </div>

                <div>
                    <label for="telefone" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-300">Telefone:</label>
                    <div class="mt-2">
                        <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $fornecedor->telefone) }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:text-gray-200">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-300">Email:</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" value="{{ old('email', $fornecedor->email) }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:bg-gray-700 dark:text-gray-200">
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full py-2 px-4" style="background-color: #009ef7; color: white; border-radius: 0.375rem; hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
