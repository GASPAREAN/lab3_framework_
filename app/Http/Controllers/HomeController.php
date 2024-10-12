<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Возвращаем представление для главной страницы
        return view('home');
    }

    public function about()
    {
        // Возвращаем представление для страницы "О нас"
        return view('about');
    }
}
