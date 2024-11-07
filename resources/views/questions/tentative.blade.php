@extends('layouts.app')

@section('content')
    <p class="text-4xl">はじめに計算するところに商を立てよう！</p><br>
    <form method="POST" action="{{ route('tentativeAnswer',['level' => $level, 'num'=> $num]) }}">
        @csrf
    <div class="sm:grid sm:grid-cols-8 text-9xl w-3/4 text-center">
                <div class="col-start-6 text-4xl">
                    {{--商の入力フォーム--}}
                        <input type="number" name="student_answer100" min="0" max="9" class="text-center">
                </div>
                <div class="text-4xl">
                        <input type="number" name="student_answer10" min="0" max="9" class="text-center bg-yellow-100">
                </div>
                <div class="text-4xl">
                        <input type="number" name="student_answer1" min="0" max="9" class="text-center bg-yellow-100">
                </div>
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
            <div class="col-start-1 text-4xl">およそ</div>
            <div class="col-start-2 col-span-3 text-left text-4xl">
                {{--割る数の入力フォーム--}}
                    <input type="number" name="student_answerA" min="0" max="1000" class="text-center bg-yellow-100">
            </div>
            <div class="col-start-5 text-4xl">およそ</div>
            <div class="col-start-6 col-span-3 text-left text-4xl">
                {{--割られる数の入力フォーム--}}
                    <input type="number" name="student_answerB" min="0" max="10000" class="text-center bg-yellow-100">
            </div>
            
    </div><br>

        {{--乱数のフォーム--}}
            <input type="hidden" name="intA" value="{{ $intA }}">
            <input type="hidden" name="intB" value="{{ $intB }}">
            <input type="hidden" name="level" value="{{ $level }}">
            <input type="hidden" name="num" value="{{ $num }}">
            <button type="submit" class="btn btn-primary">答え合わせ</button>
    </form>
    
@endsection