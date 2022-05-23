@php
$menu = collect([

# --- menu 1 --- #
(object) [
'title' => 'Beranda',
'icon' => 'fas fa-fw fa-home',
'route' => 'dashboard.index',
'submenu' => null
],
# --- menu 1 --- #

# --- menu 2 --- #
(object) [
'title' => 'Bukti Potong',
'icon' => 'fas fa-fw fa-cut',
'route' => null,
'submenu' => [
## --- submenu 2.2 --- #
(object) [
'title' => 'PPH 21',
'route' => null
],
## --- submenu 2.1 --- #
## --- submenu 2.2 --- #
(object) [
'title' => 'PPh 21 Final',
'route' => 'bupot-pph21-final.index'
],
## --- submenu 2.2 --- #
// ## --- submenu 2.2 --- #
// (object) [
// 'title' => 'UNIFIKASI',
// 'route' => null
// ],
// ## --- submenu 2.1 --- #
// ## --- submenu 2.2 --- #
// (object) [
// 'title' => 'PPh Final Ps. 4(2)',
// 'route' => 'dashboard'
// ],
// ## --- submenu 2.2 --- #
// ## --- submenu 2.2 --- #
// (object) [
// 'title' => 'PPN/PPnBM',
// 'route' => 'dashboard'
// ],
// ## --- submenu 2.2 --- #
// ## --- submenu 2.2 --- #
// (object) [
// 'title' => 'PPh Ps. 26',
// 'route' => 'dashboard'
// ],
// ## --- submenu 2.2 --- #
]
],
# --- menu 2 --- #

// # --- menu 2 --- #
// (object) [
// 'title' => 'Setting',
// 'icon' => 'fas fa-fw fa-wrench',
// 'route' => null,
// 'submenu' => [
// ## --- submenu 2.2 --- #
// (object) [
// 'title' => 'Aplikasi',
// 'route' => null
// ],
// ## --- submenu 2.1 --- #
// ## --- submenu 2.2 --- #
// (object) [
// 'title' => 'Email Otomatis',
// 'route' => 'dashboard'
// ],
// ## --- submenu 2.2 --- #
// ## --- submenu 2.2 --- #
// (object) [
// 'title' => 'Notifikasi Telegram',
// 'route' => 'dashboard'
// ],
// ## --- submenu 2.2 --- #
// ]
// ],
// # --- menu 2 --- #

]);
@endphp

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
        {{-- <img class="mr-2 float-left" src="{{ asset('assets/img/logo.svg') }}" height="50" />
        <div>
            <strong class="d-block">Pojok Pajak</strong>
            <span class="text-xs d-block">Sistem Informasi Perpajakan</span>
        </div> --}}
        <div class="sidebar-brand-icon rotate-n-15">
            <img class="float-left" src="{{ asset('assets/img/logo.svg') }}" height="36" />
        </div>
        <div class="sidebar-brand-text mx-2">
            <strong class="d-block">Pojok Pajak</strong>
            <span style="font-size: 0.5em" class="d-block text-capitalize font-weight-normal">Sistem Informasi
                Perpajakan</span>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @foreach ($menu as $m)
    @if(!empty($m->submenu))
    <li
        class="nav-item @foreach($m->submenu as $xsm) @if(collect($xsm)->contains(Route::currentRouteName())) active @endif @endforeach">
        <a href="javascript:void(0)" class="nav-link collapsed" data-toggle="collapse"
            data-target="#{{ Str::slug($m->title) }}" aria-expanded="true" aria-controls="{{ Str::slug($m->title) }}">
            <i class="{{ $m->icon }}"></i>
            <span>{{ $m->title }}</span>
        </a>
        <div id="{{ Str::slug($m->title) }}"
            class="collapse @foreach($m->submenu as $xsm) @if(collect($xsm)->contains(Route::currentRouteName())) show @endif @endforeach"
            aria-labelledby="{{ Str::slug($m->title) }}" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @foreach ($m->submenu as $sm)
                @if(!empty($sm->route))
                <a class="collapse-item @if(Route::is($sm->route)) active @endif" href="{{ URL::route($sm->route) }}">{{
                    $sm->title }}</a>
                @else
                <h6 class="collapse-header">{{ $sm->title }}</h6>
                @endif
                @endforeach
            </div>
        </div>
    </li>
    @else
    <li class="nav-item @if(Route::is($m->route)) active @endif">
        <a class="nav-link" href="{{ URL::route($m->route) }}">
            <i class="{{ $m->icon }}"></i>
            <span>{{ $m->title }}</span>
        </a>
    </li>
    @endif
    @endforeach

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <p class="text-center mb-2"><strong>{{ config('app.name') }} {{ config('app.version')
                }}</strong>
            <br />
            {{ config('app.description') }}
        </p>
        <a class="btn btn-success btn-sm" href="https://wa.me/6285172277277"><i class="fab fa-whatsapp"></i>
            Kontak Kami</a>
    </div>

</ul>