<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Category;
use App\Models\Tag;

class TaskController extends Controller
{
    // Массив с мок-данными задач
    private $tasks = [
        1 => [
            'id' => 1,
            'title' => 'Task 1',
            'description' => 'Description for task 1',
            'is_completed' => false,
            'priority' => 'high', // New field for priority
            'due_date' => '2024-10-15', // New field for due date
            'created_at' => '2024-10-01 10:00:00', // New field for creation date
            'updated_at' => '2024-10-01 10:00:00', // New field for last updated date
            'assigned_to' => 'User A', // New field for user assignment
        ],
        2 => [
            'id' => 2,
            'title' => 'Task 2',
            'description' => 'Description for task 2',
            'is_completed' => true,
            'priority' => 'medium', // New field for priority
            'due_date' => '2024-10-10', // New field for due date
            'created_at' => '2024-10-02 11:30:00', // New field for creation date
            'updated_at' => '2024-10-03 12:00:00', // New field for last updated date
            'assigned_to' => 'User B', // New field for user assignment
        ],
        3 => [
            'id' => 3,
            'title' => 'Task 3',
            'description' => 'Description for task 3',
            'is_completed' => false,
            'priority' => 'low', // New field for priority
            'due_date' => '2024-10-20', // New field for due date
            'created_at' => '2024-10-04 09:15:00', // New field for creation date
            'updated_at' => '2024-10-05 09:30:00', // New field for last updated date
            'assigned_to' => 'User C', // New field for user assignment
        ],
    ];


    public function index()
    {
        $tasks = Task::with(['category', 'tags'])->get();
        return view('tasks.index', compact('tasks'));
    }

  public function create()
  {
      $categories = Category::all();
      $tags = Tag::all();

      return view('tasks.create', compact('categories', 'tags'));
  }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        $task = Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'status' => 'new',
            'priority' => 'normal',
            'assignee' => null
        ]);

        if ($request->has('tags')) {
            $task->tags()->attach($request->input('tags'));
        }

        return redirect()->route('tasks.index')->with('success', 'Задача успешно создана!');
    }


    public function show($id)
    {
        $task = Task::with(['category', 'tags'])->find($id);

        if (!$task) {
            abort(404, 'Задача не найдена.');
        }

        return view('tasks.show', compact('task'));
    }


    public function edit($id)
    {
        $task = Task::with(['category', 'tags'])->findOrFail($id);

        $categories = Category::all();
        $tags = Tag::all();

        return view('tasks.edit', compact('task', 'categories', 'tags'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        // Найти задачу и обновить её
        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description', ''),
            'category_id' => $request->input('category_id'),
        ]);

        $task->tags()->sync($request->input('tags', []));

        return redirect()->route('tasks.index')->with('success', 'Задача успешно обновлена!');
    }

    public function destroy($id)
    {

        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Задача успешно удалена!');
    }

}
