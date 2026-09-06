@extends('layouts.app')


@section('title', 'Dashboard')


@section('content')

    <div class="page-header">

        <div>

            <p class="eyebrow">
                DASHBOARD
            </p>

            <h1>
                {{ $appName }}
            </h1>

            <p class="page-description">
                {{ $message }}
            </p>

        </div>

    </div>


    <div class="dashboard-grid">

        <div class="panel">

            <h2 class="dashboard-card-title">
                Projects
            </h2>

            <p class="dashboard-card-text">
                学習や開発内容をプロジェクト単位で管理します。
            </p>

            <div class="action-row">

                <a
                    href="{{ route('projects.index') }}"
                    class="button"
                >
                    Projectsを見る
                </a>

            </div>

        </div>


        <div class="panel">

            <h2 class="dashboard-card-title">
                Tasks
            </h2>

            <p class="dashboard-card-text">
                次のステップでProjectにTaskを追加します。
            </p>

        </div>

    </div>

@endsection