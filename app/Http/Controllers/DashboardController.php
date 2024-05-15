<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $pendapatan_harian = Order::whereDate('created_at', $today)->sum('subtotal');
        $pelanggan_baru = Customer::whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->count();
        $harus_dikirim = Order::where('status', 1)->count();
        $total_produk = Product::count();

        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $dailyIncome = Order::where('status', '<>', 0)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, SUM(subtotal) as income')
            ->groupBy('date')
            ->pluck('income', 'date')
            ->toArray();

        return view("dashboard", compact('total_produk', 'pendapatan_harian', 'harus_dikirim', 'pelanggan_baru', 'dailyIncome'));
    }
}
