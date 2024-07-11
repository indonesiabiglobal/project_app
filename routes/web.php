<?php

use App\Http\Livewire\AddKenpinController;
use App\Http\Livewire\AddKenpinSeitaiController;
use App\Http\Livewire\AddLossController;
use App\Http\Livewire\AddLpkController;
use App\Http\Livewire\AddNippoController;
use App\Http\Livewire\AddOrder;
use App\Http\Livewire\AddOrderController;
use App\Http\Livewire\AddSeitaiController;
use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\Components\Buttons;
use App\Http\Livewire\Components\Forms;
use App\Http\Livewire\Components\Modals;
use App\Http\Livewire\Components\Notifications;
use App\Http\Livewire\Components\Typography;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Lock;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\BuyerController;
use App\Http\Livewire\CetakLpk;
use App\Http\Livewire\ForgotPasswordExample;
use App\Http\Livewire\Index;
use App\Http\Livewire\CheckListInfure;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\ProfileExample;
use App\Http\Livewire\RegisterExample;
use App\Http\Livewire\OrderLpk;
use App\Http\Livewire\OrderReport;
use App\Http\Livewire\NippoInfure;
use App\Http\Livewire\LabelGentan;
use App\Http\Livewire\NippoSeitai;
use App\Http\Livewire\LossInfure;
use App\Http\Livewire\LossSeitai;
use App\Http\Livewire\MutasiIsiPalet;
use App\Http\Livewire\CheckListSeitai;
use App\Http\Livewire\DepartemenController;
use App\Http\Livewire\DetailReport;
use App\Http\Livewire\EditLossController;
use App\Http\Livewire\EditLpkController;
use App\Http\Livewire\EditNippoController;
use App\Http\Livewire\EditOrderController;
use App\Http\Livewire\EditSeitaiController;
use App\Http\Livewire\GeneralReport;
use App\Http\Livewire\InfureJamKerja;
use App\Http\Livewire\InfureJamKerjaController;
use App\Http\Livewire\JenisProdukController;
use App\Http\Livewire\KaryawanController;
use App\Http\Livewire\KatanukiController;
use App\Http\Livewire\KenpinInfure;
use App\Http\Livewire\KenpinInfureController;
use App\Http\Livewire\KenpinSeitai;
use App\Http\Livewire\KenpinSeitaiController;
use App\Http\Livewire\LabelMasukGudang;
use App\Http\Livewire\LossInfureController;
use App\Http\Livewire\LossKategoriController;
use App\Http\Livewire\LossKlasifikasiController;
use App\Http\Livewire\LossSeitaiController;
use App\Http\Livewire\LpkEntryController;
use App\Http\Livewire\MasterProdukController;
use App\Http\Livewire\MenuLossSeitaiController;
use App\Http\Livewire\MesinController;
use App\Http\Livewire\MutasiIsiPaletController;
use App\Http\Livewire\SumberDayaManusia\MasterPegawai;
use App\Http\Livewire\MutasiIsiPaletKenpin;
use App\Http\Livewire\NippoInfureController;
use App\Http\Livewire\NippoSeitaiController;
use App\Http\Livewire\OrderLpkController;
use App\Http\Livewire\OrderReportController;
use App\Http\Livewire\PenarikanPalet;
use App\Http\Livewire\PenarikanPaletController;
use App\Http\Livewire\PengembalianPalet;
use App\Http\Livewire\PrintLabelGudangKenpin;
use App\Http\Livewire\ReportKenpin;
use App\Http\Livewire\ReportKenpinController;
use App\Http\Livewire\Transactions;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ResetPasswordExample;
use App\Http\Livewire\SearchData;
use App\Http\Livewire\SeitaiJamKerja;
use App\Http\Livewire\SeitaiJamKerjaController;
use App\Http\Livewire\SumberDayaManusia\AbsensiPegawai;
use App\Http\Livewire\SumberDayaManusia\DaftarPengajuan;
use App\Http\Livewire\SumberDayaManusia\DaftarPersetujuan;
use App\Http\Livewire\SumberDayaManusia\DaftarPersetujuanLembur;
use App\Http\Livewire\SumberDayaManusia\JadwalKerjaPegawai;
use App\Http\Livewire\SumberDayaManusia\PengajuanKehadiran;
use App\Http\Livewire\SumberDayaManusia\PengajuanLembur;
use App\Http\Livewire\SumberDayaManusia\PerhitunganPayroll;
use App\Http\Livewire\SumberDayaManusia\SlipGaji;
use App\Http\Livewire\TipeProdukController;
use App\Http\Livewire\UpgradeToPro;
use App\Http\Livewire\Users;
use App\Http\Livewire\WarehouseController;
use App\Http\Livewire\WorkingShiftController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');

Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');
// Route::get('/upgrade-to-pro', UpgradeToPro::class)->name('upgrade-to-pro');

