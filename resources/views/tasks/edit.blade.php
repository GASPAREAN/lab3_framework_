<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Редактирование задачи</h1>

    <form action="{{ route('tasks.update', $task['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Название задачи</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $task['title'] }}" required>
        </div>

        <div class="form-group">
            <label for="description">Описание задачи</label>
            <textarea id="description" name="description" class="form-control">{{ $task['description'] }}</textarea>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" id="is_completed" name="is_completed" class="form-check-input" {{ $task['is_completed'] ? 'checked' : '' }}>
            <label for="is_completed" class="form-check-label">Задача завершена</label>
        </div>

        <button type="submit" class="btn btn-primary">Обновить задачу</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
