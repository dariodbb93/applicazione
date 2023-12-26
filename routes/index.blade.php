<x-layout>
    <h1 class="text-center mt-3"> Blog di piante </h1>
    <p class ="text-center"> Nel mio tempo libero mi diverto a coltivare diverse varietà di piante. Qui puoi trovarne
        alcune con i relativi dettagli!
    </p>
    <hr>
    <div class="row">
        @foreach ($uploads as $upload)
            <div class="col-12 col-md-4 d-flex justify-content-center">
                <div class="card my-5" style="width: 18rem;">
                    <img src="{{ 'uploadsImg/' . $upload->img }}" class="card-img-top img">
                    <div class="card-body cardBackground p-4">
                        <h5 class="fw-bolder">{{ $upload->titolo }}</h5>
                        <p class="card-text"> Autore: {{ $upload->autore }}</p>
                        <p class="card-text">{{ $upload->descrizione }}</p>
                        <form action="{{ route('destroy', compact('upload')) }}" method="POST">
                            @guest
                            @else
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger mt-1" type="submit"> Elimina </button>
                        </form>
                        @endguest
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
