<?php

use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/question/{id}', [IndexController::class, 'show'])->name('question');
Route::get('/search', [IndexController::class, 'search'])->name('search');

Route::redirect('/dashboard', '/admin/dashboard');

Auth::routes(['register' => false]);

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'namespace'  => 'Admin',
    'middleware' => ['auth'],
], function () {
    Route::view('/{any?}', 'layouts.admin.app')->name('dashboard')->where('any', '.*');
});
