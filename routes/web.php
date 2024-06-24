<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Email;

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

Route::get('/', function () {
    // return view('welcome');
    // fecthing all users with elquent model
    $users=User::find(3);

    // create new user
    // $user = DB::table('users')->insert(["name"=>"ahmedemad","password"=>"123456789","email"=>"ahmed@emad.com"]);


    // $user = User::create([
    //     "name"=>"hymannnnn","email"=>"hymannnnnnnn@emasd.com","password"=>"123456789"
    // ]);
    //update user
    // $user = DB::table('users')->where("id",2)->update(["email"=>"upadted email@gmail.com"]);

    //Delete user
    // $user = DB::table('users')->where("id",2)->delete();

    // dd($users);

    return view('welcome');
});
 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
