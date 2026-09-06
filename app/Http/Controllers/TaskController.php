<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function create(Project $project)
    {
        return view('tasks.create', [
            'project' => $project,
        ]);
    }

    public function store(Request $request, Project $project)
    {
        Gate::authorize('update', $project);
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['nullable', 'max:2000'],
            'status' => ['required', 'in:todo,in_progress,done'],
            'priority' => ['required', 'in:low,medium,high'],
            'due_date' => ['nullable', 'date'],
        ]);

        $project->tasks()->create($validated);

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'タスクを作成しました。');
    }

    public function edit(Task $task)
{
    Gate::authorize('update', $task);

    return view('tasks.edit', [
        'task' => $task,
    ]);
}

    public function update(
    Request $request,
    Task $task
) {
    Gate::authorize('update', $task);

    $validated = $request->validate([
        'title' => ['required', 'max:255'],
        'description' => ['nullable', 'max:2000'],
        'status' => [
            'required',
            'in:todo,in_progress,done',
        ],
        'priority' => [
            'required',
            'in:low,medium,high',
        ],
        'due_date' => [
            'nullable',
            'date',
        ],
    ]);

    $task->update($validated);

    return redirect()
        ->route(
            'projects.show',
            $task->project
        )
        ->with(
            'success',
            'タスクを更新しました。'
        );
}

    public function destroy(Task $task)
{
    Gate::authorize('delete', $task);

    $project = $task->project;

    $task->delete();

    return redirect()
        ->route('projects.show', $project)
        ->with(
            'success',
            'タスクを削除しました。'
        );
}
}