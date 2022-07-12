<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Tính toán</title>
</head>
<body>
    <h1>Phép cộng</h1>
    <form action="{{route('calculate.post')}}" method="post">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <input type="text" style="width: 400px" name="a" value="{{ isset($a)?$a:''}}"/> 
            <select name="c" id="c">
                <option name="cc" value="cc">+</option>
                <option name="tr" value="tr">-</option>
                <option name="nh" value="nh">*</option>
                <option name="ch" value="ch">/</option>
              </select>
            <input type="text" style="width: 400px" name="b" value="{{ isset($b)?$b:''}}"/> = 0
            <button type="submit" name="" class="btn btn-primary">Tính</button>
        </form>
       <h3>{{isset($kq)?$kq:''}}</h3>
      </form>
      
</body>
</html>