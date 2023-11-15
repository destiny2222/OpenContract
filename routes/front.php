<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Front\PageController;
use Illuminate\Support\Facades\Route;



Route::get('', [PageController::class , 'index'])->name('home-page');
Route::get('/project', [PageController::class, 'project'])->name('contractor-project-page');
Route::get('/project/{contractor}', [PageController::class, 'projectView'])->name('contractor-project');
Route::get('/project-details/{project}', [PageController::class, 'projectDetails'])->name('project-details-page');
Route::post('/project/comment', [CommentController::class, 'storeComment'])->name('project-comment');
Route::get('/table', [PageController::class, 'tableView'])->name('table-page');
Route::get('/visuals', [PageController::class, 'visualsView'])->name('visuals-page');
Route::post('/get-projects', [PageController::class, 'getProjects']);
