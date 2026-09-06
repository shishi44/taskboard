@extends('layouts.guest')


@section('title', 'ログイン')


@section('content')

    <section class="auth-card">

        <div class="auth-header">

            <p class="eyebrow">
                SIGN IN
            </p>

            <h1>
                ログイン
            </h1>

            <p class="page-description">
                TaskBoardへログインします。
            </p>

        </div>


        <form
            action="{{ route('login.store') }}"
            method="POST"
        >

            @csrf


            <div class="field">

                <label for="email">
                    メールアドレス
                </label>

                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    autocomplete="email"
                >

                @error('email')

                    <div class="form-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <div class="field">

                <label for="password">
                    パスワード
                </label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="current-password"
                >

            </div>


            <label class="remember-row">

                <input
                    name="remember"
                    type="checkbox"
                    value="1"
                >

                <span>
                    ログイン状態を保持する
                </span>

            </label>


            <button
                type="submit"
                class="button button-primary auth-submit"
            >
                ログイン
            </button>

        </form>


        <p class="auth-footer">

            アカウントを持っていませんか？

            <a
                href="{{ route('register') }}"
                class="text-link"
            >
                ユーザー登録
            </a>

        </p>

    </section>

@endsection