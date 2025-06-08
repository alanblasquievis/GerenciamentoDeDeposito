<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Reservas</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #444; padding: 8px; text-align: center; }
        th { background-color: #f0f0f0; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Relatório de Reservas</h1>

    <table>
        <thead>
            <tr>
                <th>Nº Reserva</th>
                <th>Material</th>
                <th>Quantidade</th>
                <th>Estoque</th>
                <th>Depósito</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
    @foreach($reservas as $reserva)
        @if($reserva->quantidade > 0)
            <tr>
                <td>{{ $reserva->numero_reserva }}</td>
                <td>{{ $reserva->material->material }} - {{ $reserva->material->descricao }}</td>
                <td>{{ $reserva->quantidade }}</td>
                <td>{{ $reserva->material->em_estoque }}</td>
                <td>{{ $reserva->material->deposito->codigo ?? 'N/D' }}</td>
                <td>{{ $reserva->created_at->format('d/m/Y H:i') }}</td>
            </tr>
        @endif
    @endforeach
</tbody>
    </table>
</body>
</html>
