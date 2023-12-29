<x-layout>
    <div class="col-12 d-flex justify-content-center mt-2">
        <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> email </label>
                <input type="email" class="form-control" id="exampleFormControlInput1" name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> password </label>
                <input type="password" class="form-control" id="exampleFormControlInput1" name="password" required>
            </div>
            <div class="col-12">
                <button class="btn btn-secondary" type="submit"> Invia i dati </button>
            </div>
        </form>
    </div>
</x-layout>
