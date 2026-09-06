<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Projects | TaskBoard</title>

    <style>
        body {
            margin: 0;
            background: #0d0d0f;
            color: #f5f5f5;
            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }

        .container {
            width: min(960px, calc(100% - 40px));
            margin: 0 auto;
            padding: 64px 0;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 32px;
        }

        h1 {
            margin: 0;
            font-size: 28px;
        }

        .subtitle {
            color: #9b9ba3;
            margin-top: 8px;
        }

        .button {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            background: #f5f5f5;
            color: #111;
            text-decoration: none;
            font-weight: 600;
        }

        .project-list {
            display: grid;
            gap: 12px;
        }

        .project {
            padding: 20px;
            border: 1px solid #29292e;
            border-radius: 10px;
            background: #151518;
        }

        .project h2 {
            margin: 0 0 8px;
            font-size: 17px;
        }

        .project p {
            margin: 0;
            color: #a7a7af;
            line-height: 1.7;
        }

        .empty {
            padding: 48px;
            border: 1px dashed #35353a;
            border-radius: 10px;
            text-align: center;
            color: #8d8d95;
        }

        .success {
            margin-bottom: 24px;
            padding: 12px 16px;
            border: 1px solid #28583e;
            border-radius: 8px;
            background: #10281c;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Projects</h1>
            <div class="subtitle">
                プロジェクトを管理します。
            </div>
        </div>

        <a
            href="{{ route('projects.create') }}"
            class="button"
        >
            ＋ 新しいプロジェクト
        </a>

    </div>


    @if (session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <div class="project-list">

        @forelse ($projects as $project)

            <div class="project">

                <h2>
                    {{ $project->name }}
                </h2>

                <p>
                    {{ $project->description ?: '説明はありません。' }}
                </p>

            </div>

        @empty

            <div class="empty">
                まだプロジェクトがありません。
            </div>

        @endforelse

    </div>

</div>

</body>
</html>