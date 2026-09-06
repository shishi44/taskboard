@extends('layouts.app')


@section('title', '新しいProject')


@section('content')

    <div class="page-header">

        <div>

            <p class="eyebrow">
                NEW PROJECT
            </p>

            <h1>
                新しいプロジェクト
            </h1>

            <p class="page-description">
                TaskBoardで管理するプロジェクトを作成します。
            </p>

        </div>

    </div>


    <form
        action="{{ route('projects.store') }}"
        method="POST"
        class="panel form-panel"
    >

        @csrf


        <div class="field">

            <label for="name">
                プロジェクト名
            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name') }}"
            >

            @error('name')

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
            >{{ old('description') }}</textarea>

            @error('description')

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
                プロジェクトを作成
            </button>


            <a
                href="{{ route('projects.index') }}"
                class="button"
            >
                キャンセル
            </a>

        </div>

    </form>

@endsection