Route::middleware('auth')->group(function () {
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/profile-example', ProfileExample::class)->name('profile-example');
    Route::get('/users', Users::class)->name('users');
    Route::get('/login-example', LoginExample::class)->name('login-example');
    Route::get('/register-example', RegisterExample::class)->name('register-example');
    Route::get('/forgot-password-example', ForgotPasswordExample::class)->name('forgot-password-example');
    Route::get('/reset-password-example', ResetPasswordExample::class)->name('reset-password-example');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/transactions', Transactions::class)->name('transactions');
    Route::get('/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');
    Route::get('/lock', Lock::class)->name('lock');
    Route::get('/buttons', Buttons::class)->name('buttons');
    Route::get('/notifications', Notifications::class)->name('notifications');
    Route::get('/forms', Forms::class)->name('forms');
    Route::get('/modals', Modals::class)->name('modals');
    Route::get('/typography', Typography::class)->name('typography');

    // Fukusuke
    // Route::get('/search-data', SearchData::class)->name('search-data');    
    Route::get('/order-entry', OrderLpkController::class)->name('order-entry');
    Route::get('/edit-order/{orderId}', EditOrderController::class)->name('edit-order');
    Route::get('/add-order', AddOrderController::class)->name('add-order');

    Route::get('/cetak-order', function (Request $request) {
        $processdate = $request->query('processdate');
        $po_no = $request->query('po_no');
        $order_date = $request->query('order_date');
        $code = $request->query('code');
        $name = $request->query('name');
        $dimensi = $request->query('dimensi');
        $order_qty = $request->query('order_qty');
        $stufingdate = $request->query('stufingdate');
        $etddate = $request->query('etddate');
        $etadate = $request->query('etadate');
        $namabuyer = $request->query('namabuyer');
        return view('livewire.order-lpk.cetak-order', compact('processdate','po_no', 'order_date', 'code', 'name', 'dimensi', 'order_qty', 'stufingdate', 'etddate', 'etadate', 'namabuyer'));
    })->name('cetak-order');

    Route::get('/report-gentan', function (Request $request) {
        // $lpk_no = $request->query('lpk_no');
        // $name = $request->query('name');
        // $code = $request->query('code');
        // $product_type_code = $request->query('product_type_code');
        // $production_date = $request->query('production_date');
        // $work_hour = $request->query('work_hour');
        // $work_shift = $request->query('work_shift');
        // $machineno = $request->query('machineno');
        // $berat_produksi = $request->query('berat_produksi');
        // $nomor_han = $request->query('nomor_han');
        // $nik = $request->query('nik');
        // $empname = $request->query('empname');
        // return view('livewire.nippo-infure.report-gentan', compact('lpk_no','name', 'code', 'product_type_code', 'production_date', 'work_hour', 'work_shift', 'machineno', 'berat_produksi', 'nomor_han', 'nik', 'empname'));
        
        $tdpa_id = $request->query('tdpa_id');
        return view('livewire.nippo-infure.report-gentan', compact('tdpa_id'));
    })->name('report-gentan');

    Route::get('/report-lpk', function (Request $request) {
        $lpk_id = $request->query('lpk_id');
        return view('livewire.order-lpk.report-lpk', compact('lpk_id'));
    })->name('report-lpk');

    Route::get('/report-masuk-gudang', function (Request $request) {
        $test = $request->query('test');
        return view('livewire.nippo-seitai.report-masuk-gudang', compact('test'));
    })->name('report-masuk-gudang');

    Route::get('/report-label-gudang', function (Request $request) {
        $test = $request->query('test');
        return view('livewire.kenpin.report-label-gudang', compact('test'));
    })->name('report-label-gudang');

    Route::get('/lpk-entry', LpkEntryController::class)->name('lpk-entry');
    Route::get('/edit-lpk/{orderId}', EditLpkController::class)->name('edit-lpk');
    Route::get('/add-lpk', AddLpkController::class)->name('add-lpk');
    Route::get('/cetak-lpk', CetakLpk::class)->name('cetak-lpk');
    Route::get('/order-report', OrderReportController::class)->name('order-report');
    
    // Nipo Infure
    Route::get('/nippo-infure', NippoInfureController::class)->name('nippo-infure');
    Route::get('/edit-nippo/{orderId}', EditNippoController::class)->name('edit-nippo');
    Route::get('/add-nippo', AddNippoController::class)->name('add-nippo');

    // Loss Infure
    Route::get('/loss-infure', LossInfure::class)->name('loss-infure');
    // Route::get('/edit-loss-infure/{orderId}', EditLossController::class)->name('edit-loss-infure');
    // Route::get('/add-loss-infure', AddLossController::class)->name('add-loss-infure');

    // Nippo Seitai
    Route::get('/nippo-seitai', NippoSeitaiController::class)->name('nippo-seitai');
    Route::get('/add-seitai', AddSeitaiController::class)->name('add-seitai');
    Route::get('/edit-seitai/{orderId}', EditSeitaiController::class)->name('edit-seitai');

    // Loss Seitai
    Route::get('/loss-seitai', LossSeitaiController::class)->name('loss-seitai');
    Route::get('/add-loss', AddSeitaiController::class)->name('add-loss');
    // Route::get('/edit-loss/{orderId}', EditLossController::class)->name('edit-loss');

    Route::get('/checklist-infure', CheckListInfure::class)->name('checklist-infure');
    Route::get('/label-gentan', LabelGentan::class)->name('label-gentan');    
    
    Route::get('/mutasi-isi-palet', MutasiIsiPaletController::class)->name('mutasi-isi-palet');
    Route::get('/check-list-seitai', CheckListSeitai::class)->name('check-list-seitai');
    Route::get('/label-masuk-gudang', LabelMasukGudang::class)->name('label-masuk-gudang');
    Route::get('/infure-jam-kerja', InfureJamKerjaController::class)->name('infure-jam-kerja');
    Route::get('/seitai-jam-kerja', SeitaiJamKerjaController::class)->name('seitai-jam-kerja');

    Route::get('/kenpin-infure', KenpinInfureController::class)->name('kenpin-infure');
    Route::get('/add-kenpin', AddKenpinController::class)->name('add-kenpin');

    Route::get('/kenpin-seitai-kenpin', KenpinSeitaiController::class)->name('kenpin-seitai-kenpin');
    Route::get('/add-kenpin-seitai', AddKenpinSeitaiController::class)->name('add-kenpin-seitai');

    Route::get('/mutasi-isi-palet-kenpin', MutasiIsiPaletKenpin::class)->name('mutasi-isi-palet-kenpin');
    Route::get('/print-label-gudang-kenpin', PrintLabelGudangKenpin::class)->name('print-label-gudang-kenpin');
    Route::get('/report-kenpin', ReportKenpinController::class)->name('report-kenpin');

    Route::get('/penarikan-palet', PenarikanPaletController::class)->name('penarikan-palet');
    Route::get('/pengembalian-palet', PengembalianPalet::class)->name('pengembalian-palet');

    Route::get('/general-report', GeneralReport::class)->name('general-report');
    Route::get('/detail-report', DetailReport::class)->name('detail-report');

    // Master Tabel
    Route::get('/buyer', BuyerController::class)->name('buyer');
    Route::get('/master-produk', MasterProdukController::class)->name('master-produk');
    Route::get('/tipe-produk', TipeProdukController::class)->name('tipe-produk');
    Route::get('/jenis-produk', JenisProdukController::class)->name('jenis-produk');
    Route::get('/departemen', DepartemenController::class)->name('departemen');
    Route::get('/karyawan', KaryawanController::class)->name('karyawan');
    Route::get('/katanuki', KatanukiController::class)->name('katanuki');
    Route::get('/mesin', MesinController::class)->name('mesin');
    Route::get('/warehouse', WarehouseController::class)->name('warehouse');
    Route::get('/working-shift', WorkingShiftController::class)->name('working-shift');
    Route::get('/menu-loss-infure', LossInfureController::class)->name('menu-loss-infure');
    Route::get('/menu-loss-seitai', MenuLossSeitaiController::class)->name('menu-loss-seitai');
    Route::get('/menu-loss-klasifikasi', LossKlasifikasiController::class)->name('menu-loss-klasifikasi');
    Route::get('/menu-loss-kategori', LossKategoriController::class)->name('menu-loss-kategori');

    // SDM
    Route::get('/master-pegawai', MasterPegawai::class)->name('master-pegawai');
    Route::get('/absensi-pegawai', AbsensiPegawai::class)->name('absensi-pegawai');
    Route::get('/jadwal-kerja-pegawai', JadwalKerjaPegawai::class)->name('jadwal-kerja-pegawai');

    Route::get('/pengajuan-kehadiran', PengajuanKehadiran::class)->name('pengajuan-kehadiran');
    Route::get('/daftar-pengajuan', DaftarPengajuan::class)->name('daftar-pengajuan');
    Route::get('/daftar-persetujuan', DaftarPersetujuan::class)->name('daftar-persetujuan');

    Route::get('/pengajuan-lembur', PengajuanLembur::class)->name('daftar-persetujuan-lembur');
    Route::get('/daftar-persetujuan-lembur', DaftarPersetujuanLembur::class)->name('daftar-persetujuan-lembur');

    Route::get('/perhitungan-payroll', PerhitunganPayroll::class)->name('perhitungan-payroll');
    Route::get('/slip-gaji', SlipGaji::class)->name('slip-gaji');

});

