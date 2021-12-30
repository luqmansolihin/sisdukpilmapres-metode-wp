<?php

use App\Models\User;
use App\Models\Hasil;
use App\Models\Mahasiswa;
use Illuminate\Support\Arr;
use App\Models\TahunSeleksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HasilSeleksiController;
use App\Http\Controllers\TahunSeleksiController;
use App\Http\Controllers\HitungSeleksiController;
use App\Http\Controllers\GagasanKreatifController;
use App\Http\Controllers\ManajemenAdminController;
use App\Http\Controllers\ManajemenDosenController;
use App\Http\Controllers\ProdukInovatifController;
use App\Http\Controllers\CapaianUnggulanController;
use App\Http\Controllers\DataGagasanKreatifController;
use App\Http\Controllers\DataProdukInovatifController;
use App\Http\Controllers\ManajemenMahasiswaController;
use App\Http\Controllers\DataCapaianUnggulanController;
use App\Http\Controllers\PenilaianGagasanKreatifController;
use App\Http\Controllers\PenilaianProdukInovatifController;
use App\Http\Controllers\PenilaianCapaianUnggulanController;

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

// Route Front End
Route::get('/', function () {
    if (Auth::user()) {
        return view('beranda', [
            'title' => 'Beranda',
            'user'  => User::find(Auth::user()->id)
        ]);
    }

    return view('beranda', [
        'title' => 'Beranda',
    ]);
});

Route::get('/alur', function () {
    if (Auth::user()) {
        return view('alur', [
            'title' => 'Alur',
            'user'  => User::find(Auth::user()->id)
        ]);
    }

    return view('alur', [
        'title' => 'Alur',
    ]);
});

Route::get('/tentang', function () {
    if (Auth::user()) {
        return view('tentang', [
            'title' => 'Tentang',
            'user'  => User::find(Auth::user()->id)
        ]);
    }

    return view('tentang', [
        'title' => 'Tentang',
    ]);
});

