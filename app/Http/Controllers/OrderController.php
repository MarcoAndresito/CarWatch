<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Car;
use App\Models\Detail;
use Inertia\Inertia;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\exitPoint;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
            ->join('cars', 'cars.id', '=', 'orders.car_id')
            ->select('cars.*', 'orders.*')
            ->get();

        return Inertia::render('Order/Index', [
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Order/Create', [
            'services' => Service::all()->where('disable', '=', false)
        ]);
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
            'carrito' => 'required',
        ]);

        $data = $request->all();

        $car = Car::all()->where('registration', '=', $data['registration'])->first();

        $order = Order::create([
            'car_id' => $car->id,
            'user_id' => $request->user()->id,
        ]);

        foreach ($data['carrito'] as $key => $value) {
            $detail = Detail::create([
                'order_id' => $order->id,
                'service_id' => $value['service_id'],
                'price' => $value['price'],
            ]);
        }

        return redirect()->route('order.index');
    }

    public function dpf(Order $order)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(
            "
            <h1>Orden de servicio</h1>
            id $order->id
            created_at $order->created_at
            car_id $order->car_id
            user_id $order->user_id
            "
        );

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("Order-$order->id.dpf");
    }
}
