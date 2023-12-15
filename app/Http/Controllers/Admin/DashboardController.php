<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Models\Origin;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalOrigins = Origin::count();
        $totalUsers = User::count();
        $totalOrders = Orders::count();
        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $todayOrders = Orders::whereDate('created_at', $todayDate)->count();
        $monthOrders = Orders::whereMonth('created_at', $thisMonth)->count();
        $todayRevenue = OrderItem::join('orders', 'orders_items.order_id', '=', 'orders.id')
            ->whereDate('orders.created_at', Carbon::today())
            ->sum('orders_items.price');
        //Bang chart so 1
        $monthlyOrders = Orders::selectRaw('YEAR(created_at) year, MONTH(created_at) month, COUNT(*) as total_orders')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $labels = [];
        $values = [];

        foreach ($monthlyOrders as $order) {
            $labels[] = $order->month . '/' . $order->year;
            $values[] = $order->total_orders;
        }


        // Data chart 2
        $origins = Origin::all();
        $originLabels = $origins->pluck('name');
        // dd($originLabels);
        $originData = [];

        foreach ($origins as $origin) {
            $productCount = Product::where('Origin', $origin->name)->count();
            $originData[] = $productCount;
        }



        //Data chart Revenues
        $monthlyRevenue = OrderItem::selectRaw('YEAR(created_at) year, MONTH(created_at) month, SUM(price * quantity) as total_revenue')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $revenueLabels = [];
        $revenueData = [];

        foreach ($monthlyRevenue as $revenue) {
            $revenueLabels[] = $revenue->month . '/' . $revenue->year;
            $revenueData[] = $revenue->total_revenue;
        }

        // Data User chart
        $userRoles = User::groupBy('roles')
            ->selectRaw('roles, COUNT(*) as user_count')
            ->get();

        $roleLabels = $userRoles->pluck('roles');
        $roleData = $userRoles->pluck('user_count');

        $roleLabels = $roleLabels->map(function ($role) {
            switch ($role) {
                case 0:
                    return 'User';
                case 1:
                    return 'Admin';
                case 3:
                    return 'Twitter/Google User';
                default:
                    return '';
            }
        });
        $chartData = [
            'labels' => $labels,
            'values' => $values,
            'originLabels' => $originLabels,
            'originData' => $originData,
            'revenueLabels' => $revenueLabels,
            'revenueData' => $revenueData,
            'roleLabels' => $roleLabels,
            'roleData' => $roleData,
        ];

        //Top 5 user buy for the most revenues for shop Fruitables
        $top5Users = User::join('orders', 'users.id', '=', 'orders.user_id')
            ->join('orders_items', 'orders.id', '=', 'orders_items.order_id')
            ->selectRaw('users.name, users.email, SUM(orders_items.quantity * orders_items.price) as top5_user')
            ->groupBy('users.id', 'users.name', 'users.email')
            ->orderByDesc('top5_user')
            ->limit(5)
            ->get();

        // Top 5  Products is bought for the most by Users!
        $top5Products = Product::join('orders_items', 'products.id', '=', 'orders_items.product_id')
            ->selectRaw('products.name, SUM(orders_items.quantity) as total_quantity, SUM(orders_items.quantity * orders_items.price) as total_revenue')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'thisMonth',
            'todayDate',
            'totalProducts',
            'totalCategories',
            'totalOrigins',
            'totalUsers',
            'totalOrders',
            'todayOrders',
            'monthOrders',
            'todayRevenue',
            'chartData',
            'top5Users',
            'top5Products'
        ));
    }
}
