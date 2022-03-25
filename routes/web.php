<?php

use App\Http\Controllers\AllController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VideoController;
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

//reserv room
Route::get('/pages/BOOK/BookRoom', [FrontController::class, "reservRoom"])->name('reservRoom');
Route::get('/pages/RoomsList', [AllController::class, "roomslist"])->name('roomslist');

//video controller
Route::get('/dashboard/videos', [AllController::class, "videosDisplay"])->middleware(["auth"])->name('video.index');
// // edit
route::get("/admin/video/videos/{video}/editindexvideo",[VideoController::class,"edit"])->name("video.edit");
Route::put('/dashboard/video/update', [VideoController::class, "update"])->middleware(["auth"])->name('video.update');

//carousel
Route::get('/dashboard/carousel', [CarouselController::class, "affichage"])->middleware(["auth"])->name('carousel.index');
// edit
route::get("/admin/home/carousel/{carousel}/editindexcarousel", [CarouselController::class, "edit"])->name("carousel.edit");

//reservation
Route::get('/dashboard/reservation', [ReservationController::class, "index"])->middleware(["auth"])->name('reservation.index');
Route::get('/dashboard/reservation/{id}/validate', [ReservationController::class, "update"])->middleware(["auth"])->name('reservation.update');
Route::post("/reservation", [ReservationController::class, 'store'])->name('reservation.store');

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

// ROOM crud
// store
route::post("/admin/chambre/room/stores", [RoomController::class, "store"])->name("rooms.store");
// create
route::get("/admin/room/chambre/creates", [RoomController::class, "create"])->name("rooms.create");
// edit
route::get("/admin/room/chambre/{rooms}/editindex", [RoomController::class, "edit"])->name("rooms.edit");
// update
route::put("/admin/chambre/room/{rooms}/updateindex", [RoomController::class, "update"])->name("rooms.update");
//affichage
Route::get('/dashboard/roomss', [RoomController::class, "affichage"])->middleware(["auth"])->name('room.index');
// destroy
Route::delete('/admin/chambre/room/{rooms}/deleteRoom', [RoomController::class, "destroy"])->name("rooms.destroy");




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
Route::post('/mail/test/contact', [ContactController::class,"store"])->name('contact.store');

// contact crud
// edit
route::get("/admin/contacts/info/{info}/editindex",[ContactController::class,"edit"])->name("contacts.edit");
// update
route::put("/admin/contacts/info/{info}/updateindex",[ContactController::class,"update"])->name("contacts.update");
//affichage
Route::get('/dashboard/contact', [ContactController::class,"index"])->middleware(["auth"])->name('contact.index');


require __DIR__.'/auth.php';
