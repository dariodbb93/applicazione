<x-layout>
    <h1 class="text-center mt-3">Anagrafica contatti </h1>


    <hr class="my-4">

    <div class="col-12 d-flex justify-content-center">
        <form action="/getContactDetails" method="post">
            @csrf

            <label for="contactsDropdown">Anagrafica contatti:</label>
            <select id="contactsDropdown" class="form-select" name="contact">
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->nameContact }}</option>
                @endforeach
            </select>

            <button class="btn btn-outline-dark mt-1 "type="submit">Mostra Dettagli</button>
        </form>

        <div id="contactDetails">

            @isset($selectedContact)
                <p class="fw-bold mx-1">Contatto Selezionato: {{ $selectedContact->nameContact }}</p>
                <p class="mx-1">Telefono: {{ $selectedContact->tel }}</p>
            @endisset
        </div>
    </div>
</x-layout>
