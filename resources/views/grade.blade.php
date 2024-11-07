@extends('layouts.app')

@section('content')
   <h2>学年を選びましょう</h2>
    <div class="grid grid-cols-3 gap-4">
        <a class="btn btn-primary normal-case w-1/4" href="{{ route('show',['id' => 1]) }}">１年生</a>
        <a class="btn btn-primary normal-case w-1/4" href="{{ route('show',['id' => 2]) }}">２年生</a>
        <a class="btn btn-primary normal-case w-1/4" href="{{ route('show',['id' => 3]) }}">３年生</a>
        <a class="btn btn-primary normal-case w-1/4" href="{{ route('show',['id' => 4]) }}">４年生</a>
        <a class="btn btn-primary normal-case w-1/4" href="{{ route('show',['id' => 5]) }}">５年生</a>
        <a class="btn btn-primary normal-case w-1/4" href="{{ route('show',['id' => 6]) }}">６年生</a>
    </div>

@endsection