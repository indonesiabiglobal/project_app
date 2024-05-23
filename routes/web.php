<?php

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
use App\Http\Livewire\CetakLpk;
use App\Http\Livewire\ForgotPasswordExample;
use App\Http\Livewire\Index;
use App\Http\Livewire\CheckListInfure;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\LpkEntry;
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
use App\Http\Livewire\DetailReport;
use App\Http\Livewire\GeneralReport;
use App\Http\Livewire\InfureJamKerja;
use App\Http\Livewire\KenpinInfure;
use App\Http\Livewire\KenpinSeitai;
use App\Http\Livewire\LabelMasukGudang;
use App\Http\Livewire\SumberDayaManusia\MasterPegawai;
use App\Http\Livewire\MutasiIsiPaletKenpin;
use App\Http\Livewire\PenarikanPalet;
use App\Http\Livewire\PengembalianPalet;
use App\Http\Livewire\PrintLabelGudangKenpin;
use App\Http\Livewire\ReportKenpin;
use App\Http\Livewire\Transactions;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ResetPasswordExample;
use App\Http\Livewire\SeitaiJamKerja;
use App\Http\Livewire\SumberDayaManusia\AbsensiPegawai;
use App\Http\Livewire\SumberDayaManusia\DaftarPengajuan;
use App\Http\Livewire\SumberDayaManusia\DaftarPersetujuan;
use App\Http\Livewire\SumberDayaManusia\DaftarPersetujuanLembur;
use App\Http\Livewire\SumberDayaManusia\JadwalKerjaPegawai;
use App\Http\Livewire\SumberDayaManusia\PengajuanKehadiran;
use App\Http\Livewire\SumberDayaManusia\PengajuanLembur;
use App\Http\Livewire\SumberDayaManusia\PerhitunganPayroll;
use App\Http\Livewire\SumberDayaManusia\SlipGaji;
use App\Http\Livewire\UpgradeToPro;
use App\Http\Livewire\Users;

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
Route::get('/upgrade-to-pro', UpgradeToPro::class)->name('upgrade-to-pro');

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
    Route::get('/order-entry', OrderLpk::class)->name('order-entry');
    Route::get('/lpk-entry', LpkEntry::class)->name('lpk-entry');
    Route::get('/cetak-lpk', CetakLpk::class)->name('cetak-lpk');
    Route::get('/order-report', OrderReport::class)->name('order-report');
    Route::get('/nippo-infure', NippoInfure::class)->name('nippo-infure');
    Route::get('/loss-infure', LossInfure::class)->name('loss-infure');
    Route::get('/checklist-infure', CheckListInfure::class)->name('checklist-infure');
    Route::get('/label-gentan', LabelGentan::class)->name('label-gentan');
    Route::get('/nippo-seitai', NippoSeitai::class)->name('nippo-seitai');
    Route::get('/loss-seitai', LossSeitai::class)->name('loss-seitai');
    Route::get('/mutasi-isi-palet', MutasiIsiPalet::class)->name('mutasi-isi-palet');
    Route::get('/check-list-seitai', CheckListSeitai::class)->name('check-list-seitai');
    Route::get('/label-masuk-gudang', LabelMasukGudang::class)->name('label-masuk-gudang');
    Route::get('/infure-jam-kerja', InfureJamKerja::class)->name('infure-jam-kerja');
    Route::get('/seitai-jam-kerja', SeitaiJamKerja::class)->name('seitai-jam-kerja');

    Route::get('/kenpin-infure-kenpin', KenpinInfure::class)->name('kenpin-infure-kenpin');
    Route::get('/kenpin-seitai-kenpin', KenpinSeitai::class)->name('kenpin-seitai-kenpin');
    Route::get('/mutasi-isi-palet-kenpin', MutasiIsiPaletKenpin::class)->name('mutasi-isi-palet-kenpin');
    Route::get('/print-label-gudang-kenpin', PrintLabelGudangKenpin::class)->name('print-label-gudang-kenpin');
    Route::get('/report-kenpin', ReportKenpin::class)->name('report-kenpin');

    Route::get('/penarikan-palet', PenarikanPalet::class)->name('penarikan-palet');
    Route::get('/pengembalian-palet', PengembalianPalet::class)->name('pengembalian-palet');

    Route::get('/general-report', GeneralReport::class)->name('general-report');
    Route::get('/detail-report', DetailReport::class)->name('detail-report');

    // SDM
    Route::get('/master-pegawai', MasterPegawai::class)->name('master-pegawai');
    Route::get('/absensi-pegawai', AbsensiPegawai::class)->name('absensi-pegawai');
    Route::get('/jadwal-kerja-pegawai', JadwalKerjaPegawai::class)->name('jadwal-kerja-pegawai');

    Route::get('/pengajuan-kehadiran', PengajuanKehadiran::class)->name('pengajuan-kehadiran');
    Route::get('/daftar-pengajuan', DaftarPengajuan::class)->name('daftar-pengajuan');
    Route::get('/daftar-persetujuan', DaftarPersetujuan::class)->name('daftar-persetujuan');

    Route::get('/pengajuan-lembur', PengajuanLembur::class)->name('nippo-infure');
    Route::get('/daftar-persetujuan-lembur', DaftarPersetujuanLembur::class)->name('nippo-infure');

    Route::get('/perhitungan-payroll', PerhitunganPayroll::class)->name('perhitungan-payroll');
    Route::get('/slip-gaji', SlipGaji::class)->name('slip-gaji');

});

