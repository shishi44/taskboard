<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
{
    $user = $request->user();


    $stats = [
        'projects' => $user
            ->projects()
            ->count(),

        'tasks' => $user
            ->tasks()
            ->count(),

        'todo' => $user
            ->tasks()
            ->where('status', 'todo')
            ->count(),

        'in_progress' => $user
            ->tasks()
            ->where(
                'status',
                'in_progress'
            )
            ->count(),

        'done' => $user
            ->tasks()
            ->where('status', 'done')
            ->count(),

        'overdue' => $user
            ->tasks()
            ->where(
                'status',
                '!=',
                'done'
            )
            ->whereNotNull('due_date')
            ->whereDate(
                'due_date',
                '<',
                today()
            )
            ->count(),
    ];


    $recentTasks = $user
        ->tasks()
        ->with('project')
        ->latest('tasks.updated_at')
        ->take(5)
        ->get();


    return view('dashboard', [
        'stats' => $stats,
        'recentTasks' => $recentTasks,
    ]);
}
}