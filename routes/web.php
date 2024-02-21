<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MultipleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CheckRoleController;
use App\Http\Controllers\ManajemenBankSoalController;
use App\Http\Controllers\ManajemenMateriController;
use App\Http\Controllers\manajemenTugasController;
use App\Http\Controllers\ManajemenUjianController;
use App\Http\Controllers\MasterKelasController;
use App\Http\Controllers\MasterMapel;
use App\Http\Controllers\MasterMapelController;
use App\Http\Controllers\MasterPendidikController;
use App\Http\Controllers\MasterSiswaController;
use App\Http\Controllers\MateriSiswaController;
use App\Http\Controllers\MultipleExcelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/login');
});

Route::get('/tes', function () {
    echo asset('storage/file.txt');
});

// Profile
Route::put('/profilestore/{id}', [UserController::class, 'storeProfile'])->name('store.profile');

// Route Halaman Confirm Role
// Login And 
Route::get('/login', [ViewController::class, 'login'])->name('login-index');
Route::post('/login.store', [LoginController::class, 'store']);
// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name('register.create');

Route::group(['middleware' => 'role', 'prefix' => 'guru'], function () {
    Route::get('/profile-settings/{id}', [UserController::class, 'settingProfileGuru'])->name('profile.guru');
    Route::get('/home', [UserController::class, 'indexGuru'])->name('home.guru');
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dashboard.guru');
    //
    Route::get('/jenissoal', [ManajemenUjianController::class, 'lihatSoalUjian'])->name('lihat-soal');
    // Pilihan Ganda
    Route::get('/soal-pilgan', [ManajemenUjianController::class, 'soalPilgan'])->name('soal-pilgan');
    Route::get('/tambah-soal-pilgan', [ManajemenUjianController::class, 'createSoalPilgan'])->name('create.soal-pilgan');
    Route::get('/uploadsoal', [ManajemenUjianController::class, 'uploadSoalPilgan'])->name('upload-pilgan');
    // Essay
    Route::get('/soal-essay', [ManajemenUjianController::class, 'soalEssay'])->name('soal-essay');
    Route::get('/tambah-soal-essay', [ManajemenUjianController::class, 'createSoalEssay'])->name('create.soal-essay');
    Route::get('/uploadsoal', [ManajemenUjianController::class, 'uploadSoalEssay'])->name('upload-essay');
    Route::resource('ManajemenUjian', ManajemenUjianController::class)->only(['index']);
    // Bank Soal Pilgan
    Route::get('/bank-soal-pilgan', [ManajemenBankSoalController::class, 'manajemenBankSoalPilgan'])->name('bank-soal-pilgan');
    Route::get('/tambahbanksoalpilgan', [ManajemenBankSoalController::class, 'createBankSoalPilgan'])->name('create.bankSoalPilgan');
    Route::get('/uploadbanksoalpilgan', [ManajemenBankSoalController::class, 'uploadBankSoalPilgan'])->name('upload-bank-soal-pilgan');
    // Bank Soal Essay
    Route::get('/bank-soal-essay', [ManajemenBankSoalController::class, 'manajemenBankSoalEssay'])->name('bank-soal-essay');
    Route::get('/tambahbanksoalessay', [ManajemenBankSoalController::class, 'createBankSoalEssay'])->name('create.bankSoalEssay');
    Route::get('/uploadbanksoalessay', [ManajemenBankSoalController::class, 'uploadBankSoalEssay'])->name('upload-bank-soal-essay');

    // !!
    Route::get('/manajemen-tugas', [manajemenTugasController::class, 'halMateriTugas'])->name('manajemen-tugas');
    // !! Beri nilai Tugas
    Route::get('/penilaian-tugas/{id}', [manajemenTugasController::class, 'penilaianTugas'])->name('penilaian-tugas');
    Route::put('/nilai/{id}', [manajemenTugasController::class, 'penilaian'])->name('penilaian.store');
    Route::delete('/hapusTugas/{id}', [manajemenTugasController::class, 'destroy'])->name('hapus-tugas');
    Route::get('/tambah-topikujian', [ViewController::class, 'tambahTopikUjian'])->name('tambah-topikujian');
    // Manage file upload and download
    Route::get('filemateri/{id}', [SubjectController::class, 'getFile'])->name('getFileMateri');
    // Subjects
    Route::get('tambah-materi', [SubjectController::class, 'popUpIndex'])->name('subjects.index.tambah.materi');
    Route::get('showDataKelasGuru', [SubjectController::class, 'showDataKelasGuru'])->name('show.data-kelas-guru');
    Route::resource('subjects', SubjectController::class);
    // Edit Subject
    Route::get('editMateri/{id}', [SubjectController::class, 'editAfter'])->name('edit-materi-after');
    // Import Excel
    Route::post('/import-soal', [MultipleController::class, 'import'])->name('import-soal-pilgan');
    // Export Excel
    Route::get('/contoh-soal-pilgan', [MultipleController::class, 'export'])->name('download-pilgan');
    Route::resource('multiples', MultipleController::class)->only(['store', 'index']);
});

