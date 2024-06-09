<x-layout>


    <h1 class="text-center mx-1 my-3"> Storico utente </h1>
    <hr>


    <table class="table table-responsive table-bordered table-hover table-sm mt-2 text-center">
        <thead>
            <tr>
                <th scope="col">Numero Ordine</th>
                <th scope="col">Data ordine (Anno - mese - giorno) </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>


                </tr>
            @endforeach
        </tbody>

    </table>

</x-layout>
