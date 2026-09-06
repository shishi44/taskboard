<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
public function index(Request $request)
{
    $projects = $request->user()
        ->projects()
        ->latest()
        ->get();

    return view('projects.index', [
        'projects' => $projects,
    ]);
}

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['nullable', 'max:2000'],
        ]);

        $request->user()
        ->projects()
        ->create($validated);

        return redirect()
            ->route('projects.index')
            ->with('success', 'プロジェクトを作成しました。');
    }

public function show(Project $project)
{
    Gate::authorize('view', $project);

    $project->load([
        'tasks' => function ($query) {
            $query->latest();
        },
    ]);

    return view('projects.show', [
        'project' => $project,
    ]);
}

public function edit(Project $project)
{
    Gate::authorize('update', $project);

    return view('projects.edit', [
        'project' => $project,
    ]);
}

    public function update(
    Request $request,
    Project $project
) {
    Gate::authorize('update', $project);

    $validated = $request->validate([
        'name' => ['required', 'max:255'],
        'description' => ['nullable', 'max:2000'],
    ]);

    $project->update($validated);

    return redirect()
        ->route('projects.show', $project)
        ->with(
            'success',
            'プロジェクトを更新しました。'
        );
}

    public function destroy(Project $project)
{
    Gate::authorize('delete', $project);

    $project->delete();

    return redirect()
        ->route('projects.index')
        ->with(
            'success',
            'プロジェクトを削除しました。'
        );
}
}