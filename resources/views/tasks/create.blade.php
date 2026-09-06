@extends('layouts.app')


@section('title', '新しいTask')


@section('content')

    <div class="page-header">

        <div>

            <p class="eyebrow">
                NEW TASK
            </p>

            <h1>
                新しいタスク
            </h1>

            <p class="page-description">
                「{{ $project->name }}」にタスクを追加します。
            </p>

        </div>

    </div>


    <form
        action="{{ route('projects.tasks.store', $project) }}"
        method="POST"
        class="panel form-panel"
    >

        @csrf


        <div class="field">

            <label for="title">
                タイトル
            </label>

            <input
                id="title"
                name="title"
                type="text"
                value="{{ old('title') }}"
                placeholder="例：Controllerを理解する"
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
                placeholder="タスクの内容を入力します。"
            >{{ old('description') }}</textarea>

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
                    @selected(old('status', 'todo') === 'todo')
                >
                    未着手
                </option>

                <option
                    value="in_progress"
                    @selected(old('status') === 'in_progress')
                >
                    進行中
                </option>

                <option
                    value="done"
                    @selected(old('status') === 'done')
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
                    @selected(old('priority') === 'low')
                >
                    低
                </option>

                <option
                    value="medium"
                    @selected(old('priority', 'medium') === 'medium')
                >
                    中
                </option>

                <option
                    value="high"
                    @selected(old('priority') === 'high')
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
                value="{{ old('due_date') }}"
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
                タスクを作成
            </button>


            <a
                href="{{ route('projects.show', $project) }}"
                class="button"
            >
                キャンセル
            </a>

        </div>

    </form>

@endsection