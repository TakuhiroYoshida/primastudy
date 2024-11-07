<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentativeController extends Controller
{
    protected $maxRounds = 10;
    
    public function show($level, $num) {
        if ($num > 10) {
            return view('goodjob');
        }
        
        // レベルリストを定義
        $levelList = [
            1,2,3
        ];
        // リストにないレベルを受け取ったときの処理
        if (!in_array($level, $levelList)) {
            return back();
        }
        
        // view側に渡す変数の定義
        $intA = 0;
        $intB = 0;

        switch($level){
            case 1: //商が１桁
                do {
                    $intA = mt_rand(10, 99);
                    $intB = mt_rand(100, 999);
                    } while ($intB / $intA >= 10);
                break;
            case 2:
                $intA = mt_rand(10,99);
                $intB = mt_rand(100,999);
                break;
            case 3:
                $intA = mt_rand(100,999);
                $intB = mt_rand(1000,9999);
                break;
            }
                
        return view('questions.tentative', [
        'intA' => $intA,
        'intB' => $intB,
        'level' => $level,
        'num' => $num
        ]);
    }
    
    public function store(Request $request) {
        // フォームから受け取ったデータを取得
        $student_answer100 = $request->input('student_answer100');
        $student_answer10 = $request->input('student_answer10');
        $student_answer1 = $request->input('student_answer1');
        $student_answerA = $request->input('student_answerA');
        $student_answerB = $request->input('student_answerB');
        $intA = $request->input('intA');
        $intB = $request->input('intB');
        $level = $request->input('level');
        $num = $request->input('num');
        
        $request = $request->all();
        
        // 答えの定義
        $answer = $intB / $intA; //解答
        $answerA = round($intA,-(strlen($intA)-1)); //$intAの概数
        $answerB = round($intB,-(strlen($intB)-1)); //$intBの概数
        $answer2 = $answerB / $answerA; //概数を用いた場合の解答（できない子向け）
        
        // 児童の答えの定義
        $student_answer = $student_answer100 * 100 + $student_answer10 * 10 + $student_answer1; //(2x)
        
        //判断基準の定義
        // 解答が1桁か2桁かでの解答の処理
        if ($answer >= 10){
            $answer_judge = floor($answer/10); //2桁の場合は1桁目を取得
        } else {
            $answer_judge = floor($answer); //1桁の場合1桁目を取得
        }
        // 解答が1桁か2桁かでの回答の処理
        if ($answer >= 10){
            $student_judge = floor($student_answer/10); //2桁の場合は1桁目を取得（3桁の場合は2桁目まで取得）
        } else {
            $student_judge = $student_answer; //1桁の場合はそのまま
        }
        
        // 概数の解答が1桁か2桁かでの概数の解答の処理
        if ($answer2 >= 10){
            $answer_judge2 = floor($answer2/10); //2桁の場合は1桁目を取得（3桁の場合は2桁目まで取得）
        } else {
            $answer_judge2 = floor($answer2); //1桁の場合は1桁目を取得
        }
        
        //評価（rating）の定義
        
        //完全一致の場合1
        if ($student_judge == $answer_judge){
            $rating = 1;
        //誤差±1の場合2
        } elseif ($student_judge == $answer_judge - 1 || $student_judge == $answer_judge + 1){
            $rating = 2;
        //ABにあてはまらなくても概数計算はできている場合3
        } elseif ($student_judge == $answer_judge2){
            $rating = 3;
        //どれにも当てはまらない場合4
        }else{
            $rating = 4;
        }
        
        //回答の桁間違い対策
        if($student_judge == 0){
            $rating = 4;
        }
        
        //解答ページを表示する
        return view('answer.tentative', [
            // 回答表示
            'student_answer100' => $student_answer100,
            'student_answer10' => $student_answer10,
            'student_answer1' => $student_answer1,
            'student_answerA' => $student_answerA,
            'student_answerB' => $student_answerB,
            
            // 解答表示
            'answer' => $answer,
            'answerA' => $answerA,
            'answerB' => $answerB,
            
            // 正誤判断
            'rating' => $rating,
            
            'intA' => $intA,
            'intB' => $intB,
            'level' => $level, 
            'num' => $num + 1,
        ]);
    }
}
