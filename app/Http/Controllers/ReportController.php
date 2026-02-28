<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function sales(Request $request)
    {
        $query = Order::with('client');

        // Filtro por fecha inicio
        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }

        // Filtro por fecha fin
        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        $orders = $query->get();

        $totalSold = $orders->sum('total');

        return [
            'filters' => [
                'from' => $request->from,
                'to' => $request->to,
            ],
            'total_sold' => $totalSold,
            'orders' => $orders,
        ];
    }

    public function salesView(Request $request)
    {
    $query = Order::with('client');

    if ($request->filled('from')) {
        $query->whereDate('created_at', '>=', $request->from);
    }

    if ($request->filled('to')) {
        $query->whereDate('created_at', '<=', $request->to);
    }

    $orders = $query->get();
    $totalSold = $orders->sum('total');

    return view('reports.sales', compact('orders', 'totalSold'));
    }
}