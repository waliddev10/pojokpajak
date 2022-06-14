<section class="sidebar-nd d-none d-sm-block d-print-none">
    <div class="content">
        <div class="user mb-5">
            <img src="{{ asset('assets/img/user.png') }}" class="avatar">
            <div class="info mt-4">
                <h3 class="lh-base">
                    {{ ucwords(Str::lower(Auth::user()->nama)) }}
                </h3>
                <p>
                    {{ preg_replace('/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})$/',
                    '$1.$2.$3.$4-$5.$6',
                    Auth::user()->npwp) }}
                </p>
                <p>
                    {{ Str::ucfirst(Auth::user()->jenis_wp) }}
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
            @if(Auth::user()->role == 'admin')
            <div class="item">
                <i data-feather="upload-cloud"
                    class="icon @if(Request::is(URL::route('import.index', [], false).'/*')) text-primary @endif"></i>
                <p>
                    <a href="{{  route('import.index') }}">
                        Impor Data
                    </a>
                </p>
            </div>
            @endif
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