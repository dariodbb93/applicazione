<x-layout>

    <div class="col-12 d-flex justify-content-center">
        <form action="{{ route('storageContact') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label mt-3">Nome e cognome </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nameContact" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cellulare </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="tel" required>
            </div>
            <div class="col-12">
                <button class="btn btn-secondary" type="submit"> Salva il Contatto </button>
            </div>
        </form>
    </div>

</x-layout>
