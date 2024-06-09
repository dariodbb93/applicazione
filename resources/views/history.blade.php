<x-layout>

    <h1 class="text-center mx-1 my-3">Storico Utente </h1>
    <hr>
 
    <div class="col-12 d-flex justify-content-center">
        <form action="{{ route('historyDetail') }}" method="GET">
            @csrf
            <label for="contact" class="fw-bold">Seleziona un cliente</label>
            <select name="id" class="form-select mt-1" size="5" aria-label="Multiple select example">
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->nameContact }}</option>
                @endforeach
            </select>
            <div class="col-12">
                <button class="btn btn-secondary mt-3" type="submit">Visualizza Storico</button>
            </div>
        </form>
    </div>

</x-layout>