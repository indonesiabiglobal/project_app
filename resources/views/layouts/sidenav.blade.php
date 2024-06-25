<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-2 pt-3">
    <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <div class="avatar-lg me-4">
          <img src="/assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white"
            alt="Bonnie Green">
        </div>
        <div class="d-block">
          <h2 class="h5 mb-3">Hi, Jane</h2>
          <a href="/login" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            Sign Out
          </a>
        </div>
      </div>
      <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
          aria-expanded="true" aria-label="Toggle navigation">
          <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
    </div>
    @if(Auth::check() && Auth::user()->status == '9')
      <ul class="nav flex-column pt-3 pt-md-0">
        <li class="nav-item">
          <a href="/dashboard" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-3">
              <img src="/assets/img/brand/logo.png" height="40" width="40" alt="Volt Logo">
            </span>
            <span class="mt-1 ms-1 sidebar-text">
              Home
            </span>
          </a>
        </li>
        <li class="nav-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
          <a href="/dashboard" class="nav-link">
            <span class="sidebar-icon"> <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
              </svg></span></span>
            <span class="sidebar-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <span
            class="nav-link collapsed d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#order-lpk">
            <span>
              <span class="sidebar-icon"><i class="fas fa-cart-arrow-down me-2"></i></span>
              <span class="sidebar-text">Order & LPK</span>
            </span>
            <span class="link-arrow">
              <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
            </span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == 'order-entry' || Request::segment(1) == 'lpk-entry' || Request::segment(1) == 'cetak-lpk' || Request::segment(1) == 'order-report' ? 'show' : '' }}" role="list" id="order-lpk" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'order-entry' ? 'active' : '' }}">
                <a href="/order-entry" class="nav-link">
                  <span class="sidebar-text">Order Entry</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'lpk-entry' ? 'active' : '' }}">
                <a href="/lpk-entry" class="nav-link">
                  <span class="sidebar-text">LPK Entry</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'cetak-lpk' ? 'active' : '' }}">
                <a href="/cetak-lpk" class="nav-link">
                  <span class="sidebar-text">Cetak LPK</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'order-report' ? 'active' : '' }}">
                <a href="/order-report" class="nav-link">
                  <span class="sidebar-text">Order Report</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        {{-- <li class="nav-item {{ Request::segment(1) == 'transactions' ? 'active' : '' }}">
          <a href="/transactions" class="nav-link">
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                <path fill-rule="evenodd"
                  d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                  clip-rule="evenodd"></path>
              </svg></span>
            <span class="sidebar-text">Transactions</span>
          </a>
        </li> --}}

        <li class="nav-item">
          <span
            class="nav-link collapsed d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#nippo-infure">
            <span>
              <span class="sidebar-icon"><i class="fas fa-pen me-2"></i></span>
              <span class="sidebar-text">Nippo INFURE</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == 'nippo-infure' || Request::segment(1) == 'loss-infure' || Request::segment(1) == 'checklist-infure' || Request::segment(1) == 'label-gentan' ? 'show' : '' }}" role="list" id="nippo-infure" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'nippo-infure' ? 'active' : '' }}">
                <a class="nav-link" href="/nippo-infure">
                  <span class="sidebar-text">Nipo Infure</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'loss-infure' ? 'active' : '' }}">
                <a class="nav-link" href="/loss-infure">
                  <span class="sidebar-text">Loss Infure</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'checklist-infure' ? 'active' : '' }}">
                <a class="nav-link" href="/checklist-infure">
                  <span class="sidebar-text">Check List</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'label-gentan' ? 'active' : '' }}">
                <a class="nav-link" href="/label-gentan">
                  <span class="sidebar-text">Label Gentan</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <span
            class="nav-link d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#nippo-seitai">
            <span>
            <span class="sidebar-icon"><i class="fas fa-pen me-2"></i></span>
            <span class="sidebar-text">Nippo SEITAI</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                >
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == 'nippo-seitai' || Request::segment(1) == 'loss-seitai' || Request::segment(1) == 'mutasi-isi-palet' || Request::segment(1) == 'label-masuk-gudang' || Request::segment(1) == 'check-list-seitai' ? 'show' : '' }}" role="list"
            id="nippo-seitai" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'nippo-seitai' ? 'active' : '' }}">
                <a class="nav-link" href="/nippo-seitai">
                  <span class="sidebar-text">Nippo Seitai</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'loss-seitai' ? 'active' : '' }}">
                <a class="nav-link" href="/loss-seitai">
                  <span class="sidebar-text">Loss Seitai</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'mutasi-isi-palet' ? 'active' : '' }}">
                <a class="nav-link" href="/mutasi-isi-palet">
                  <span class="sidebar-text">Mutasi Isi Palet</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'check-list-seitai' ? 'active' : '' }}">
                <a class="nav-link" href="/check-list-seitai">
                  <span class="sidebar-text">Check List</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'label-masuk-gudang' ? 'active' : '' }}">
                <a class="nav-link" href="/label-masuk-gudang">
                  <span class="sidebar-text">Label Masuk Gudang</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <span
            class="nav-link d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#jam-kerja">
            <span>
              <span class="sidebar-icon"><i class="fas fa-clock me-2"></i></span>
              <span class="sidebar-text">Jam Kerja</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                >
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == 'infure-jam-kerja' || Request::segment(1) == 'seitai-jam-kerja' ? 'show' : '' }}" role="list"
            id="jam-kerja" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'infure-jam-kerja' ? 'active' : '' }}">
                <a class="nav-link" href="/infure-jam-kerja">
                  <span class="sidebar-text">Infure</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'seitai-jam-kerja' ? 'active' : '' }}">
                <a class="nav-link" href="/seitai-jam-kerja">
                  <span class="sidebar-text">Seitai</span>
                </a>
              </li>              
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <span
            class="nav-link d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#kenpin">
            <span>
              <span class="sidebar-icon"><i class="fas fa-film me-2"></i></span>
              <span class="sidebar-text">KENPIN</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                >
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == 'kenpin-infure-kenpin' || Request::segment(1) == 'kenpin-seitai-kenpin' || Request::segment(1) == 'mutasi-isi-palet-kenpin' || Request::segment(1) == 'print-label-gudang-kenpin' || Request::segment(1) == 'report-kenpin' ? 'show' : '' }}" role="list"
            id="kenpin" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'kenpin-infure' ? 'active' : '' }}">
                <a class="nav-link" href="/kenpin-infure">
                  <span class="sidebar-text">Kenpin Infure</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'kenpin-seitai-kenpin' ? 'active' : '' }}">
                <a class="nav-link" href="/kenpin-seitai-kenpin">
                  <span class="sidebar-text">Kenpin Seitai</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'mutasi-isi-palet-kenpin' ? 'active' : '' }}">
                <a class="nav-link" href="/mutasi-isi-palet-kenpin">
                  <span class="sidebar-text">Mutasi Isi Palet</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'print-label-gudang-kenpin' ? 'active' : '' }}">
                <a class="nav-link" href="/print-label-gudang-kenpin">
                  <span class="sidebar-text">Print Label Gudang</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'report-kenpin' ? 'active' : '' }}">
                <a class="nav-link" href="/report-kenpin">
                  <span class="sidebar-text">Report</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <span
            class="nav-link d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#warehouse">
            <span>
              <span class="sidebar-icon"><i class="fas fa-warehouse me-1"></i></span>
              <span class="sidebar-text">Warehouse</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                >
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == 'penarikan-palet' || Request::segment(1) == 'pengembalian-palet' ? 'show' : '' }}" role="list"
            id="warehouse" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'penarikan-palet' ? 'active' : '' }}">
                <a class="nav-link" href="/penarikan-palet">
                  <span class="sidebar-text">Penarikan Palet</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'pengembalian-palet' ? 'active' : '' }}">
                <a class="nav-link" href="/pengembalian-palet">
                  <span class="sidebar-text">Pengembalian Palet</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <span
            class="nav-link d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#report">
            <span>
            <span class="sidebar-icon"><i class="fas fa-print me-2"></i></span>
            <span class="sidebar-text">Report</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                >
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == 'general-report' || Request::segment(1) == 'detail-report' ? 'show' : '' }}" role="list"
            id="report" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'general-report' ? 'active' : '' }}">
                <a class="nav-link" href="/general-report">
                  <span class="sidebar-text">General Report</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'detail-report' ? 'active' : '' }}">
                <a class="nav-link" href="/detail-report">
                  <span class="sidebar-text">Detail Report</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <span
            class="nav-link {{ Request::segment(1) !== 'bootstrap-tables' ? 'collapsed' : '' }} d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#master-tabel">
            <span>
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                    clip-rule="evenodd"></path>
                </svg></span>
              <span class="sidebar-text">Master Tabel</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div class="multi-level collapse {{ 
            Request::segment(1) == 'buyer' || 
            Request::segment(1) == 'tipe-produk' || 
            Request::segment(1) == 'jenis-produk' || 
            Request::segment(1) == 'departemen' || 
            Request::segment(1) == 'karyawan' || 
            Request::segment(1) == 'katanuki' || 
            Request::segment(1) == 'mesin' || 
            Request::segment(1) == 'warehouse' || 
            Request::segment(1) == 'working-shift' || 
            Request::segment(1) == 'menu-loss-infure' || 
            Request::segment(1) == 'menu-loss-seitai' || 
            Request::segment(1) == 'menu-loss-klasifikasi' || 
            Request::segment(1) == 'menu-loss-kategori' || 
            Request::segment(1) == 'kemasan-box' || 
            Request::segment(1) == 'kemasan-inner' || 
            Request::segment(1) == 'kemasan-layer' || 
            Request::segment(1) == 'kemasan-gaiso' || 
            Request::segment(1) == 'master-produk' ? 'show' : '' }}" role="list"
            id="master-tabel" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'buyer' ? 'active' : '' }}">
                <a class="nav-link" href="/buyer">
                  <span class="sidebar-text">Buyer</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'departemen' ? 'active' : '' }}">
                <a class="nav-link" href="/departemen">
                  <span class="sidebar-text">Departemen</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'karyawan' ? 'active' : '' }}">
                <a class="nav-link" href="/karyawan">
                  <span class="sidebar-text">Karyawan</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'katanuki' ? 'active' : '' }}">
                <a class="nav-link" href="/katanuki">
                  <span class="sidebar-text">Katanuki</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'mesin' ? 'active' : '' }}">
                <a class="nav-link" href="/mesin">
                  <span class="sidebar-text">Mesin</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'warehouse' ? 'active' : '' }}">
                <a class="nav-link" href="/warehouse">
                  <span class="sidebar-text">Warehouse</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'working-shift' ? 'active' : '' }}">
                <a class="nav-link" href="/working-shift">
                  <span class="sidebar-text">Working Shift</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        {{-- <li class="nav-item">
          <span
            class="nav-link {{ Request::segment(1) !== '' ? 'collapsed' : '' }} d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#submenu-app">
            <span>
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                    clip-rule="evenodd"></path>
                </svg></span>
              <span class="sidebar-text">Utility</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == '' ? 'show' : '' }}" role="list"
            id="submenu-app" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == '' ? 'active' : '' }}">
                <a class="nav-link" href="/">
                  <span class="sidebar-text">Backup Database</span>
                </a>
              </li>
            </ul>
          </div>        
        </li> --}}

        <li class="nav-item">
          <span
            class="nav-link {{ Request::segment(1) !== '' ? 'collapsed' : '' }} d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#submenu-app">
            <span>
              <span class="sidebar-icon"><i class="fas fa-user-cog me-2"></i></span>
              <span class="sidebar-text">Administration</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == '' ? 'show' : '' }}" role="list"
            id="submenu-app" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == '' ? 'active' : '' }}">
                <a class="nav-link" href="/">
                  <span class="sidebar-text">Security Management</span>
                </a>
              </li>
            </ul>
          </div>
          {{-- <div class="multi-level collapse {{ Request::segment(1) == '' ? 'show' : '' }}" role="list"
            id="submenu-app" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == '' ? 'active' : '' }}">
                <a class="nav-link" href="/">
                  <span class="sidebar-text">Default Parameter</span>
                </a>
              </li>
            </ul>
          </div> --}}
        </li>

        {{-- <li class="nav-item">
          <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#submenu-pages">
            <span>
              <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                    clip-rule="evenodd"></path>
                  <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                </svg></span>
              <span class="sidebar-text">Page examples</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div class="multi-level collapse" role="list" id="submenu-pages" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('profile-example') }}">
                  <span class="sidebar-text">Profile</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login-example') }}">
                  <span class="sidebar-text">Sign In</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register-example') }}">
                  <span class="sidebar-text">Sign Up</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('forgot-password-example') }}">
                  <span class="sidebar-text">Forgot password</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/reset-password-example">
                  <span class="sidebar-text">Reset password</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/lock">
                  <span class="sidebar-text">Lock</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/404">
                  <span class="sidebar-text">404 Not Found</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/500">
                  <span class="sidebar-text">500 Not Found</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#submenu-components">
            <span>
              <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                  <path fill-rule="evenodd"
                    d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
                </svg></span>
              <span class="sidebar-text">Components</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div
            class="multi-level collapse {{ Request::segment(1) == 'buttons' || Request::segment(1) == 'notifications' || Request::segment(1) == 'forms' || Request::segment(1) == 'modals' || Request::segment(1) == 'typography' ? 'show' : '' }}"
            role="list" id="submenu-components" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'buttons' ? 'active' : '' }}">
                <a class="nav-link" href="/buttons">
                  <span class="sidebar-text">Buttons</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'notifications' ? 'active' : '' }}">
                <a class="nav-link" href="/notifications">
                  <span class="sidebar-text">Notifications</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'forms' ? 'active' : '' }}">
                <a class="nav-link" href="/forms">
                  <span class="sidebar-text">Forms</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'modals' ? 'active' : '' }}">
                <a class="nav-link" href="/modals">
                  <span class="sidebar-text">Modals</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'typography' ? 'active' : '' }}">
                <a class="nav-link" href="/typography">
                  <span class="sidebar-text">Typography</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li> --}}
        {{-- <li class="nav-item">
          <a href="/documentation/getting-started/overview/index.html" target="_blank"
            class="nav-link d-flex align-items-center">
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                  clip-rule="evenodd"></path>
              </svg></span>
            <span class="sidebar-text">Documentation </span> <span><span
                class="badge badge-sm bg-secondary ms-1">v1.0</span></span>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://themesberg.com" target="_blank" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-2">
              <img class="me-2" src="/assets/img/themesberg.svg" height="20" width="20" alt="Themesberg Logo">
            </span>
            <span class="sidebar-text">Themesberg</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://updivision.com" target="_blank" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-2">
              <img class="me-2" src="/assets/img/updivision.png" height="20" width="20" alt="Themesberg Logo">
            </span>
            <span class="sidebar-text">Updivision</span>
          </a>
        </li> --}}      
      </ul>
    @endif
    
    @if(Auth::check() && Auth::user()->status == '1')
      <ul class="nav flex-column pt-3 pt-md-0">
        <li class="nav-item">
          <a href="/dashboard" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-3">
              <img src="/assets/img/brand/logo.jpg" height="20" width="20" alt="Volt Logo">
            </span>
            <span class="mt-1 ms-1 sidebar-text">
              Home
            </span>
          </a>
        </li>
        <li class="nav-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
          <a href="/dashboard" class="nav-link">
            <span class="sidebar-icon"> <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
              </svg></span></span>
            <span class="sidebar-text">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <span
            class="nav-link collapsed d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#data-pegawai">
            <span>
              <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                    clip-rule="evenodd"></path>
                </svg></span>
              <span class="sidebar-text">Data Pegawai</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == 'master-pegawai' ? 'show' : '' }}" role="list" id="data-pegawai" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'master-pegawai' ? 'active' : '' }}">
                <a class="nav-link" href="/master-pegawai">
                  <span class="sidebar-text">Master Pegawai</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <span
            class="nav-link collapsed d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#data-monitoring">
            <span>
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                    clip-rule="evenodd"></path>
                </svg>
              </span>
              <span class="sidebar-text">Data Monitoring</span>
            </span>
            <span class="link-arrow">
              <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
            </span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == 'absensi-pegawai' || Request::segment(1) == 'jadwal-kerja-pegawai' ? 'show' : '' }}" role="list" id="data-monitoring" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'absensi-pegawai' ? 'active' : '' }}">
                <a class="nav-link" href="/absensi-pegawai">
                  <span class="sidebar-text">Absensi Pegawai</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'jadwal-kerja-pegawai' ? 'active' : '' }}">
                <a class="nav-link" href="/jadwal-kerja-pegawai">
                  <span class="sidebar-text">Jadwal Kerja Pegawai</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <span
            class="nav-link collapsed d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#kehadiran-pegawai">
            <span>
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                    clip-rule="evenodd"></path>
                </svg>
              </span>
              <span class="sidebar-text">Kehadiran Pegawai</span>
            </span>
            <span class="link-arrow">
              <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
            </span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == 'pengajuan-kehadiran' || Request::segment(1) == 'daftar-pengajuan' || Request::segment(1) == 'daftar-persetujuan' ? 'show' : '' }}" role="list" id="kehadiran-pegawai" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'pengajuan-kehadiran' ? 'active' : '' }}">
                <a class="nav-link" href="/pengajuan-kehadiran">
                  <span class="sidebar-text">Pengajuan <br> Kehadiran/Cuti</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'daftar-pengajuan' ? 'active' : '' }}">
                <a class="nav-link" href="/daftar-pengajuan">
                  <span class="sidebar-text">Daftar Pengajuan</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'daftar-persetujuan' ? 'active' : '' }}">
                <a class="nav-link" href="/daftar-persetujuan">
                  <span class="sidebar-text">Daftar <br> Persetujuan Pengajuan</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <span
            class="nav-link collapsed d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#lembur-pegawai">
            <span>
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                    clip-rule="evenodd"></path>
                </svg>
              </span>
              <span class="sidebar-text">Lembur Pegawai</span>
            </span>
            <span class="link-arrow">
              <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
            </span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == 'pengajuan-lembur' || Request::segment(1) == 'daftar-persetujuan-lembur' ? 'show' : '' }}" role="list" id="lembur-pegawai" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'pengajuan-lembur' ? 'active' : '' }}">
                <a class="nav-link" href="/pengajuan-lembur">
                  <span class="sidebar-text">Pengajuan Lembur</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'daftar-persetujuan-lembur' ? 'active' : '' }}">
                <a class="nav-link" href="/daftar-persetujuan-lembur">
                  <span class="sidebar-text">Daftar <br> Persetujuan Lembur</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <span
            class="nav-link collapsed d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#transaksi">
            <span>
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                    clip-rule="evenodd"></path>
                </svg>
              </span>
              <span class="sidebar-text">Transaksi</span>
            </span>
            <span class="link-arrow">
              <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
            </span>
          </span>
          <div class="multi-level collapse {{ Request::segment(1) == 'perhitungan-payroll' || Request::segment(1) == 'slip-gaji' ? 'show' : '' }}" role="list" id="transaksi" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::segment(1) == 'perhitungan-payroll' ? 'active' : '' }}">
                <a class="nav-link" href="/perhitungan-payroll">
                  <span class="sidebar-text">Perhitungan Payroll</span>
                </a>
              </li>
              <li class="nav-item {{ Request::segment(1) == 'slip-gaji' ? 'active' : '' }}">
                <a class="nav-link" href="/slip-gaji">
                  <span class="sidebar-text">Slip Gaji</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        
      </ul>
    @endif
  </div>
</nav>