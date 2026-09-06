<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>@yield('title', 'TaskBoard') | TaskBoard</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body>

<div class="app-shell">

    <aside class="sidebar">

        <a
            href="{{ route('dashboard') }}"
            class="brand"
        >
            <span class="brand-mark">T</span>
            <span>TaskBoard</span>
        </a>


        <nav class="nav">

            <a
                href="{{ route('dashboard') }}"
                class="nav-link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}"
            >
                Dashboard
            </a>


            <a
                href="{{ route('projects.index') }}"
                class="nav-link {{ request()->routeIs('projects.*') ? 'is-active' : '' }}"
            >
                Projects
            </a>


            <span class="nav-link is-disabled">
                Tasks

                <span class="badge">
                    Soon
                </span>
            </span>

        </nav>

    </aside>


    <main class="main-content">

        @if (session('success'))

            <div class="flash-success">
                {{ session('success') }}
            </div>

        @endif


        @yield('content')

    </main>

</div>

</body>
</html>