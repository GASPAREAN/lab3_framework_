@extends('layouts.app')

@section('content')
    <h1>{{ $task['title'] }}</h1>

    <p>{{ $task['description'] }}</p>

    <p>
        <strong>Статус: </strong>
        @if($task['is_completed'])
            Завершено
        @else
            Не завершено
        @endif
    </p>

    <p>
        <strong>ID: </strong> {{ $task['id'] }}
    </p>
    <p>
        <strong>Приоритет: </strong> {{ ucfirst($task['priority']) }} <!-- Displays priority, capitalized -->
    </p>
    <p>
        <strong>Срок выполнения: </strong> {{ $task['due_date'] }} <!-- Displays due date -->
    </p>
    <p>
        <strong>Создано: </strong> {{ $task['created_at'] }} <!-- Displays creation date -->
    </p>
    <p>
        <strong>Обновлено: </strong> {{ $task['updated_at'] }} <!-- Displays last updated date -->
    </p>
    <p>
        <strong>Ответственный: </strong> {{ $task['assigned_to'] }} <!-- Displays the assigned user -->
    </p>

    <a href="{{ route('tasks.edit', $task['id']) }}" class="btn btn-primary">Редактировать</a>

    <form action="{{ route('tasks.destroy', $task['id']) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
    </form>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Назад к списку задач</a>
@endsection
