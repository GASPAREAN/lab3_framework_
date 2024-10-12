@extends('layouts.app')

@section('content')
    <h2>Список задач</h2>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('tasks.update', $task['id']) }}">{{ $task['title'] }}</a>
            </li>
        @endforeach
    </ul>
@endsection
