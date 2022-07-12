<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CalculateController extends Controller
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
    return view('calculate') ->withErrors($errors);
            
}
        $a=$req->input('a');
        $b=$req->input('b');
        $c=$req->input('c');
        if($c== 'cc')
            $kq = $a + $b;
        else if($c== 'tr')
            $kq = $a - $b;
        else if($c== 'nh')
            $kq=$a*$b;
        else
            $kq=$a/$b;
        return view('calculate',['kq'=>$kq,'a'=>$a,'b'=>$b, 'c'=>$c]);

}
}