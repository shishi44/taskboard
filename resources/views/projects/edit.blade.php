@extends('layouts.app')


@section('title', 'Project編集')


@section('content')

    <div class="page-header">

        <div>

            <p class="eyebrow">
                EDIT PROJECT
            </p>

            <h1>
                プロジェクトを編集
            </h1>

            <p class="page-description">
                プロジェクト情報を変更します。
            </p>

        </div>

    </div>


    <form
        action="{{ route('projects.update', $project) }}"
        method="POST"
        class="panel form-panel"
    >

        @csrf
        @method('PUT')


        <div class="field">

            <label for="name">
                プロジェクト名
            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $project->name) }}"
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
            >{{ old('description', $project->description) }}</textarea>

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
                変更を保存
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