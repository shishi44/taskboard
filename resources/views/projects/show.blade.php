@extends('layouts.app')


@section('title', $project->name)


@section('content')

    <div class="page-header">

        <div>

            <p class="eyebrow">
                PROJECT
            </p>

            <h1>
                {{ $project->name }}
            </h1>

        </div>

    </div>


    <div class="panel">

        <h2>
            概要
        </h2>

        <p class="detail-description">
            {{ $project->description ?: '説明はありません。' }}
        </p>

        <div class="detail-meta">

            作成：
            {{ $project->created_at->format('Y/m/d H:i') }}

            ・

            更新：
            {{ $project->updated_at->format('Y/m/d H:i') }}

        </div>


        <div class="action-row">

            <a
                href="{{ route('projects.edit', $project) }}"
                class="button"
            >
                編集
            </a>


            <form
                action="{{ route('projects.destroy', $project) }}"
                method="POST"
            >
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="button button-danger"
                    onclick="return confirm('このプロジェクトを削除しますか？')"
                >
                    削除
                </button>

            </form>


            <a
                href="{{ route('projects.index') }}"
                class="button"
            >
                一覧へ戻る
            </a>

        </div>

    </div>


    <div class="page-header task-section-header">

        <div>

            <p class="eyebrow">
                TASKS
            </p>

            <h2>
                Tasks
            </h2>

            <p class="page-description">
                このプロジェクトに登録されたタスクです。
            </p>

        </div>


        <a
            href="{{ route('projects.tasks.create', $project) }}"
            class="button button-primary"
        >
            ＋ 新しいタスク
        </a>

    </div>


    @if ($project->tasks->isEmpty())

        <div class="empty-state">
            まだタスクがありません。
        </div>

    @else

        <div class="project-list">

            @foreach ($project->tasks as $task)

                <article class="panel">

                    <h2>
                        {{ $task->title }}
                    </h2>


                    <p class="project-description">
                        {{ $task->description ?: '説明はありません。' }}
                    </p>


                    <div class="task-meta">

                        <span>
                            ステータス：

                            @if ($task->status === 'todo')
                                未着手
                            @elseif ($task->status === 'in_progress')
                                進行中
                            @else
                                完了
                            @endif
                        </span>


                        <span>
                            優先度：

                            @if ($task->priority === 'low')
                                低
                            @elseif ($task->priority === 'medium')
                                中
                            @else
                                高
                            @endif
                        </span>


                        @if ($task->due_date)

                            <span>
                                期限：
                                {{ $task->due_date->format('Y/m/d') }}
                            </span>

                        @endif

                    </div>


                    <div class="action-row">

                        <a
                            href="{{ route('tasks.edit', $task) }}"
                            class="button"
                        >
                            編集
                        </a>


                        <form
                            action="{{ route('tasks.destroy', $task) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="button button-danger"
                                onclick="return confirm('このタスクを削除しますか？')"
                            >
                                削除
                            </button>

                        </form>

                    </div>

                </article>

            @endforeach

        </div>

    @endif

@endsection