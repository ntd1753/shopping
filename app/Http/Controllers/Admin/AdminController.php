<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    protected function getGrowthRateTotalProduct()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $lastMonth = Carbon::now()->subMonth()->format('Y-m');

        $currentMonthTotal = DB::table('products')
            ->where('created_at', 'like', $currentMonth . '%')
            ->count();

        $lastMonthTotal = DB::table('products')
            ->where('created_at', 'like', $lastMonth . '%')
            ->count();

        if ($lastMonthTotal > 0) {
            $growthRate = (($currentMonthTotal - $lastMonthTotal) / $lastMonthTotal) * 100;
        } else {
            $growthRate = 100; // Nếu tháng trước không có sản phẩm, coi như tăng trưởng 100%
        }

        return $growthRate;
    }
    protected function getGrowthRateOrder(){
        $currentMonth = Carbon::now()->format('Y-m');
        $lastMonth = Carbon::now()->subMonth()->format('Y-m');
        $currentMonthTotal = DB::table('orders')
            ->where('created_at', 'like', $currentMonth . '%')
            ->count();

        $lastMonthTotal = DB::table('orders')
            ->where('created_at', 'like', $lastMonth . '%')
            ->count();
        if ($lastMonthTotal > 0) {
            $growthRate = (($currentMonthTotal - $lastMonthTotal) / $lastMonthTotal) * 100;
        } else {
            $growthRate = 100; // Nếu tháng trước không có đơn, coi như tăng trưởng 100%
        }

        return $growthRate;
    }
    protected function getGrowthRateRevenue(){
        $currentMonth = Carbon::now()->format('Y-m');
        $lastMonth = Carbon::now()->subMonth()->format('Y-m');
        $currentMonthTotal = DB::table('orders')
            ->where('created_at', 'like', $currentMonth . '%')
            ->sum('total');

        $lastMonthTotal = DB::table('orders')
            ->where('created_at', 'like', $lastMonth . '%')
            ->sum('total');
        if ($lastMonthTotal > 0) {
            $growthRate = (($currentMonthTotal - $lastMonthTotal) / $lastMonthTotal) * 100;
        } else {
            $growthRate = 100; // Nếu tháng trước không có đơn, coi như tăng trưởng 100%
        }

        return $growthRate;
    }

    public function index(){
        $currentMonth = Carbon::now()->format('Y-m');
        return view('admin.content.index',
            [
                'totalProduct'=>Product::count(),
                'totalProductGrowRate'=>$this->getGrowthRateTotalProduct(),
                'newOrder'=>Order::where('created_at', 'like', $currentMonth . '%')->count(),
                'orderGrowRate'=>$this->getGrowthRateOrder(),
                'revenue'=>Order::where('created_at', 'like', $currentMonth . '%')->sum('total'),
                'revenueGrowRate'=>$this->getGrowthRateRevenue()

            ]);
    }
}
