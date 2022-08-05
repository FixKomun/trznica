<?php

namespace App\Repositories;

use App\Models\Order;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function uploadOrder(array $orderDetails)
    {
        //Slanje maila narudžbe
        $email  = $orderDetails['email'];
        $firstName = $orderDetails['firstName'];
        $lastName = $orderDetails['lastName'];
        $address = $orderDetails['address'];
        $city = $orderDetails['city'];
        $country = $orderDetails['country'];
        $zipCode = $orderDetails['zipCode'];
        $selectedPayment = $orderDetails['selectedPayment'];

        Mail::send('Mails.order', ['firstName' => $firstName, 'lastName' => $lastName, 'address' => $address, 'city' => $city, 'country' => $country, 'zipCode' => $zipCode, 'selectedPayment' => $selectedPayment], function (Message $message) use ($email) {

            $message->to($email);
            $message->subject('Vaša narudžba s web tržnice je zaprimljena');
        });

        return Order::create($orderDetails);
    }
}
