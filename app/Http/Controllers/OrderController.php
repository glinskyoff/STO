<?php

namespace App\Http\Controllers;
use App\Models\brandmodels;
use App\Models\carmodels;
use App\Models\services;
use App\Models\station;
use App\Models\orders;
use Illuminate\Http\Request;



class OrderController extends Controller
{
    public function create()
    {
        $brands = brandmodels::all();
        $services = services::all();
        $stations = station::all();
        return view('sto', compact('brands', 'services', 'stations'));
    }
    public function admin()
    {
        // Получение всех заявок из таблицы orders
        $orders = orders::orderBy('id', 'desc')->get();

        // Передача данных в представление
        return view('admin', compact('orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'date' => 'required|date',
            'brandmodel_id' => 'required|exists:brandmodels,id',
            'carmodel_id' => 'required|exists:carmodels,id',
            'service_id' => 'required|exists:services,id',
            'station_id' => 'required|exists:stations,id',
        ]);

        orders::create($validated);

        return redirect()->back()->with('success', 'Заявка успешно создана!');
    }

    public function getCarModels($id)
    {
        $carModels = carmodels::where('brandmodel_id', $id)->get();
        return response()->json($carModels);
    }
}
