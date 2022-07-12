<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RadioController extends Controller
{
    public function Calculator (Request $req ){
        $validator = Validator::make($req->all(), [
        'a' => 'required|integer',
        'b' => 'required|integer',
    ],[
        'a.required' => 'nhập đi',
        'b.required' => 'nhập đi',
        'a.integer' => 'A phải là số nguyên',
        'b.integer' => 'B phải là số nguyên',
    ]
    );
    if ($validator->fails()) {
        $errors = $validator->errors();
        return view('radioform') ->withErrors($errors);
                
    }
            $a=$req->input('a');
            $b=$req->input('b');
            $calculate=$req->input('$calculate');
            switch($calculate){
                case 'cong':
                    $result = $a+$b;
                    break;
                case 'tru':
                    $result = $a-$b;
                    break;
                case 'nhan':
                    $result = $a*$b;
                    break;
                case 'chia':
                    $result = $a/$b;
                    break;
            }
            return view('radioform',['result'=>$result, 'a'=>$a, 'b'=>$b ]) ;    
    }
}
