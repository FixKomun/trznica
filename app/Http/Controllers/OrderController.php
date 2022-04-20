<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function validateUser(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'email' => 'bail|required|email|max:40',
            'phoneNumber' => 'required|max:17'
        ]);
    }
    public function validateDelivery(Request $request)
    {
        $this->validate($request, [
            'address' => 'required|max:50',
            'zipCode' => 'bail|required|numeric|',
            'country' => 'bail|required|string|max:30',
            'city' => 'bail|required|string|max:30',
        ]);
    }
    public function uploadOrder(Request $request)
    {
        $order = Order::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'address' => $request->address,
            'zipCode' => $request->zipCode,
            'country' => $request->country,
            'city' => $request->city,
            'selectedPayment' => $request->selectedPayment,
            'products' => $request->products
        ]);
        return $order;
    }
}
