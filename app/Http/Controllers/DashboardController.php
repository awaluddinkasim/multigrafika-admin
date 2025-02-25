<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Sticker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('pages.dashboard', [
            'stickers' => Sticker::count(),
            'orders' => Order::count(),
            'users' => User::count(),
        ]);
    }
}
