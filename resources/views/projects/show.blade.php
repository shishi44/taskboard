<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $project->name }} | TaskBoard</title>

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
            width: min(760px, calc(100% - 40px));
            margin: 0 auto;
            padding: 64px 0;
        }

        .back {
            color: #9b9ba3;
            text-decoration: none;
        }

        .card {
            margin-top: 32px;
            padding: 28px;
            border: 1px solid #29292e;
            border-radius: 10px;
            background: #151518;
        }

        h1 {
            margin: 0 0 16px;
        }

        .description {
            color: #aaaab2;
            line-height: 1.8;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
        }

        .button {
            display: inline-block;
            padding: 10px 16px;
            border: 0;
            border-radius: 8px;
            background: #f5f5f5;
            color: #111;
            text-decoration: none;
            font: inherit;
            font-weight: 600;
            cursor: pointer;
        }

        .delete {
            background: #35191c;
            color: #ff9a9f;
        }

        .success {
            margin-top: 24px;
            padding: 12px 16px;
            border: 1px solid #28583e;
            border-radius: 8px;
            background: #10281c;
        }
    </style>
</head>

<body>

<div class="container">

    <a
        href="{{ route('projects.index') }}"
        class="back"
    >
        ← Projectsへ戻る
    </a>


    @if (session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <div class="card">

        <h1>
            {{ $project->name }}
        </h1>

        <div class="description">
            {{ $project->description ?: '説明はありません。' }}
        </div>


        <div class="actions">

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
                    class="button delete"
                    onclick="return confirm('このプロジェクトを削除しますか？')"
                >
                    削除
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>