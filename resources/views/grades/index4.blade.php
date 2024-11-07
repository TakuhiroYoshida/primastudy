@extends('layouts.app')

@section('content')
    {{--Quentionsから検索して取得？--}}
    <p>仮の商を立てよう</P>
    <div>レベル</div>
    <a class="btn btn-primary" href="{{ route('tentative', ['level' => 1, 'num' => 1]) }}">1</a>
    <a class="btn btn-primary" href="{{ route('tentative', ['level' => 2, 'num' => 1]) }}">2</a>
    <a class="btn btn-primary" href="{{ route('tentative', ['level' => 3 ,'num' => 1]) }}">3</a>
@endsection