Route::get('/confirmStatus', [UserController::class, 'confirmStatus'])->name('reg.confirm.status');
Route::post('/confirm', [UserController::class, 'storeConfirmStatus'])->name('store.confirm.status');

// ! Route Admin
Route::group(['middleware' => 'role', 'prefix' => 'admin'], function () {
    Route::get('/profile-settings/{id}', [UserController::class, 'settingProfileAdmin'])->name('profile.admin');
    Route::get('/home', [UserController::class, 'indexAdmin'])->name('home.admin');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard.admin');
    // Tambah Siwa Pada Menu Master Kelas
    Route::get('/tambahsiswa/kelas/{id}', [MasterKelasController::class, 'showTambahSiswa'])->name('show.tambah-siswa');
    Route::post('/tambahSiswa/{id}', [MasterKelasController::class, 'storeTambahSiswa'])->name('store.tambah-siswa');
    // Bagian Confirm Status
    Route::get('/tambahmasterkelas-stepsatu', [MasterKelasController::class, 'createToKelasLesson'])->name('step-dua');
    Route::post('/create-stepdua', [MasterKelasController::class, 'storeToKelasLesson'])->name('storeToKelasLesson');
    // Bagian tentukan guru ke lesson column FK teacher_id
    Route::get('/tentukanGuru/{id}', [MasterMapelController::class, 'createTeacherToLesson'])->name('tentukan-mapel');
    Route::post('/storeguru', [MasterMapelController::class, 'storeTeacherToLesson'])->name('store.teacherToLesson');
    Route::resource('MasterSiswa', MasterSiswaController::class)->only(['index', 'show']);
    Route::resource('MasterPendidik', MasterPendidikController::class)->only(['index', 'show']);
    Route::resource('MasterKelas', MasterKelasController::class)->except(['show', 'edit', 'update']);
    Route::resource('MasterMapel', MasterMapelController::class)->except(['show', 'edit']);
});


// Siswa
Route::group(['middleware' => 'role', 'prefix' => 'siswa'], function () {

    Route::get('/home', [UserController::class, 'indexSiswa'])->name('home.siswa');
    Route::get('/dashboard', [StudentController::class, 'dashboardSiswa'])->name('dashboard.siswa');
    Route::resource('students', StudentController::class);
    Route::resource('MateriSiswa', MateriSiswaController::class);
    Route::get('/materi', [ViewController::class, 'materiSiswa'])->name('materi-siswa');
    Route::get('/hasilTugas/{id}', [manajemenTugasController::class, 'getHasilTugas'])->name('getHasilTugas');
    // -- Menu pilihan ujian siswa
    Route::get('/pilihan-materi/{id}', [ViewController::class, 'pilihanMateri'])->name('pilihan-materi');
    Route::post('/kumpultugas', [ViewController::class, 'storePilihanMateri'])->name('store.pilihan-materi');
    Route::get('/filetugas/{id}', [ViewController::class, 'getFileTugas'])->name('getFileTugas');
    // Route::get('/oke', [ViewController::class,'oke'])->name('ok');
    Route::get('deleteTugas/{id}', [ViewController::class, 'deleteTugas'])->name('delete.data-tugas');
});

// Log Out
Route::get('/keluar', [LoginController::class, 'keluar'])->name('keluar');
