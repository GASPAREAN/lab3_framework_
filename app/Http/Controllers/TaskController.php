<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // Передаем мок-данные во view
        $tasks = $this->tasks;
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

  
    public function store(Request $request)
    {

        $newTask = [
            'id' => count($this->tasks) + 1,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'is_completed' => false,
        ];

    
        $this->tasks[$newTask['id']] = $newTask;

       
        return redirect()->route('tasks.index')->with('success', 'Задача успешно создана!');
    }

    public function show($id)
    {
        if (isset($this->tasks[$id])) {
            $task = $this->tasks[$id];
            return view('tasks.show', compact('task'));
        }

  
        abort(404, 'Задача не найдена.');
    }


    public function edit($id)
    {
        if (isset($this->tasks[$id])) {
            $task = $this->tasks[$id];
            return view('tasks.edit', compact('task'));
        }

        abort(404, 'Задача не найдена.');
    }


    public function update(Request $request, $id)
    {
        if (isset($this->tasks[$id])) {
            $this->tasks[$id]['title'] = $request->input('title');
            $this->tasks[$id]['description'] = $request->input('description');
            $this->tasks[$id]['is_completed'] = $request->input('is_completed', false);

            return redirect()->route('tasks.index')->with('success', 'Задача успешно обновлена!');
        }

        abort(404, 'Задача не найдена.');
    }


    public function destroy($id)
    {
        if (isset($this->tasks[$id])) {
            unset($this->tasks[$id]);

            return redirect()->route('tasks.index')->with('success', 'Задача успешно удалена!');
        }

        abort(404, 'Задача не найдена.');
    }
}
