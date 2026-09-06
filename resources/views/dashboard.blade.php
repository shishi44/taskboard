@extends('layouts.app')


@section('title', 'Dashboard')


@section('content')

    <div class="page-header">

        <div>

            <p class="eyebrow">
                DASHBOARD
            </p>

            <h1>
                Dashboard
            </h1>

            <p class="page-description">
                ProjectとTaskの現在の状況を確認します。
            </p>

        </div>

    </div>


    <div class="stats-grid">

        <div class="panel stat-card">

            <span class="stat-label">
                Projects
            </span>

            <strong class="stat-value">
                {{ $stats['projects'] }}
            </strong>

            <span class="stat-description">
                登録プロジェクト
            </span>

        </div>


        <div class="panel stat-card">

            <span class="stat-label">
                All Tasks
            </span>

            <strong class="stat-value">
                {{ $stats['tasks'] }}
            </strong>

            <span class="stat-description">
                全タスク
            </span>

        </div>


        <div class="panel stat-card">

            <span class="stat-label">
                Todo
            </span>

            <strong class="stat-value">
                {{ $stats['todo'] }}
            </strong>

            <span class="stat-description">
                未着手
            </span>

        </div>


        <div class="panel stat-card">

            <span class="stat-label">
                In Progress
            </span>

            <strong class="stat-value">
                {{ $stats['in_progress'] }}
            </strong>

            <span class="stat-description">
                進行中
            </span>

        </div>


        <div class="panel stat-card">

            <span class="stat-label">
                Done
            </span>

            <strong class="stat-value">
                {{ $stats['done'] }}
            </strong>

            <span class="stat-description">
                完了
            </span>

        </div>


        <div class="panel stat-card stat-card-danger">

            <span class="stat-label">
                Overdue
            </span>

            <strong class="stat-value">
                {{ $stats['overdue'] }}
            </strong>

            <span class="stat-description">
                期限切れ
            </span>

        </div>

    </div>


    <section class="dashboard-section">

        <div class="dashboard-section-header">

            <div>

                <p class="eyebrow">
                    RECENT
                </p>

                <h2>
                    最近更新したTask
                </h2>

            </div>

        </div>


        @if ($recentTasks->isEmpty())

            <div class="empty-state">
                まだTaskがありません。
            </div>

        @else

            <div class="recent-task-list">

                @foreach ($recentTasks as $task)

                    <article class="panel recent-task-row">

                        <div class="recent-task-main">

                            <span class="recent-task-project">
                                {{ $task->project->name }}
                            </span>

                            <strong class="recent-task-title">
                                {{ $task->title }}
                            </strong>

                        </div>


                        <div class="recent-task-info">

                            <span>

                                @if ($task->status === 'todo')

                                    未着手

                                @elseif ($task->status === 'in_progress')

                                    進行中

                                @else

                                    完了

                                @endif

                            </span>


                            @if ($task->due_date)

                                <span>
                                    期限：
                                    {{ $task->due_date->format('Y/m/d') }}
                                </span>

                            @else

                                <span>
                                    期限なし
                                </span>

                            @endif

                        </div>


                        <a
                            href="{{ route('tasks.edit', $task) }}"
                            class="text-link"
                        >
                            編集
                        </a>

                    </article>

                @endforeach

            </div>

        @endif

    </section>

@endsection