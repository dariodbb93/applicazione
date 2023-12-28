<x-layout>
    <h1 class="text-center mt-3">Lista dei Contatti</h1>

    <p class="text-center">Qui c'è la lista delle anagrafiche (contatti)</p>
    <hr>

    <label for="contactsDropdown">Anagrafica contatti:</label>
    <select id="contactsDropdown" name="contact">
        @foreach ($contacts as $contact)
            <option value="{{ $contact->id }}">{{ $contact->name }}</option>
        @endforeach
    </select>

</x-layout>
