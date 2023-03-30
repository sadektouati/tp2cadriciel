<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MonArticleController;
use App\Http\Controllers\FileController;

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

// dd(App::currentLocale());

Route::get('/langue/{locale}', [LangueController::class, 'index'])->name('langue');


Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::get('/fichiers', [FileController::class, 'index'])->name('files');
    Route::get('/fichier', [FileController::class, 'create'])->name('create-file');
    Route::post('/fichier', [FileController::class, 'store'])->name('insert-file');
    Route::get('/fichier/{file}', [FileController::class, 'show'])->name('file');
    Route::get('/fichier/supprimer/{file}', [FileController::class, 'destroy'])->name('delete-file');

    Route::get('/mes-articles', [MonArticleController::class, 'index'])->name('my-articles');
    Route::get('/mon-article/{article?}', [MonArticleController::class, 'create'])->name('my-article');
    Route::post('/mon-article/{article?}', [MonArticleController::class, 'store'])->name('insert-article');
    Route::get('/mon-article/supprimer/{article?}', [MonArticleController::class, 'destroy'])->name('delete-article');

    Route::get('/', [ArticleController::class, 'index'])->name('home');
    Route::get('/article/{article?}', [ArticleController::class, 'show'])->name('article');


    Route::get('/etudiant', [EtudiantController::class, 'index'])->name('students');

    Route::get('/nouveau', [EtudiantController::class, 'create'])->name('new');
    Route::post('/nouveau', [EtudiantController::class, 'store'])->name('insert');

    Route::get('/etudiant/{etudiant}/modifier', [EtudiantController::class, 'edit'])->name('edit');
    Route::post('/etudiant/{etudiant}/modifier', [EtudiantController::class, 'update'])->name('update');
    Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('show');
    Route::get('/etudiant/{etudiant}/supprimer', [EtudiantController::class, 'destroy'])->name('destroy');

});

Auth::routes();