<?php

use App\Http\Controllers\AllController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TeamController;
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

//front
Route::get('/', [AllController::class, 'home'])->name("home");
Route::get('/rooms', [AllController::class, 'rooms'])->name("rooms");
Route::get('/team', [AllController::class, 'team'])->name("team");
Route::get('/gallery', [AllController::class, 'gallery'])->name("gallery.all");
Route::get('/contact', [AllController::class, 'contact'])->name("contact");
Route::get('/blog', [AllController::class, 'blog'])->name("blog");

Route::get('/pages/{id}/BlogPost', [AllController::class,"blogPost"])->name('blogLast');
// fonction recherche
Route::post('/search', [AllController::class, "search"])->name('search');
// categorie id
Route::get('/pages/{id}/CategorieId', [AllController::class,"searchCategorie"])->name('blogCategorie');
// //last par id
// Route::get('/pages/{id}/LastId', [FrontController::class,"tagCategorie"])->name('blogLast');
//tag id
Route::get('/pages/{id}/TAGId', [ALlController::class,"tagCategorie"])->name('tagCategorie');


// store pour le formulaire commentaire
Route::post("/{id}/commentaires", [CommentController::class,"store"]);
Route::delete("/comments/{id}/delete", [CommentController::class, "destroy"]);
Route::get("/comments/{id}/edit", [CommentController::class, "edit"]);
Route::put("/comments/{id}/update", [CommentController::class, "update"]);



Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/room', function () {
    return view('admin.room.index');
})->middleware(['auth'])->name('room.index');

// Route::get('/dashboard/staff', function () {
//     return view('admin.staff.index');
// })->middleware(['auth'])->name('staff.index');

Route::get('/dashboard/blog', function () {
    return view('admin.blog.index');
})->middleware(['auth'])->name('blog.index');

// Route::get('/dashboard/gallery', function () {
//     return view('admin.gallery.index');
// })->middleware(['auth'])->name('gallery.index');


Route::get('/dashboard/contact', function () {
    return view('admin.contact.index');
})->middleware(['auth'])->name('contact.index');


// gallery admin
Route::resource('/dashboard/gallery', GalleryController::class);

// comments admin
Route::resource('/dashboard/comment', CommentController::class);

// team admin
Route::resource('/dashboard/team', TeamController::class);

// contact admin
Route::resource('/dashboard/contact', ContactController::class);

// blog admin
Route::resource('/dashboard/blog', BlogController::class);


require __DIR__.'/auth.php';
