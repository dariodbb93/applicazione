<x-layout>

    <div class="col-12 d-flex justify-content-center">
        <form action="{{ route('salvaArticolo') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titolo </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="titolo" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Autore </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="autore" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descrizione articolo </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="descrizione" required rows="2"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Carica un'immagine jpg</label>
                <input class="form-control" type="file" id="formFile" name="img" required>
            </div>
            <div class="col-12">
                <button class="btn btn-secondary" type="submit"> Invia i dati </button>
            </div>
        </form>
    </div>

</x-layout>
