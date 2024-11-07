@extends('layouts.app')

@section('content')
    <p class="text-4xl">はじめに計算するところに商を立てよう！</p><br>
    <div class="sm:grid sm:grid-cols-8 text-9xl w-3/4 text-center">
        {{-- 回答者の回答 --}}
        <div class="col-start-6 bg-yellow-100 text-4xl">{{ $student_answer100 }}</div>
        <div class="bg-yellow-100 text-4xl">{{ $student_answer10 }}</div>
        <div class="bg-yellow-100 text-4xl">{{ $student_answer1 }}</div>
        {{-- 正解 --}}
        <div class="col-start-7 text-red-800 text-4xl">
            @if ($answer >= 10)
            {{ $answer / 10 % 10 }}
            @endif
        </div>
        <div class="text-red-800 text-4xl">{{ $answer % 10 }}</div>
        
        {{-- 問題文 --}}
        <div class="col-start-1">
            @if ($intA < 100)
            @else {{ $intA / 100 % 10 }} 
            @endif
        </div>
        <div>{{ $intA / 10 % 10 }}</div>
        <div>{{ $intA % 10 }}</div>
        <div>)</div>
        <div class="border-t-4 border-gray-800">
            @if ( $intB < 1000) 
            @else {{ $intB / 1000 % 10 }} 
            @endif
        </div>
        <div class="border-t-4 border-gray-800">{{ $intB / 100 % 10 }}</div>
        <div class="border-t-4 border-gray-800">{{ $intB / 10 % 10 }}</div>
        <div class="border-t-4 border-gray-800">{{ $intB % 10 }}</div>
        
        {{-- 回答者の回答A --}}
        <div class="col-start-1 text-4xl">およそ</div>
        <div class="bg-yellow-100 col-start-2 col-span-3 text-left text-4xl">{{ $student_answerA }}</div>
        {{-- 回答者の回答B --}}
        <div class="col-start-5 text-4xl">およそ</div>
        <div class="bg-yellow-100 col-start-6 col-span-3 text-left text-4xl">{{ $student_answerB }}</div>
        {{-- 解答A --}}
        <div class="col-start-2 col-span-3 text-red-800 text-left text-4xl">{{ $answerA }}</div>
        {{-- 解答B --}}
        <div class="col-start-6 col-span-3 text-red-800 text-left text-4xl">{{ $answerB }}</div>
            
    </div><br>
    
    {{--正誤--}}
    @include('answer.truefalse')
    
    
    <br>
    <a class="btn btn-primary" href="{{ route('tentative', ['level' => $level, 'num' => $num ]) }}">次の問題へ</a>
@endsection