<x-layout>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id Ordine</th>
                <th scope="col">Quantità</th>
                <th scope="col">Peso</th>
                <th scope="col">Tempo</th>
                <th scope="col">Cliente</th>
                <th scope="col">Articoli</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails as $order)
                <tr>
                    <td>{{ $order['order_id'] }}</td>
                    <td>{{ $order['quantity'] }}</td>
                    <td>{{ $order['weight'] }}</td>
                    <td>{{ $order['time'] }}</td>
                    <td>{{ $order['contact'] }}</td>
                    <td>{{ $order['items'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>

