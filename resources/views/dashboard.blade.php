    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800">Dashboard</h2>
        </x-slot>

        <div class="py-6 px-6 bg-white shadow rounded">
            <div id="grafico"></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            const options = {
                chart: {
                    type: 'bar',
                    height: 400
                },
                series: [{
                    name: 'Estoque',
                    data: @json($quantidades)
                }],
                xaxis: {
                    categories: @json($nomes),
                    labels: {
                        rotate: -45
                    }
                },
                title: {
                    text: 'Materiais em Estoque',
                    align: 'center'
                }
            };

            const chart = new ApexCharts(document.querySelector("#grafico"), options);
            chart.render();
        </script>
    </x-app-layout>
