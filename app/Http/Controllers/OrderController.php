<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('pages.orders', [
            'orders' => Order::orderBy('status', 'desc')->paginate(10)
        ]);
    }

    public function complete(Order $order): RedirectResponse
    {
        $order->update([
            'status' => 'completed'
        ]);

        return to_route('orders');
    }

    public function cancel(Order $order): RedirectResponse
    {
        $order->update([
            'status' => 'cancelled'
        ]);

        return to_route('orders');
    }
}
