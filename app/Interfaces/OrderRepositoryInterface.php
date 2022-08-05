<?php

namespace App\Interfaces;

interface OrderRepositoryInterface
{
    public function uploadOrder(array $orderDetails);
}
