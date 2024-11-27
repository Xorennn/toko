<?php
use App\Http\Controllers\AditController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cek-koneksi-db', function() {
    try{
        DB::connection()->getPdo();
        return "Koneksi berhasil";
    }catch(\Exception $e){
        return "koneksi gagal";
    }
});

route::get('tampil-data',
[AditController::class, 'TampilkanData'])
->name('TampilkanData');

Route::get('tambah-data',
[AditController::class,'TambahData'])
->name('TambahData');

Route::post('tambah-data-action',
[AditController::class,'TambahDataAction'])
->name('TambahDataAction');

route::delete('/hapus-data/{id}',
[AditController::class, 'HapusData'])
->name('HapusData');

// Route::put('/update-data/{id}', 
// [AditController::class, 'updateData'])
// ->name('UpdateData');

Route::get('edit-data/{id}', 
[AditController::class, 'EditData'])
->name('EditData');

Route::put('update-data/{id}', 
[AditController::class, 'UpdateDataAction'])
->name('UpdateDataAction');
