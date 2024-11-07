<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function show($id){
        if ($id == 1) {
            return view('grades.index1');
        } elseif ($id == 2) {
            return view('grades.index2');
        } elseif ($id == 3) {
            return view('grades.index3');
        } elseif ($id == 4) {
            return view('grades.index4');
        } elseif ($id == 5) {
            return view('grades.index5');
        } elseif ($id == 6) {
            return view('grades.index6');
        } else {
            return back();
        }
    }
}