<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Название задачи:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="description">Описание:</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <button type="submit">Создать задачу</button>
</form>
