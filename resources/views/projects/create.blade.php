<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>New Project | TaskBoard</title>

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
            width: min(680px, calc(100% - 40px));
            margin: 0 auto;
            padding: 64px 0;
        }

        .back {
            color: #9b9ba3;
            text-decoration: none;
        }

        h1 {
            margin: 32px 0 8px;
        }

        .subtitle {
            color: #9b9ba3;
            margin-bottom: 32px;
        }

        .field {
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        input,
        textarea {
            box-sizing: border-box;
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #303036;
            border-radius: 8px;
            background: #151518;
            color: white;
            font: inherit;
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: 2px solid #7777ff;
            border-color: transparent;
        }

        button {
            border: 0;
            border-radius: 8px;
            padding: 11px 18px;
            background: #f5f5f5;
            color: #111;
            font: inherit;
            font-weight: 600;
            cursor: pointer;
        }

        .error {
            margin-top: 8px;
            color: #ff8585;
            font-size: 14px;
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


    <h1>新しいプロジェクト</h1>

    <div class="subtitle">
        TaskBoardで管理するプロジェクトを作成します。
    </div>


    <form
        action="{{ route('projects.store') }}"
        method="POST"
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

                <div class="error">
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

                <div class="error">
                    {{ $message }}
                </div>

            @enderror

        </div>


        <button type="submit">
            プロジェクトを作成
        </button>

    </form>

</div>

</body>
</html>