<section class="sidebar-nd d-none d-sm-block d-print-none">
    <div class="content">
        <div class="user mb-5">
            <img src="{{ asset('assets/img/profile.webp') }}" class="avatar">
            <div class="info mt-4">
                <h3 class="lh-base">
                    {{ ucwords(Str::lower(Auth::user()->nama)) }}
                </h3>
                <p>
                    {{ preg_replace('/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})$/',
                    '$1.$2.$3.$4-$5.$6',
                    Auth::user()->npwp) }}
                </p>
            </div>
        </div>
        <div class="menus">
            <div class="item">
                <i data-feather="home" class="icon {{{ Request::is('/dashboard*') ? 'text-primary' : '' }}}"></i>
                <p>
                    <a href="{{  route('dashboard.index') }}">
                        Beranda
                    </a>
                </p>
            </div>
            {{-- <div class="item">
                <i data-feather="file-text"
                    class="icon @if(Request::is(URL::route('bupot-pph21-final.index', [], false).'/*')) text-primary @endif"></i>
                <p>
                    <a href="{{  route('bupot-pph21-final.index') }}">
                        Bukti Potong
                    </a>
                </p>
            </div> --}}
            <div class="item">
                <i data-feather="settings"
                    class="icon @if(Request::is(URL::route('setting.index', [], false).'/*')) text-primary @endif"></i>
                <p>
                    <a href="{{  route('setting.index') }}">
                        Pengaturan
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>