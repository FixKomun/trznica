<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Stripe\Exception\CardException;

class PaymentController extends Controller
{
    public function storeCard(Request $request)
    {
        $collection = collect($request->cart);
        $cartItems = $collection->map(function ($item) {
            return
                'Product Code: ' . $item["id"] . ', ' .
                'Product Name: ' . $item["name"] . ', ' .
                'Product Quantity: ' . $item["quantity"] . ', ' .
                'Product Price: ' . $item["price"];
        })->values()->toJson();
        //dd($request->all());
        try {
            // $confirmation_number = bin2hex(random_bytes(12));
            $confirmation_number = Str::uuid();
            $user = new User;
            $payment = $user->charge($request->total_price, $request->payment_method_id, [
                'receipt_email' => $request->email,
                'statement_descriptor' => 'Web Tržnica',
                'description' => 'Kupili ste proizvod sa web tržnice!',
                'metadata' => [
                    'Confirmation # ' => $confirmation_number,
                    'Item(s)' => $cartItems,
                    'Total Item(s) Count' => $request->totalItemsCount,
                    'Total Price' => $request->total_price,
                    'Remark' => $request->remark
                ],

            ]);
            $payment = $payment->asStripePaymentIntent();
            return response([
                'success' => true,
            ], 200);
        } catch (CardException $e) {
            return response([
                'errors' => $e->getMessage()
            ], 500);
        } catch (\Error $e) {
            return response([
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}
