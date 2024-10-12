<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

// Маршрут для главной страницы
Route::get('/', [HomeController::class, 'index'])->name('home');

// Маршрут для страницы "О нас"
Route::get('/about', [HomeController::class, 'about'])->name('about'); 

Route::resource('tasks', TaskController::class);

// Route::resource('tasks', TaskController::class)
//     ->where(['id' => '[0-9]+'])
//     ->parameters(['tasks' => 'id']);


// Группируем маршруты с префиксом "/tasks"
// Route::prefix('tasks')->group(function () {
//     // Список задач
//     Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

//     // Создание новой задачи (форма)
//     Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');

//     // Сохранение новой задачи
//     Route::post('/', [TaskController::class, 'store'])->name('tasks.store');

//     // Отображение отдельной задачи
//     Route::get('/{id}', [TaskController::class, 'show'])
//         ->name('tasks.show')
//         ->where('id', '[0-9]+'); 

//     // Форма редактирования задачи
//     Route::get('/{id}/edit', [TaskController::class, 'edit'])
//         ->name('tasks.edit')
//         ->where('id', '[0-9]+'); 

//     // Обновление задачи
//     Route::put('/{id}', [TaskController::class, 'update'])
//         ->name('tasks.update')
//         ->where('id', '[0-9]+'); 

//     // Удаление задачи
//     Route::delete('/{id}', [TaskController::class, 'destroy'])
//         ->name('tasks.destroy')
//         ->where('id', '[0-9]+'); 
// });
