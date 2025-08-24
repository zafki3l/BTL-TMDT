<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    public function monthlyReport(Request $request)
    {
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year);

        $totalSales = Order::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->where('status', 1) // giả sử 1 = completed
            ->sum('total_price');

        return view('staff.monthlyReport', compact('month', 'year', 'totalSales'));
    }
}
