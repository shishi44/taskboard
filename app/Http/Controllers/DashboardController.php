<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'appName' => 'TaskBoard',
            'message' => 'Laravelで作るプロジェクト・課題管理アプリ',
        ]);
    }
}