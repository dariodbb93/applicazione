<x-layout>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Identificativo Ordine</th>
                <th scope="col">Quantità </th>
                <th scope="col">Peso (Kg)</th>
                <th scope="col"> Data di ritiro </th>
                <th scope="col">Cliente </th>
                <th scope="col">Cellulare </th>
                <th scope="col">Articoli </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetails as $order)
                <tr>
                    <td>{{ $order['order_id'] }}</td>
                    <td>{{ $order['quantity'] }}</td>
                    <td>{{ $order['weight'] }}</td>
                    <td>{{ $order['ritiro'] }}</td>
                    <td>{{ $order['contact'] }}</td>
                    <td>{{ $order['tel'] }}</td>
                    <td>{{ $order['items'] }}</td>
                    <td>
                        <form action="{{ route('destroy', ($order['order_id'])) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger mt-1" type="submit">Elimina</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
