<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Car;
use App\Models\Car_mf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\Car as CarResource;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::get();
        return view("show", ["cars" => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { {
            $name = '';
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('image'); //project\public\car, //public_path(): trả về đường dẫn tới thư mục public
                $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/image
            }
            $car = new Car();
            $car->name = $request->name;
            $car->image = $name;
            $car->price = $request->price;
            $car->mf_id = $request->mf_id;
            $car->save();
            return response()->json(["status" => "200", "success" => true, "message" => "car record created successfully", "data" => $car]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        return response()->json($car, Response::HTTP_OK);
    }

 
    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $car->name = $request->name;
        $car->image = $request->image;
        $car->price = $request->price;
        $car->mf_id = $request->mf_id;
        $car->save();
        return response()->json([], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Car::find($id)->delete();
        return response()->json([], Response::HTTP_OK);
    }

    public function showcar()
    {
        $cars = Car::join('car_mfs', 'car_mfs.id', 'cars.mf_id')
            ->select('car_mfs.mf_name as name_mfs', 'cars.*')
            ->paginate(20);
        if ($cars) {
            return response()->json($cars, Response::HTTP_OK);
        } else {
            return response()->json([]);
        }
    }

    public function manufacturer()
    {
        $manu = Car_mf::all();
        return response()->json($manu, Response::HTTP_OK);
    }

    public function search(Request $request)
    {
        $cars = Car::join('car_mfs', 'car_mfs.id', 'cars.mf_id')
            ->where('name', 'like', '%' . $request->search . '%')
            ->select('car_mfs.mf_name as name_mfs', 'cars.*')
            ->get();
        return response()->json($cars, Response::HTTP_OK);
    }
}
