<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\JemaahController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('beranda', [
        "title" => "Beranda"
    ]);
});

// Route::get('/keagenan', function () {
//     return view('keagenan', [
//         "title" => "Keagenan"
//     ]);
// });
Route::resource('profil', ProfilController::class);

Route::resource('agent', AgentController::class);
Route::resource('jemaah', JemaahController::class);
Route::get('inputdatajemaah', [JemaahController::class, 'create']);
Route::get('editdatajemaah/{id}', [JemaahController::class, 'edit']);
Route::post('update/{id}', [JemaahController::class, 'update']);
Route::get('delete/{id}', [JemaahController::class, 'destroy']);