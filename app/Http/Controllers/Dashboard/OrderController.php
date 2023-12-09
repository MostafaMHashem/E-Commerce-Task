<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    protected $view = 'dashboard.orders.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view($this->view . 'index');
    }
}
