<?php

namespace App\Http\Controllers;

use Carbon\Month;
use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('pages.orders', [
            'orders' => Order::orderBy('status', 'desc')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function complete(Order $order): RedirectResponse
    {
        $order->update([
            'status' => 'completed'
        ]);

        return to_route('orders')->with('success', __('order.completed'));
    }

    public function cancel(Order $order): RedirectResponse
    {
        $order->update([
            'status' => 'cancelled'
        ]);

        return to_route('orders')->with('success', __('order.cancelled'));
    }

    public function invoice(Order $order)
    {
        $pdf = Pdf::loadView('pdf.invoice', [
            'order' => $order
        ]);

        return $pdf->stream('invoice-' . $order->order_id . '.pdf');
    }

    public function export($period): Response
    {
        if ($period == 'monthly') {
            $orders = Order::where('status', 'completed')
                ->whereYear('created_at', date('Y'))
                ->orderBy('status', 'desc')->orderBy('created_at', 'desc')
                ->get()->groupBy('month');
            $view = 'pdf.monthly-sales';
        } elseif ($period == 'daily') {
            $orders = Order::where('status', 'completed')
                ->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))
                ->orderBy('status', 'desc')->orderBy('created_at', 'desc')
                ->get()->groupBy('day');
            $view = 'pdf.daily-sales';
        }

        $pdf = Pdf::loadView($view, [
            'orders' => $orders
        ]);

        return $pdf->stream();
    }
}
