<?php

use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// })->name('accueil')->middleware('auth');


Route::
    middleware('auth')
    ->name('admin.')
    ->group(function () {
    Route::resource('users',UserController::class);
});

        Route::get('/',[ActualiteController::class,'accShow'])->name('accueil')->middleware('auth');
        Route::get('/employeeList',[UserController::class,'empList'])->name('list');
        Route::get('/employeeList/create',[UserController::class,'createEmpView'])->name('createEmpView');
        Route::post('/employeeList',[UserController::class,'createEmp'])->name('createEmp');
        Route::resource('news',ActualiteController::class);
        Route::resource('tasks',TaskController::class);

        Route::name('tasks.')
              ->group(function(){
                Route::get('/assigned',[TaskController::class, 'myTasks'])->name('MyTask');
                Route::get('/assigned/{task}',[TaskController::class, 'assignedView'])->name('assignedView');
                Route::post('/assign/{task}',[TaskController::class, 'assign'])->name('assign');
                Route::post('/startTask/{task}',[TaskController::class, 'startTask'])->name('startTask');
                Route::post('/markAsTermined/{task}',[TaskController::class, 'markAsTermined'])->name('markAsTermined');
                Route::get('/taskAssignedView/{task}',[TaskController::class, 'taskAssignedView'])->name('taskAssignedView');
                Route::post('/commentTask/{task}',[TaskController::class, 'commentTask'])->name('commentTask');

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
