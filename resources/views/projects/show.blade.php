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

@endsection