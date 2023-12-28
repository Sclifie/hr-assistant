<?php

namespace App\Http\Controllers;

use App\Http\Requests\HireOrderRequest;
use App\Models\HireOrder;

class HireOrderController extends Controller
{
    public function index()
    {
        return HireOrder::all();
    }
    
    public function store(HireOrderRequest $request)
    {
        return HireOrder::create($request->validated());
    }
    
    public function show(HireOrder $hireOrder)
    {
        return $hireOrder;
    }
    
    public function update(HireOrderRequest $request, HireOrder $hireOrder)
    {
        $hireOrder->update($request->validated());
        
        return $hireOrder;
    }
    
    public function destroy(HireOrder $hireOrder)
    {
        $hireOrder->delete();
        
        return response()->json();
    }
}
