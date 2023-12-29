<x-layout>
    <h1 class="text-center mt-3">Lista dei Contatti</h1>

    <p class="text-center">Qui c'è la lista delle anagrafiche (contatti)</p>
    <hr>

    <div class="col-12 d-flex justify-content-center">
        <form action="/getContactDetails" method="post">
            @csrf

            <label for="contactsDropdown">Anagrafica contatti:</label>
            <select id="contactsDropdown" name="contact">
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->nameContact }}</option>
                @endforeach
            </select>

            <button type="submit">Mostra Dettagli</button>
        </form>



        <div id="contactDetails">

            @isset($selectedContact)
                <p>Contatto Selezionato: {{ $selectedContact->nameContact }}</p>
                <p>Telefono: {{ $selectedContact->tel }}</p>
            @endisset
        </div>
    </div>
</x-layout>
