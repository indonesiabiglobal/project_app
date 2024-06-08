<x-layouts.base>
    @if(in_array(request()->route()->getName(), [
        'dashboard', 
        'profile', 
        'profile-example', 
        'users', 
        'bootstrap-tables', 
        'transactions',
        'nippo-infure',
        'loss-infure',
        'buttons',
        'order-entry',
        'lpk-entry',
        'forms', 
        'modals', 
        'notifications', 
        'typography', 
        'upgrade-to-pro',
        'nippo-seitai',
        'loss-seitai',
        'mutasi-isi-palet',
        'infure-jam-kerja',
        'seitai-jam-kerja',
        'kenpin-infure-kenpin',
        'kenpin-seitai-kenpin',
        'mutasi-isi-palet-kenpin',

        'master-pegawai',
        'absensi-pegawai',
        'jadwal-kerja-pegawai',
        'pengajuan-kehadiran',
        'daftar-pengajuan',
        'daftar-persetujuan',
        'pengajuan-lembur',
        'daftar-persetujuan-lembur',
        'perhitungan-payroll',
        'slip-gaji',
        ]))

        {{-- Nav --}}
        @include('layouts.nav')
        {{-- SideNav --}}
        @include('layouts.sidenav')
        <main class="content">
        {{-- TopBar --}}
        @include('layouts.topbar')
        {{ $slot }}
        {{-- Footer --}}
        @include('layouts.footer')
        </main>

    @elseif(in_array(request()->route()->getName(), [
        'cetak-lpk',
        'order-report',
        'checklist-infure',
        'label-gentan',
        'check-list-seitai',
        'label-masuk-gudang',
        'print-label-gudang-kenpin',
        'report-kenpin',
        'penarikan-palet',
        'pengembalian-palet',
        'general-report',
        'detail-report',
        'edit-order',
        'add-order'
        ]))
        {{-- Nav --}}
        @include('layouts.nav')
        {{-- SideNav --}}
        @include('layouts.sidenav')
        <main class="content">
        {{-- TopBar --}}
        @include('layouts.topbar2')
        {{ $slot }}
        {{-- Footer --}}
        @include('layouts.footer')
        </main>

    @elseif(in_array(request()->route()->getName(), [
        'register', 
        'register-example', 
        'login', 
        'login-example',
        'forgot-password', 
        'forgot-password-example', 
        'reset-password',
        'reset-password-example'
        ]))

    {{ $slot }}
    {{-- Footer --}}
    {{-- @include('layouts.footer2') --}}


    @elseif(in_array(request()->route()->getName(), ['404', '500', 'lock']))

    {{ $slot }}

    @endif
</x-layouts.base>