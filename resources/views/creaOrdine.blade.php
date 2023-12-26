<x-layout>

    <div class="col-12 d-flex justify-content-center">
        <form action="{{ route('storageOrder') }}" method="post" enctype="multipart/form-data">
            @csrf
            <select id="contactsDropdown" name="item_id">
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Quantita </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="quantity" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Peso </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="weight" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Time</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="time" required>
            </div>
            <select id="contactsDropdown" name="contact_id">
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                @endforeach
            </select>
            <div class="col-12">
                <button class="btn btn-secondary" type="submit"> Salva il Contatto </button>
            </div>
        </form>
    </div>

</x-layout>
