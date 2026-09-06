@extends('layouts.app')


@section('title', 'Task編集')


@section('content')

    <div class="page-header">

        <div>

            <p class="eyebrow">
                EDIT TASK
            </p>

            <h1>
                タスクを編集
            </h1>

            <p class="page-description">
                「{{ $task->project->name }}」のタスクを編集します。
            </p>

        </div>

    </div>


    <form
        action="{{ route('tasks.update', $task) }}"
        method="POST"
        class="panel form-panel"
    >

        @csrf
        @method('PUT')


        <div class="field">

            <label for="title">
                タイトル
            </label>

            <input
                id="title"
                name="title"
                type="text"
                value="{{ old('title', $task->title) }}"
            >

            @error('title')
                <div class="form-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="field">

            <label for="description">
                説明
            </label>

            <textarea
                id="description"
                name="description"
            >{{ old('description', $task->description) }}</textarea>

            @error('description')
                <div class="form-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="field">

            <label for="status">
                ステータス
            </label>

            <select
                id="status"
                name="status"
            >

                <option
                    value="todo"
                    @selected(old('status', $task->status) === 'todo')
                >
                    未着手
                </option>

                <option
                    value="in_progress"
                    @selected(old('status', $task->status) === 'in_progress')
                >
                    進行中
                </option>

                <option
                    value="done"
                    @selected(old('status', $task->status) === 'done')
                >
                    完了
                </option>

            </select>

            @error('status')
                <div class="form-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="field">

            <label for="priority">
                優先度
            </label>

            <select
                id="priority"
                name="priority"
            >

                <option
                    value="low"
                    @selected(old('priority', $task->priority) === 'low')
                >
                    低
                </option>

                <option
                    value="medium"
                    @selected(old('priority', $task->priority) === 'medium')
                >
                    中
                </option>

                <option
                    value="high"
                    @selected(old('priority', $task->priority) === 'high')
                >
                    高
                </option>

            </select>

            @error('priority')
                <div class="form-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="field">

            <label for="due_date">
                期限
            </label>

            <input
                id="due_date"
                name="due_date"
                type="date"
                value="{{ old(
                    'due_date',
                    $task->due_date?->format('Y-m-d')
                ) }}"
            >

            @error('due_date')
                <div class="form-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="action-row">

            <button
                type="submit"
                class="button button-primary"
            >
                変更を保存
            </button>


            <a
                href="{{ route('projects.show', $task->project) }}"
                class="button"
            >
                キャンセル
            </a>

        </div>

    </form>

@endsection