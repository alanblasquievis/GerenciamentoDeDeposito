<x-app-layout>
    <div class="space-y-6">

        <!-- Cabeçalho -->
        <div class="relative mb-6 flex items-center justify-center">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                📋 Lista de Reservas
            </h1>

            <div class="absolute right-0 top-0 flex space-x-8 px-4 py-2">

                <a href="{{ route('reservas.pdf') }}">
                        <button type="button" 
                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 
                                    focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 
                                    dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 
                                    dark:hover:border-gray-600 dark:focus:ring-gray-700 transition">
                            📄 Exportar PDF
                        </button>
                    </a>
                <a href="{{ route('reservas.criar') }}"
                   class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 
                          focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 
                          dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 
                          dark:hover:border-gray-600 dark:focus:ring-gray-700 transition">
                    Criar Reserva
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

        <!-- Tabela de Reservas -->
        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="w-full text-sm text-center text-gray-700 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-4">Número da Reserva</th>
                        <th class="px-6 py-4">Material</th>
                        <th class="px-6 py-4">Quantidade</th>
                        <th class="px-6 py-4">Data</th>
                        <th class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($reservas as $reserva)
                        <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-900">
                            <td class="px-6 py-4 font-medium">{{ $reserva->numero_reserva }}</td>
                            <td class="px-6 py-4">
                                {{ $reserva->material->material }} - {{ $reserva->material->descricao }}
                            </td>
                            <td class="px-6 py-4">{{ $reserva->quantidade }}</td>
                            <td class="px-6 py-4">{{ $reserva->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4">
                                <!-- Botão de exclusão -->
                                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" 
                                      class="inline-block ml-4" 
                                      onsubmit="return confirm('Tem certeza que deseja excluir esta reserva?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-[#f1416c]">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                Nenhuma reserva encontrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
