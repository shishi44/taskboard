@extends('layouts.guest')


@section('title', 'ユーザー登録')


@section('content')

    <section class="auth-card">

        <div class="auth-header">

            <p class="eyebrow">
                CREATE ACCOUNT
            </p>

            <h1>
                ユーザー登録
            </h1>

            <p class="page-description">
                TaskBoardを利用するアカウントを作成します。
            </p>

        </div>


        <form
            action="{{ route('register.store') }}"
            method="POST"
        >

            @csrf


            <div class="field">

                <label for="name">
                    名前
                </label>

                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    autocomplete="name"
                >

                @error('name')

                    <div class="form-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


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
                    autocomplete="new-password"
                >

                @error('password')

                    <div class="form-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <div class="field">

                <label for="password_confirmation">
                    パスワード確認
                </label>

                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    autocomplete="new-password"
                >

            </div>


            <button
                type="submit"
                class="button button-primary auth-submit"
            >
                アカウントを作成
            </button>

        </form>


        <p class="auth-footer">

            すでにアカウントがありますか？

            <a
                href="{{ route('login') }}"
                class="text-link"
            >
                ログイン
            </a>

        </p>

    </section>

@endsection