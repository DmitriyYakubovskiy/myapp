<nav class="navbar navbar-expand-lg site-header">
    <div class="container">
        <div class="icon-title d-flex align-items-center">
            <a class="navbar-brand text-white d-flex align-items-center" href="/">
                <img src="{{ asset('storage/icons/icon-dinosaur-skull.png') }}" 
                     alt="Dino Icon" width="40" height="40" class="me-2">
                <span class="fw-bold">Динопедия</span>
            </a>
        </div>

        <a href="{{ route('dinosaurs.create') }}" class="btn btn-outline-light">
            Добавить динозавра
        </a>
    </div>
</nav>
