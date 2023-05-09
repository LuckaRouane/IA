<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['gzip'])->group(function(){
    
    //FrontOffice
    Route::get('/', [FrontController::class, 'welcome'])->name('welcome');
    Route::get('/categories', [FrontController::class, 'listCategorie'])->name('front_categories');
    Route::get('/articles', [FrontController::class, 'listArticle'])->name('front_articles');
    Route::get('/article/fiche/{idarticle}/{titre}', [FrontController::class, 'ficheArticle'])->name('front_fiche_article');

    //BackOffice
    Route::get('/admin', [AdminController::class, 'toAcceuil'])->name('admin_acceuil');
    Route::post('/admin', [LoginController::class, 'log'])->name('admin_log');
    Route::get('/admin/deconnect', [AdminController::class, 'deconnect'])->name('admin_deconnect');
    Route::get('admin/categorie/form', [CategorieController::class, 'toForm'])->name('admin_categorie_form');
    Route::post('admin/categorie/save', [CategorieController::class, 'save'])->name('admin_categorie_save');
    Route::get('/admin/categorie/list', [CategorieController::class, 'listBO'])->name('admin_categorie_list');
    Route::get('/admin/categorie/toupdate/{idcategorie}-{titre}', [CategorieController::class, 'toupdate'])->name('admin_categorie_toupdate');
    Route::post('/admin/categorie/update', [CategorieController::class, 'update'])->name('admin_categorie_update');
    Route::get('/admin/article/form', [ArticleController::class,'toForm'])->name('article_form');
    Route::post('/admin/article/save', [ArticleController::class,'save'])->name('article_save');
    Route::get('/admin/article',[ArticleController::class, 'toList'])->name('article_list');
    Route::post('/admin/article/update',[ArticleController::class, 'update'])->name('article_update');
    Route::get('/admin/article/update/form/{idarticle}-{titre}',[ArticleController::class, 'updateForm'])->name('article_update_form');
    
});

