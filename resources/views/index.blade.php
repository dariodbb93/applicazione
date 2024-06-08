<x-layout>
    <h1 class="text-center mt-3">Anagrafica contatti </h1>


    <hr class="my-4">

    <div class="col-12 d-flex justify-content-center">

        <table class="table table-sm table-responsive table-bordered table-hover table-sm mt-2 text-center">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefono </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->nameContact }}</td>
                        <td>{{ $contact->tel }}</td>
                        <td>
                            <form action="{{ route('destroyContact', $contact['id']) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger mt-1 btn-sm" type="submit">Elimina</button>
                            </form>
                            </td>
                  
                    </tr>
                @endforeach
                
            </tbody>

        </table>
    </div>
    {{ $contacts->links() }}
</x-layout>
