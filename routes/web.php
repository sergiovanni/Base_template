<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Bars\BarController;
use App\Http\Controllers\FilepondController;
use App\Http\Controllers\Helps\HelpController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Events\ScanQrController;
use App\Http\Controllers\People\PersonController;
use App\Http\Controllers\Companies\CompanyController;
use App\Http\Controllers\Responses\ResponseController;
use App\Http\Controllers\Participants\ParticipantController;
use App\Http\Controllers\Consummation\ConsummationsController;
use App\Http\Controllers\Consummations\ConsummationController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Auth\Middleware\Authenticate;


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


Route::redirect('/', 'login');

// Route::redirect('/', 'register');


Route::redirect('dashboard', 'events');

 
// Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Route::get('/events/index', [EventController::class, 'index']);

// Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Route::get('/events/edit', [EventController::class, 'edit'])->name('events.edit');

// Route::post('/events/store',[EventController::class, 'store'])->name('events.store');

// Route::delete('/events/destroy',[EventController::class, 'destroy'])->name('events.destroy');

Route::resource('people',PersonController::class);

Route::resource('events',EventController::class);

// Route::redirect('/', 'login');

// // Route::redirect('/', 'register');


// Route::redirect('dashboard', 'people');


// // Route::redirect('people', 'index');
 
// Route::get('/people', [PersonController::class, 'index'])->name('people.index');

// Route::get('/people/index', [PersonController::class, 'index']);

// Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');

// Route::get('/people/edit', [PersonController::class, 'edit'])->name('people.edit');

// Route::post('/people/store',[PersonController::class, 'store'])->name('people.store');

// Route::delete('/people/destroy',[PersonController::class, 'destroy'])->name('people.destroy');


// Route::get('filepond/api/process', [FilepondController::class, 'show']);
