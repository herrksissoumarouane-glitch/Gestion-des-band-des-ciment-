<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\cimentController;
use App\Http\Controllers\factureController;
use App\Http\Controllers\TbaleController;
use App\Http\Controllers\AdministrationsController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
////////////clients/////////////

///////////

Route::get('/dashboard', action: function () {
    return view('dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/client', [ClientController::class, 'index'])->name('index');
    Route::get('/gestion', [ClientController::class, 'index2'])->name('index2');
    
    
    Route::get('/client/create', [ClientController::class, 'create'])->name('client.create'); 
    Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
    Route::post('/client/delete/{ref}', [ClientController::class, 'delete'])->name('client.delete');
    Route::post('/client/show/{ref}', [ClientController::class, 'show'])->name('client.show');  
    Route::post('/client/upd/{ref}', [ClientController::class, 'update'])->name('client.upd');
    Route::put('/client/doupdate/{ref}', [ClientController::class, 'doupdate'])->name('client.doupdate');
    Route::get('/client/add/{ref}', [ClientController::class, 'add'])->name('client.add');
    Route::post('/client/store2', [ClientController::class, 'store2'])->name('client.newtype');
    //////ciment //////////
    Route::get('/ciment', [cimentController::class, 'ciment'])->name('ciment'); 
    Route::get('/cimet/create', [cimentController::class, 'create'])->name('ciment.create');
    Route::post('/cimet/store', [cimentController::class, 'store'])->name('ciment.store');
    Route::post('/cimet/delete/{ref}', [cimentController::class, 'delete'])->name('ciment.delete');
    Route::post('/cimet/update/{ref}', [cimentController::class, 'update'])->name('ciment.update');
    Route::post('/cimet/update2/{ref}', [cimentController::class, 'update2'])->name('ciment.update2');
    /////////////////
    /////////facture ////////////// 
     
    Route::post('/get-ciment-price', [factureController::class, 'getCiMentPrice'])->name('getCiMentPrice'); 
   


        Route::resource('facture', factureController::class);  
        Route::post('/facture/print/{ref}', [FactureController::class, 'print'])->name('facture.print');
        Route::get('/facture', [factureController::class, 'index'])->name('facture'); // Ensure this route exists
        Route::get('/facture/create', [factureController::class, 'create'])->name('facture.create');
        Route::post('/facture/store', [factureController::class, 'store'])->name('facture.store');
        Route::delete('/facture/delete/{ref}', [FactureController::class, 'destroy'])->name('facture.delete');

        Route::post('/facture/update/{id}', [factureController::class, 'update'])->name('facture.update');
        Route::post('/facture/update2/{id}', [factureController::class, 'update2'])->name('facture.update2');
        Route::get('/facture/show/{id}', [factureController::class, 'show'])->name('facture.show');
        
    ///////////////////////////////
    Route::get('/table', [TbaleController::class, 'index'])->name('table');
    ////////////////////////
    
    Route::get('/administrations', [AdministrationsController::class, 'index'])->name('administrations');
    Route::post('/administrations/reload/{id}', [AdministrationsController::class, 'reload'])->name('admin.reload');
 
    Route::get('/admin/create', [AdministrationsController::class, 'create'])->name('admin.create');
    
 
    Route::post('/admin/store', [AdministrationsController::class, 'store'])->name('admin.store');
    
    ////////////////////////
    
    Route::get('/gestion', [GestionController::class, 'index'])->name('gestion');
    Route::get('/gestion', [GestionController::class, 'index'])->name('gestion');

});

// Routes for notifications
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::post('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read'); 
 
Route::get('/notifications/{notification}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
Route::post('/notifications/create/{username}/{title}/{body}', [NotificationController::class, 'create']);

require __DIR__.'/auth.php';
