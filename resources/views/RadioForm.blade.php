<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Phép cộng</h1>
@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{route('radioform.post')}}" method="POST">
       
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="text" style="width: 400px" name="a" value="{{ isset($a)?$a:''}}"/> 
        <input type="text" style="width: 400px" name="b" value="{{ isset($b)?$b:''}}"/>
        <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="calculate" value="cong">Cộng
        </label>
        </div>
        <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="calculate" value="tru">Trừ 
        </label>
        </div>
        <div class="form-check disabled">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="calculate"  value="nhan">Nhân
        </label>
        </div>
        <div class="form-check disabled">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="calculate"  value="chia">Chia
        </label>
        </div>
        <button type="submit" name="" class="btn btn-primary">Tính</button>
        <h3>{{isset($result)?$result:''}}</h3>
</body>
</html>