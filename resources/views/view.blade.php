<x-layout>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Identificativo Ordine</th>
                <th scope="col">Quantità (Pz) </th>
                <th scope="col">Peso (Kg)</th>
                <th scope="col">Tempo (hh:mm) </th>
                <th scope="col">Cliente </th>
                <th scope="col">Articoli </th>
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

