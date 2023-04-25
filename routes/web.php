<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // student view page 
    Route::get('/student_view', [UserController::class, 'studentView'])->name('show.student');

    // attendence page 
    Route::get('/attendence_view', [UserController::class, 'attendenceView'])->name('attendence.view');
    Route::post('/attendence_view', [UserController::class, 'attendenceView'])->name('attendence.filter');
    Route::post('/insert_attendence', [UserController::class, 'insertAttendence'])->name('insert.sujectreq');
    Route::post('/insert_attendence', [UserController::class, 'insertAttendence'])->name('insert.attendence');
    

    // adding student 
    Route::get('/add_student', [UserController::class, 'addStudent'])->name('add.student');
    // submting form data fot insert student route 
    Route::post('/insert_student', [UserController::class, 'insertStudent'])->name('insert.student');
    Route::get('/edit_student/{id}', [UserController::class, 'EditStudent'])->name('edit.student');
    Route::post('/update_student', [UserController::class, 'updateStudent'])->name('update.student');
    Route::get('/delete_student/{id}', [UserController::class, 'deleteStudent'])->name('delete.student');
    
    
    
    

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