Route::get('/hasil', function () {
    $tahun_seleksi = TahunSeleksi::orderBy('tahun_akademik', 'desc')->take(1)->get();

    if (Auth::user()) {
        if (!empty($tahun_seleksi[0])) {
            $mahasiswa_sarjanas = Mahasiswa::select('id')->where('program_pendidikan', 'Sarjana')->get();

            $mahasiswa_diplomas = Mahasiswa::select('id')->where('program_pendidikan', 'Diploma')->get();

            $hasil_sarjanas = Hasil::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->whereIn('mahasiswa_id', Arr::pluck($mahasiswa_sarjanas, 'id'))->orderBy('rangking', 'asc')->get();

            $hasil_diplomas = Hasil::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->whereIn('mahasiswa_id', Arr::pluck($mahasiswa_diplomas, 'id'))->orderBy('rangking', 'asc')->get();

            if (!empty($hasil_sarjanas[0]) && !empty($hasil_diplomas[0])) {
                return view('hasil', [
                    'title'             => 'Hasil Seleksi',
                    'user'              => User::find(Auth::user()->id),
                    'hasil_sarjanas'    => $hasil_sarjanas,
                    'hasil_diplomas'    => $hasil_diplomas
                ]);
            } elseif (!empty($hasil_sarjanas[0]) && empty($hasil_diplomas[0])) {
                return view('hasil', [
                    'title'             => 'Hasil Seleksi',
                    'user'              => User::find(Auth::user()->id),
                    'hasil_sarjanas'    => $hasil_sarjanas,
                    'hasil_diplomas'    => ''
                ]);
            } elseif (empty($hasil_sarjanas[0]) && !empty($hasil_diplomas[0])) {
                return view('hasil', [
                    'title'             => 'Hasil Seleksi',
                    'user'              => User::find(Auth::user()->id),
                    'hasil_sarjanas'    => '',
                    'hasil_diplomas'    => $hasil_diplomas
                ]);
            } elseif (empty($hasil_sarjanas[0]) && empty($hasil_diplomas[0])) {
                return view('hasil', [
                    'title'             => 'Hasil Seleksi',
                    'user'              => User::find(Auth::user()->id),
                    'hasil_sarjanas'    => '',
                    'hasil_diplomas'    => ''
                ]);
            }
        }
        return view('hasil', [
            'title'             => 'Hasil Seleksi',
            'user'              => User::find(Auth::user()->id),
            'hasil_sarjanas'    => '',
            'hasil_diplomas'    => ''
        ]);
    } else {
        if (!empty($tahun_seleksi[0])) {
            $mahasiswa_sarjanas = Mahasiswa::select('id')->where('program_pendidikan', 'Sarjana')->get();

            $mahasiswa_diplomas = Mahasiswa::select('id')->where('program_pendidikan', 'Diploma')->get();

            $hasil_sarjanas = Hasil::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->whereIn('mahasiswa_id', Arr::pluck($mahasiswa_sarjanas, 'id'))->orderBy('rangking', 'asc')->get();

            $hasil_diplomas = Hasil::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->whereIn('mahasiswa_id', Arr::pluck($mahasiswa_diplomas, 'id'))->orderBy('rangking', 'asc')->get();

            if (!empty($hasil_sarjanas[0]) && !empty($hasil_diplomas[0])) {
                return view('hasil', [
                    'title'             => 'Hasil Seleksi',
                    'hasil_sarjanas'    => $hasil_sarjanas,
                    'hasil_diplomas'    => $hasil_diplomas
                ]);
            } elseif (!empty($hasil_sarjanas[0]) && empty($hasil_diplomas[0])) {
                return view('hasil', [
                    'title'             => 'Hasil Seleksi',
                    'hasil_sarjanas'    => $hasil_sarjanas,
                    'hasil_diplomas'    => ''
                ]);
            } elseif (empty($hasil_sarjanas[0]) && !empty($hasil_diplomas[0])) {
                return view('hasil', [
                    'title'             => 'Hasil Seleksi',
                    'hasil_sarjanas'    => '',
                    'hasil_diplomas'    => $hasil_diplomas
                ]);
            } elseif (empty($hasil_sarjanas[0]) && empty($hasil_diplomas[0])) {
                return view('hasil', [
                    'title'             => 'Hasil Seleksi',
                    'hasil_sarjanas'    => '',
                    'hasil_diplomas'    => ''
                ]);
            }
        }
        return view('hasil', [
            'title'             => 'Hasil Seleksi',
            'hasil_sarjanas'    => '',
            'hasil_diplomas'    => ''
        ]);
    }
});

// Route Register
Route::get('/register-dosen', [RegisterController::class, 'createDosen'])->middleware('guest');
Route::get('/register-mahasiswa', [RegisterController::class, 'createMahasiswa'])->middleware('guest');
Route::post('/register-dosen', [RegisterController::class, 'storeDosen'])->middleware('guest');
Route::post('/register-mahasiswa', [RegisterController::class, 'storeMahasiswa'])->middleware('guest');

// Route Verify Email
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'emailVerificationHandler'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify', [AuthController::class, 'emailVerificationNotice'])->middleware('auth')->name('verification.notice');
Route::post('/email/verification-notification', [AuthController::class, 'resendVerificationEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route Forgot Password
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetPasswordEmail'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'passwordResetToken'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('guest')->name('password.update');

// Route Login & Logout
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Route Back End Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard',
        'user' => User::find(Auth::user()->id)
    ]);
})->middleware(['auth', 'verified', 'status:aktif', 'role:admin,dosen,juri,mahasiswa']);

