
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Задача: {{ $task['title'] }}</h1>

    <x-task 
        :title="$task['title']" 
        :description="$task['description']" 
        :createdAt="$task['created_at']" 
        :updatedAt="$task['updated_at']" 
        :status="$task['status']" 
        :priority="$task['priority']" 
        :assignee="$task['assignee']" 
    />

    <nav>
        <ul>
            <li><a href="{{ route('tasks.index') }}">Список задач</a></li>
            <li><a href="{{ route('tasks.edit', $task['id']) }}">Редактировать задачу</a></li>
            <li><a href="{{ route('home') }}">На главную</a></li>
            <li><a href="{{ route('about') }}">О нас</a></li>
        </ul>
    </nav>
</div>
@endsection
