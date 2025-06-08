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

        <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white mb-6">Cadastrar Depósito</h2>

        <form action="{{ route('depositos.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="rua" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Rua</label>
                <input type="number" name="rua" id="rua" min="0" required
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg
                           focus:ring-blue-500 focus:border-blue-500
                           dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    value="{{ old('rua') }}">
            </div>

            <div class="mb-4">
                <label for="gondola" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Gôndola</label>
                <input type="number" name="gondola" id="gondola" min="0" required
                    class="w-full px-4 py-2 text-gray-900 bg-white border border-gray-300 rounded-lg
                           focus:ring-blue-500 focus:border-blue-500
                           dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    value="{{ old('gondola') }}">
            </div>

            <div>
                <button type="submit" class="w-full py-2 px-2" style="background-color: #009ef7; color: white;
                border-radius: 0.200rem; hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">Cadastrar Depósito</button>
            </div>
        </form>
    </div>
</x-app-layout>
