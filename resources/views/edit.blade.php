<x-layout>
<h2 class="text-center"> Aggiungi articoli all'ordine esistente </h2>
    <div class="col-12 d-flex justify-content-center">
        <form action="{{ route('updateOrder', ['order' => $order->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="item_id[]" class="fw-bold"> Articoli </label>
            <select id="itemsDropdown" name="item_id[]" multiple class="form-select mt-1" aria-label="Multiple select example">
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label for="ritiro" class="form-label mt-3 fw-bold">Data e Ora di ritiro</label>
                <input type="datetime-local" class="form-control" id="ritiro" name="ritiro">
            </div>

            @foreach ($items as $item)
                <div class="mb-3 item-fields" id="item_{{ $item->id }}" style="display: none;">
                    <label for="quantity_{{ $item->id }}" class="form-label fw-bold">Quantità per {{ $item->name }}</label>
                    <input type="number" class="form-control" id="quantity_{{ $item->id }}" name="quantity[{{ $item->id }}]">
                    
                    <label for="weight_{{ $item->id }}" class="form-label fw-bold">Peso in Kg per {{ $item->name }}</label>
                    <input type="number" class="form-control" id="weight_{{ $item->id }}" name="weight[{{ $item->id }}]" step="0.1">
                </div>
            @endforeach

            <div class="col-12">
                <button class="btn btn-secondary mt-3" type="submit"> Aggiorna Ordine </button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#itemsDropdown').change(function() {
                var selectedItems = $(this).val();
                $('.item-fields').hide();
                selectedItems.forEach(function(itemId) {
                    $('#item_' + itemId).show();
                });
            });
        });
    </script>

</x-layout>
