@extends('layouts.app')

@section('content')
    {{--Quentionsから検索して取得？--}}
    <p>２年生問題一覧ビュー</P>
    <div>レベル</div>
    <a class="btn btn-primary" href="{{ route('sorry') }}">1</a>
    <a class="btn btn-primary" href="{{ route('sorry') }}">2</a>
    <a class="btn btn-primary" href="{{ route('sorry') }}">3</a>
@endsection