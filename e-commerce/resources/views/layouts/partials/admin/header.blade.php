<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">{{ config('app.name') }} - Administrator</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.products.index') }}">Products</a>
                    </li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="post">
                            @csrf
                            <button class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
