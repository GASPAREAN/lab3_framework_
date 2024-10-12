
@props(['title', 'description', 'createdAt', 'updatedAt', 'status', 'priority', 'assignee'])

<div class="task">
    <h3>{{ $title }}</h3>
    <p>{{ $description }}</p>
    <p><strong>Дата создания:</strong> {{ $createdAt }}</p>
    <p><strong>Дата обновления:</strong> {{ $updatedAt }}</p>
    <p><strong>Статус:</strong> {{ $status }}</p>
    <p><strong>Приоритет:</strong> {{ $priority }}</p>
    <p><strong>Исполнитель:</strong> {{ $assignee }}</p>
    <div class="actions">
        <a href="#" class="btn">Редактировать</a>
        <form method="POST" action="#" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Удалить</button>
        </form>
    </div>
</div>
