<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

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

        Project::create($validated);

        return redirect()
            ->route('projects.index')
            ->with('success', 'プロジェクトを作成しました。');
    }
}