<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDeliveryRequest;
use App\Http\Requests\OrderUserRequest;
use Illuminate\Http\Request;
use App\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    public function validateUser(OrderUserRequest $request)
    {
        $request->validated();
    }
    public function validateDelivery(OrderDeliveryRequest $request)
    {
        $request->validated();
    }
    public function uploadOrder(Request $request)
    {

        $orderDetails = ([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'address' => $request->address,
            'zipCode' => $request->zipCode,
            'country' => $request->country,
            'city' => $request->city,
            'selectedPayment' => $request->selectedPayment,
            'products' => $request->products,
        ]);

        return response()->json([
            'data' => $this->orderRepository->uploadOrder($orderDetails)
        ]);
    }
}
