<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'TaskBoard')
        | TaskBoard
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body class="guest-body">

    <main class="guest-shell">

        <a
            href="{{ route('login') }}"
            class="guest-brand"
        >

            <span class="brand-mark">
                T
            </span>

            <span>
                TaskBoard
            </span>

        </a>


        @yield('content')

    </main>

</body>

</html>