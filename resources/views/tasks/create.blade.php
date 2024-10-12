<!-- resources/views/tasks/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Создание новой задачи</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Название задачи</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Описание задачи</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Создать задачу</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
