@extends('layouts.app')

@section('content')
    <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
        <div class="hero-content text-center my-10">
            <div class="max-w-md mb-10">
                {{-- ゲストページへのリンク --}}
                <a class="btn btn-primary btn-lg normal-case" href="{{ route('grade') }}">ゲスト</a>
                {{-- ログインページへのリンク --}}
                <a class="btn btn-primary btn-lg normal-case" href="{{ route('login') }}">ログイン</a>
                
                {{-- ユーザー登録ページへのリンク --}}
                <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">とうろく</a>
            </div>
        </div>
    </div>
@endsection
