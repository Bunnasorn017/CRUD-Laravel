<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register' , function() {
    return view(('register'));
});

Route::get('/showdata',[userController::class, 'listData'])->name('user.data');

Route::post('/register/create', [userController::class, 'Createuser'])->name('register.create');

Route::delete('/showdata/delete/{id}' ,[userController::class, 'Delete'])->name('user.delete');

Route::get('/showData/{id}/edit' ,[userController::class, 'Edituser'])->name('user.edit');

Route::put('/showData/{id}' ,[userController::class ,'updateUser'])->name('user.update');
