<x-layout>
    <h1 class="text-center"> Crea Ordine </h1>

    <hr>

    <div class="col-12 d-flex justify-content-center">
        <form action="{{ route('storageOrder') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="item_id[]" class="fw-bold"> Articoli </label>
            <select id="contactsDropdown" name="item_id[]" multiple class="form-select mt-1" size="5" multiple
                aria-label="Multiple select example">
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label for="dateTime" class="form-label mt-3 fw-bold">Data e Ora di ritiro</label>
                <input type="datetime-local" class="form-control" id="time" name="ritiro">
            </div>


            @foreach ($items as $item)
                <div class="mb-3 item-fields" id="item_{{ $item->id }}" style="display: none;">
                    <label for="quantity_{{ $item->id }}" class="form-label fw-bold">Quantità per
                        {{ $item->name }}</label>
                    <input type="number" class="form-control" id="quantity_{{ $item->id }}"
                        name="quantity[{{ $item->id }}]">

                    <label for="weight_{{ $item->id }}" class="form-label fw-bold">Peso in Kg per
                        {{ $item->name }}</label>
                    <label for="weight_{{ $item->id }}" class="form-label fw-bold">Peso in Kg per
                        {{ $item->name }}</label>
                    <input type="number" class="form-control" id="weight_{{ $item->id }}"
                        name="weight[{{ $item->id }}]" step="0.1">

                </div>
            @endforeach
            <label for="contactsDropdown" class="form-label mt-3 fw-bold"> Cliente </label>
            <select class="form-select" aria-label="Default select example" id="contactsDropdown" name="contact_id">
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->nameContact }} | Telefono:{{ $contact->tel }}
                    </option>
                @endforeach
            </select>

            <div class="form-floating">

                <textarea class="form-control mt-3" placeholder="Inserisci una nota" id="floatingTextarea" name ="note"></textarea>
                <label for="floatingTextarea"> Note </label>
            </div>

            <div class="col-12">
                <button class="btn btn-secondary mt-3" type="submit"> Crea Ordine </button>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contactsDropdown').change(function() {

                var selectedItems = $(this).val();

                $('.item-fields').hide();

                selectedItems.forEach(function(itemId) {
                    $('#item_' + itemId).show();
                });
            });
        });
    </script>


</x-layout>
