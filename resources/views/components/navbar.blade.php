<div class="sticky-top bg-light">
    <nav class="navbar navbar-expand-lg navbar-light py-3 {{-- py-4 --}} navbar-nd d-flex">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                <img src="{{ asset('assets/img/logo-baru.svg') }}" width="50" height="50"
                    class="d-inline-block align-top me-5" alt="logo buildwithangga">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="basic-menus navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="https://buildwithangga.com/sale">
                            Flash Sale
                        </a>
                    </li> --}}
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item d-none d-sm-block d-lg-flex align-items-center dropdown">
                        @php
                        $splitName = explode(' ', Auth::user()->nama, 2);
                        $first_name = $splitName[0];
                        @endphp
                        <span class="user-name">Halo, Bapak/Ibu
                            {{-- {{ Str::ucfirst(Str::lower($first_name)) }} --}}
                        </span>
                        <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="user-photo" src="{{ asset('assets/img/profile.webp') }}" alt="Walid">
                        </a>
                        <ul class="mt-2 dropdown-menu dropdown-nd" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{  route('profile.index') }}">Profil Saya</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item me-3 d-block d-sm-none mt-3 mt-lg-0">
                        <a class="btn btn-primary w-100" href="{{ route('dashboard.index') }}">
                            Profil Saya
                        </a>
                    </li>
                    <li class="nav-item me-3 d-block d-sm-none mt-3 mt-lg-0">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="btn btn-secondary w-100" href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Logout
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>