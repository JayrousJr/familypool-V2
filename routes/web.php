<?php

use App\Models\About;
use App\Models\PopUp;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use App\Models\SocialNetwork;
use App\Models\ServiceRequest;
use App\Http\Controllers\JetEmails;
use App\Http\Controllers\EmailReply;
use App\Http\Controllers\JetService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PagesController;
use App\Filament\Resources\ClientResource;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\JobApplicantsController;
use App\Http\Controllers\ServiceRequestController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'visitor',
])->group(function () {

    Route::get('/', function (Request $request) {

        $data['abouts'] = About::all();
        $data['popups'] = PopUp::all();
        $data['socialnetwork'] = SocialNetwork::all();
        $data['infos'] = CompanyInfo::all();
        return view('/site/index', $data);
    });
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('apply', [PagesController::class, 'apply'])->name('apply');
    Route::post('send', [MessageController::class, 'message']);
    Route::post('request', [ServiceRequestController::class, 'request']);
    Route::post('/apply_job', [JobApplicantsController::class, 'apply_job'])->name('apply_job');
});

Route::middleware([
    'auth:sanctum', config('jetstream.auth_session'), 'verified', 'check.service.application'
])->group(function () {
    Route::post('request', [ServiceRequestController::class, 'request']);
});

Route::get('service', [PagesController::class, 'service']);
Route::get('gallery', [PagesController::class, 'gallery']);
Route::get('about', [PagesController::class, 'about']);
Route::get('category', [PagesController::class, 'categories']);
Route::get('contact', [PagesController::class, 'contact']);
Route::get('service-request', [PagesController::class, 'askservice']);
Route::get('pdf/{record}', PdfController::class)->name('pdf');

Route::middleware(['auth', 'verified'])->group(function () {
    // 
    Route::resource('messages', JetEmails::class);
    Route::resource('myservices', JetService::class);
    Route::resource('reply', EmailReply::class);
});
