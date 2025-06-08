<x-app-layout>
    <div class="space-y-6">
        <!-- Cabeçalho -->
        <div class="relative mb-6 flex items-center justify-center">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">🍽️ Consumo de Reservas</h1>
        </div>

        <!-- Alertas -->
        @if(session('success'))
            <div
                id="success-alert"
                class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert"
            >
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div
                id="error-alert"
                class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert"
            >
                {{ session('error') }}
            </div>
        @endif

        <!-- Tabela de Consumo de Reservas -->
        <div class="overflow-x-auto shadow-lg rounded-lg">
            @if($reservas->isEmpty())
                <div class="p-6 text-center text-gray-600 dark:text-gray-400">
                    Nenhuma reserva disponível para consumo.
                </div>
            @else
                <table class="w-full text-sm text-center text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                        <tr>
                            <th class="px-6 py-4">Reserva</th>
                            <th class="px-6 py-4">Material</th>
                            <th class="px-6 py-4">Quantidade Reservada</th>
                            <th class="px-6 py-4">Quantidade em Estoque</th>
                            <th class="px-6 py-4">Deposito</th>
                            <th class="px-6 py-4">Consumir</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($reservas as $reserva)
                            <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-900">
                                <td class="px-6 py-4 font-medium">{{ $reserva->numero_reserva }}</td>
                                <td class="px-6 py-4">
                                    {{ $reserva->material->material }} - {{ $reserva->material->descricao }}
                                </td>
                                <td class="px-6 py-4">{{ $reserva->quantidade }}</td>
                                <td class="px-6 py-4">{{ $reserva->material->em_estoque }}</td>
                                <td class="px-6 py-4">{{ $reserva->material->deposito->codigo ?? 'Não definido' }}</td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('reservas.storeConsumo', $reserva) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="quantidade" value="{{ $reserva->quantidade }}">
                                        <button
                                            type="submit"
                                            class="inline-flex items-center px-4 py-1.5 text-sm font-medium text-white bg-blue-600 rounded-lg
                                            hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-700
                                            dark:hover:bg-blue-800 dark:focus:ring-blue-800"
                                            title="Consumir reserva"
                                        >
                                            <i class="fas fa-check-circle mr-2 text-gray-900 dark:text-white"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    {{-- Script para ocultar alertas após 4 segundos --}}
    <script>
        setTimeout(() => {
            const alerts = ['success-alert', 'error-alert'].map(id => document.getElementById(id)).filter(Boolean);

            alerts.forEach(alert => {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = 0;
                setTimeout(() => alert.remove(), 500);
            });
        }, 4000);
    </script>
</x-app-layout>
