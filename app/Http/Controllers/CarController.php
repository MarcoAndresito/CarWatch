<?php

namespace App\Http\Controllers;

use \App\Models\Car;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = null;
        if (request()->has('filter') && request()->filled('filter')) {
            $filter = '%' . request()->get('filter') . '%';
            $result = Car::where('registration', 'like', $filter)->get();
        } else {
            $result = Car::all();
        }
        return Inertia::render('Car/Index', [
            'cars' => $result,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Car/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'registration' => 'required',
            'name' => 'required',
            'nit' => 'required'
        ]);

        $data = $request->all();

        Car::create($data);

        return redirect()->route('car.index');
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
        return Inertia::render('Car/Show', [
            'car' => $car
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);



        return Inertia::render('Car/Edit', [
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'registration' => 'required',
            'name' => 'required',
            'nit' => 'required',
            'type' => 'required'
        ]);

        $data = $request->all();

        $car = Car::find($id);

        $car->registration = $data['registration'];
        $car->name = $data['name'];
        $car->nit = $data['nit'];
        $car->type = $data['type'];

        $car->update();

        return redirect()->route('car.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect()->route('car.index');
    }
}
