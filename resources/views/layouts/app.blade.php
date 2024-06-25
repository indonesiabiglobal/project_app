<x-layouts.base>
    @if(in_array(request()->route()->getName(), [
        'order-entry',
        'lpk-entry',
        'search-data'
        ]))

        @include('layouts.nav')
        @include('layouts.sidenav')
        <main class="content">
            @include('layouts.topbar')
            {{ $slot }}
            @include('layouts.footer')
        </main>

    @elseif(in_array(request()->route()->getName(), [
        'profile', 
        'profile-example', 
        'users', 
        'bootstrap-tables', 
        'transactions',
        'nippo-infure',
        'loss-infure',
        'buttons',        
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
        'kenpin-infure',
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

            @include('layouts.nav')
            @include('layouts.sidenav')
        <main class="content">
            @include('layouts.topbar3')
            {{ $slot }}
            @include('layouts.footer')
        </main>

    @elseif(in_array(request()->route()->getName(), [
        'dashboard',
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
        'add-order',
        'edit-lpk',
        'add-lpk',
        'edit-nippo',
        'add-nippo',
        'edit-loss-infure',
        'add-loss-infure',
        'edit-kenpin',
        'add-kenpin',
        'add-kenpin-seitai',
        'edit-seitai',
        'add-seitai',
        ]))
        
        @include('layouts.nav')
        @include('layouts.sidenav')
        <main class="content">
            @include('layouts.topbar2')
            {{ $slot }}
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

    @elseif(in_array(request()->route()->getName(), ['404', '500', 'lock']))

    {{ $slot }}

    @endif
</x-layouts.base>