<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserEloquentCRUDController;
use App\Http\Controllers\UserQueryCRUDController;
use App\Repository\UserRepository;
use App\Service\PostService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Crypt;

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

// USER ELOQUENT ROUTE 
// Route::get('/user', [UserEloquentCRUDConntroller::class, 'tampilan_create']);
// Route::post('/user', [UserEloquentCRUDConntroller::class, 'createQuery'])->name('create');
// Route::get('/user/{id}', [UserEloquentCRUDConntroller::class, 'readQuery']);
// Route::get('/user/update/{id}', [UserEloquentCRUDConntroller::class, 'updateQueryFrontend']);
// Route::post('/user/update', [UserEloquentCRUDConntroller::class, 'updateQuery'])->name('update');
// Route::get('/user/delete/{id}', [UserEloquentCRUDConntroller::class, 'deleteQuery']);


//  USER QUERY ROUTE
Route::get('/user', [UserQueryCRUDController::class, 'tampilan_create']);
Route::post('/user', [UserQueryCRUDController::class, 'createQuery'])->name('create');
Route::get('/user/{id}', [UserQueryCRUDController::class, 'readQuery']);
Route::get('/user/update/{id}', [UserQueryCRUDController::class, 'updateQueryFrontend']);
Route::post('/user/update', [UserQueryCRUDController::class, 'updateQuery'])->name('update');
Route::get('/user/delete/{id}', [UserQueryCRUDController::class, 'deleteQuery']);


// HELPER, VALIDATION, & MIDDLEWARWE - PERTEMUAN 6
Route::get('/post/create', [PostController::class, 'makePostPage']);
Route::post('/post/create', [PostController::class, 'createPost'])->name('createPost');


Route::get('/tokenaccess', [TokenController::class, 'tokenFrontend']);
Route::post('/tokenaccess', [TokenController::class, 'tokenSuccess'])->middleware('isToday')->name('accesToken');


// SESSION - PERTEMUAN 7
Route::get('/login', [LoginController::class, 'loginPage']);
Route::post('/login', [LoginController::class, 'loginAction'])->name('login');

Route::get('/info', [LoginController::class, 'infoUser'])->middleware('auth');

//ROUTE, NLADE TEMPLATE, LOCALIZATION SIMPLE PAGE - PERTEMUAN 8
Route::group(['prefix' => '{lang}', "middleware" => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'home']);
});

// PERTEMUAN 9 LARAVEL: ARTISAN COMMAND, HASHING
// Route hashing 
Route::get('/hashing', function () {
    $myPassword = Hash::make('myScretPassword');
    // simpan hasil ke database 


    // check Validasinya
    if (Hash::check("myScreetPassword", $myPassword)) {
        //jika benar
        return "Benar SAndinya coy $myPassword";
    } else {
        // jika salah
        return "salah";
    }
});
//route Encrypt dan Decrypt
Route::get('/enkripsi', function () {
    // membuat enkripsi baru
    $enkripsiString = Crypt::encryptString('My String to Encrypt');

    //mendekrip ke String asli
    $decryptString = Crypt::decryptString($enkripsiString);

    return "<br>Data Enkripsi : $enkripsiString <br> Data Decrypt : $decryptString";
});

// PERTEMUAN 10 - FILE UPLOAD, REPOSITORY,SERVICE
// route view form File upload
Route::get('/file_upload', function () {
    return view('upload-file');
});

// route Post file upload
Route::post('/file_upload', function (Request $request) {
    $file = $request->file("file");
    $fileName = $file->getClientOriginalName();
    $ext = $file->getClientOriginalExtension();

    if ($fileName && $ext) {
        $destination_path = storage_path('app/public/');
        $file->move($destination_path, $fileName);
    }

    return asset('storage/' . $fileName);
});

// Route Respository
Route::get('/list_users', function () {
    return UserRepository::ListAllUsers();
});

//Route Service
Route::get('/list_users_service', function () {
    return UserService::ListAllUsers();
});

// Route Tugas Service
Route::get('/latest_post', function () {
    return PostService::latestPost();
});


// PERTEMUAN 11 - GIT
// push Route to github with coomit message "add new route"
Route::get('/test_git', function () {
    return "test github";
});
