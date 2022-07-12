<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/show2.css">

    <title>Document</title>
</head>
<a onclick="return confirm('Are you sure?')" role="button" href="/create" class="btn btn-primary">Create</a>
<body>
   
     <div class="container">
      <div class="alert">
        @if (Session::has ('success'))
        {{ Session::get('success')}}
        @endif
    </div>
    
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Image</th>
                <th scope="col">Manufacturer</th>
                <th>TÙy chọn</th>
              </tr>
            </thead>
            @foreach($cars as $car)
            <tbody>
              <tr>
                <th scope="row">{{ $car->id }}</th>
                <td>{{ $car->name }}</td>
                <td>{{ $car->price }}</td>
                <td> <img id="preview-img" class="img" width="200px" height="200px" src="/image/{{ $car->image }}" alt="..."></td>
                <td>{{ $car->mf->mf_name }}</td>
                <td>
                    <a onclick="return confirm('Are you sure?')"  href="/{{$car["id"]}}/edit" role="button" class="btn btn-primary">
                        Edit
                    </a>
                    <a onclick="return confirm('Are you sure?')" href="/delete/{{$car["id"]}}" role="button" class="btn btn-danger mt-2">
                        Delete
                    </a>
                </td>
              </tr>
            </tbody>
            @endforeach
        </table>
    </div>
 
</body>
</html>