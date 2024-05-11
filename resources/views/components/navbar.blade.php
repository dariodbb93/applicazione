<nav class="navbar navbar-expand-lg bg-body m-0 p-0 fixed-top">
    <div class="container-fluid backgroundNavbar">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href=" {{ route('index') }}">Anagrafica contatti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('salvaContatto') }}"> Crea anagrafica </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('creaOrdine') }}"> Crea un ordine </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('view') }}"> Gestione Ordini </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('riepilogo') }}"> Riepilogo Ordinativi </a>
                </li>
        </div>
    </div>
</nav>
