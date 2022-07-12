<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$action == "create" ? "Create" : "Edit | ".$cars["id"]}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <form action={{ $action == "create" ? "/store" : "/update/".$cars["id"] }} method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <label class="col-3" for="name">Name:</label>
                <input type="text" class="col form-control" name="name" value="{{isset($cars) ? $cars["name"] :""}}">
            </div>
            <div class="row mt-3">
                <label class="col-3" for="price">Price:</label>
                <input type="text" class="col form-control" name="price" value="{{isset($cars) ? $cars["price"] :""}}">
            </div>
            <div class="row mt-3">
                <label for="exampleInputEmail1" id="manu">Manufacturers</label>
                        {{-- <select id="cars" name="mf_name">
                            @foreach ($list as $car_item)
                        <option value="{{$car_item->id}}">{{$car_item->mf_name}}</option>
                        @endforeach
                        </select> --}}
                        <select name="mf_id" id="">
                            @foreach($list as $car_item)
                            <option {{isset($car) && $car->mf_id === $car_item->id ? 'selected' : ""}} value="{{$car_item->id}}">{{$car_item->mf_name}}</option>
                        @endforeach
                        </select>

            </div>
            <div class="row mt-3">
                <label class="col-3" for="description">Image:</label>
                <input type="file"  class="col form-control" name="image" value="{{isset($cars) ? $cars["image"]: ""}}" onchange="changeImage(event)".required>
                @if (isset($cars))
                    <img  id ="newImage" src="/image/{{ $cars->image }}" class="col-6 img-thumbnail" style="width: 10rem" alt="">
                @endif
                <script>
                    const changeImage = (e) => {
                   console.log('change')
                   var imgEle = document.getElementById('newImage')
                   imgEle.src = URL.createObjectURL(e.target.files[0])
                   imgEle.onload = () => {
                    RL.revokeObjectURL(output.src)
                   }
               }
                  </script>
                  
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</body>
</html>