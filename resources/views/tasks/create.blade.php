@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Создать новую задачу</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Название задачи:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Описание:</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Категория:</label>
            <select id="category_id" name="category_id" class="form-control" required>
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Теги:</label>
            <select id="tags" name="tags[]" class="form-control" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Удерживайте Ctrl (или Command на Mac), чтобы выбрать несколько тегов.</small>
        </div>

        <button type="submit" class="btn btn-primary">Создать задачу</button>
    </form>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Назад к списку задач</a>
</div>
@endsection
