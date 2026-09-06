<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),

            'tasks' => Task::count(),

            'todo' => Task::where(
                'status',
                'todo'
            )->count(),

            'in_progress' => Task::where(
                'status',
                'in_progress'
            )->count(),

            'done' => Task::where(
                'status',
                'done'
            )->count(),

            'overdue' => Task::where(
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


        $recentTasks = Task::with('project')
            ->latest('updated_at')
            ->take(5)
            ->get();


        return view('dashboard', [
            'stats' => $stats,
            'recentTasks' => $recentTasks,
        ]);
    }
}