// Route Back End Profil
Route::resource('/profil', ProfilController::class)->only(['edit', 'update', 'show'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin,dosen,juri,mahasiswa']);

//Route Back End Ubah Password
Route::get('/ubah-password', [PasswordController::class, 'editPassword'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin,dosen,juri,mahasiswa']);
Route::post('/ubah-password', [PasswordController::class, 'updatePassword'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin,dosen,juri,mahasiswa']);

// Route Back End Manajemen Admin
Route::resource('/dashboard/manajemen-admin', ManajemenAdminController::class)->middleware(['auth', 'verified', 'status:aktif', 'role:admin']);

// Route Back End Manajemen Dosen
Route::resource('/dashboard/manajemen-dosen', ManajemenDosenController::class)->middleware(['auth', 'verified', 'status:aktif', 'role:admin']);

// Route Back End Manajemen Mahasiswa
Route::resource('/dashboard/manajemen-mahasiswa', ManajemenMahasiswaController::class)->middleware(['auth', 'verified', 'status:aktif', 'role:admin']);

// Route Back End Tahun Seleksi Role Admin
Route::resource('/dashboard/tahun-seleksi', TahunSeleksiController::class)->middleware(['auth', 'verified', 'status:aktif', 'role:admin']);

// Route Back End Bobot Kriteria Role Admin
Route::get('/dashboard/kriteria', [KriteriaController::class, 'show'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin']);
Route::get('/dashboard/kriteria/edit', [KriteriaController::class, 'edit'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin']);
Route::post('/dashboard/kriteria/edit', [KriteriaController::class, 'update'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin']);

// Route Back End Data Prestasi Role Mahasiswa
Route::resource('/dashboard/prestasi/capaian-unggulan', CapaianUnggulanController::class)->middleware(['auth', 'verified', 'status:aktif', 'role:mahasiswa']);
Route::resource('/dashboard/prestasi/gagasan-kreatif', GagasanKreatifController::class)->except('show')->middleware(['auth', 'verified', 'status:aktif', 'role:mahasiswa']);
Route::resource('/dashboard/prestasi/produk-inovatif', ProdukInovatifController::class)->except('show')->middleware(['auth', 'verified', 'status:aktif', 'role:mahasiswa']);

// Route Back End Penilaian Prestasi Role Juri
Route::resource('/dashboard/prestasi/penilaian/capaian-unggulan', PenilaianCapaianUnggulanController::class)->only(['index', 'edit', 'update'])->middleware(['auth', 'verified', 'status:aktif', 'role:juri']);
Route::resource('/dashboard/prestasi/penilaian/gagasan-kreatif', PenilaianGagasanKreatifController::class)->only(['index', 'edit', 'update'])->middleware(['auth', 'verified', 'status:aktif', 'role:juri']);
Route::resource('/dashboard/prestasi/penilaian/produk-inovatif', PenilaianProdukInovatifController::class)->only(['index', 'edit', 'update'])->middleware(['auth', 'verified', 'status:aktif', 'role:juri']);

// Route Back End Data Prestasi Role Admin dan Juri
Route::resource('/dashboard/data-prestasi/capaian-unggulan', DataCapaianUnggulanController::class)->only(['index', 'show'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin,dosen']);
Route::resource('/dashboard/data-prestasi/gagasan-kreatif', DataGagasanKreatifController::class)->only(['index', 'show'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin,dosen']);
Route::resource('/dashboard/data-prestasi/produk-inovatif', DataProdukInovatifController::class)->only(['index', 'show'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin,dosen']);

// Route Back End Hitung Seleksi
Route::get('/dashboard/hitung-seleksi', [HitungSeleksiController::class, 'index'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin']);
Route::get('/dashboard/hitung-seleksi/show', [HitungSeleksiController::class, 'show'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin']);
Route::post('/dashboard/hitung-seleksi', [HitungSeleksiController::class, 'store'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin']);

// Route Back End Hasil Seleksi
Route::get('/dashboard/hasil-seleksi', [HasilSeleksiController::class, 'index'])->middleware(['auth', 'verified', 'status:aktif', 'role:admin,dosen,mahasiswa']);
