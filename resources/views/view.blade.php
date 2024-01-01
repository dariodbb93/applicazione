<x-layout>


    <h1 class="text-center mx-1 my-3"> Gestione degli ordini </h1>
    <button id="exportButton" class="btn btn-outline-primary mb-3"> Esporta la griglia in file di testo </button>

    <table class="table table-responsive table-bordered table-hover table-sm mt-2">
        <thead>
            <tr>
                <th scope="col">Numero Ordine</th>
                <th scope="col">Data ordine (Anno - mese - giorno) </th>
                <th scope="col">Quantità </th>
                <th scope="col">Peso (Kg)</th>
                <th scope="col">Data di ritiro (Anno - mese - giorno) </th>
                <th scope="col">Cliente </th>
                <th scope="col">Cellulare </th>
                <th scope="col">Articoli </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetails as $order)
                <tr>
                    <td>{{ $order['order_id'] }}</td>
                    <td>{{ $order['order_date'] }}</td>
                    <td>{{ $order['quantity'] }}</td>
                    <td>{{ $order['weight'] }}</td>
                    <td>{{ $order['ritiro'] }}</td>
                    <td>{{ $order['contact'] }}</td>
                    <td>{{ $order['tel'] }}</td>
                    <td>{{ $order['items'] }}</td>
                    <td>
                        <form action="{{ route('destroy', $order['order_id']) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger mt-1 btn-sm" type="submit">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById('exportButton').addEventListener('click', function () {
                exportTableToText();
            });

            function exportTableToText() {
                var table = document.querySelector('.table');
                var rows = table.querySelectorAll('tr');
                var csv = [];

                for (var i = 0; i < rows.length; i++) {
                    var row = [],
                        cols = rows[i].querySelectorAll('td,th');

                    for (var j = 0; j < cols.length; j++)
                        row.push(cols[j].innerText);

                    csv.push(row.join(','));
                }

                var textToSave = csv.join('\n');
                var hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(textToSave);
                hiddenElement.target = '_blank';
                hiddenElement.download = 'tabella_ordini.csv';
                hiddenElement.click();
            }
        });
    </script>
</x-layout>
