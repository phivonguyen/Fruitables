<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Orders::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(4);
        return view('frontend.order.index', compact('orders'));
    }

    public function detail($orderId)
    {
        $order = Orders::where('user_id', Auth::user()->id)->where('id', $orderId)->first();
        if ($order) {
            return view('frontend.order.detail', compact('order'));
        } else {
            return redirect()->back()->with('message', 'Order not found or not existed');
        }
    }
}
