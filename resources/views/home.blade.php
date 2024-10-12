@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <h2>Добро пожаловать на To-Do App для команд!</h2>
    <p>Это приложение помогает вам и вашей команде управлять задачами, отслеживать их выполнение и улучшать совместную работу.</p>

    <h3>Навигация</h3>
    <ul>
        <li><a href="{{ url('/tasks') }}">Список задач</a></li>
        <li><a href="{{ url('/tasks/create') }}">Создание задачи</a></li>
    </ul>
<ul>
    <li><a href="{{ route('tasks.create') }}">Создание задачи</a></li>
    <li><a href="{{ route('tasks.edit', 1) }}">Изменить задачи</a></li> 
    <li><a href="{{ route('tasks.show', 1) }}">Найти задачу по id</a></li> 
    <li>
        <form action="{{ route('tasks.destroy', 1) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Удалить задачи</button>
        </form>
    </li>
</ul>


    <h3>Информация о приложении</h3>
    <p>To-Do App для команд позволяет:</p>
    <ul>
        <li>Создавать задачи для вашей команды</li>
        <li>Назначать задачи на отдельных участников</li>
        <li>Отслеживать статус выполнения задач</li>
        <li>Организовать рабочий процесс для повышения продуктивности</li>
    </ul>
@endsection
