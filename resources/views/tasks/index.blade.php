<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Список задач</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($tasks) > 0)
        <ul>
            @foreach($tasks as $task)
                <li>
                    <a href="{{ route('tasks.show', $task['id']) }}">{{ $task['title'] }}</a>
                    @if($task['is_completed'])
                        (Завершено)
                    @else
                        (Не завершено)
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>Задач пока нет.</p>
    @endif

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Создать новую задачу</a>
@endsection
