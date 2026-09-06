@extends('layouts.app')


@section('title', 'Projects')


@section('content')

    <div class="page-header">

        <div>

            <p class="eyebrow">
                PROJECTS
            </p>

            <h1>
                Projects
            </h1>

            <p class="page-description">
                プロジェクトを作成・管理します。
            </p>

        </div>


        <a
            href="{{ route('projects.create') }}"
            class="button button-primary"
        >
            ＋ 新しいプロジェクト
        </a>

    </div>


    @if ($projects->isEmpty())

        <div class="empty-state">

            まだプロジェクトがありません。

        </div>

    @else

        <div class="project-list">

            @foreach ($projects as $project)

                <article class="panel project-row">

                    <div class="project-body">

                        <h2>
                            {{ $project->name }}
                        </h2>

                        <p class="project-description">
                            {{ $project->description ?: '説明はありません。' }}
                        </p>

                    </div>


                    <div class="project-actions">

                        <a
                            href="{{ route('projects.show', $project) }}"
                            class="text-link"
                        >
                            詳細
                        </a>

                        <a
                            href="{{ route('projects.edit', $project) }}"
                            class="text-link"
                        >
                            編集
                        </a>

                    </div>

                </article>

            @endforeach

        </div>

    @endif

@endsection