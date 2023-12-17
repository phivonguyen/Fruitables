<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceOrderMailable;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
// use App\Models\CouponOrder;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    //
    public function index(Request $request)
    {
        // $orders = Order::whereDate('created_at',$todayDate)->paginate(2);
        $todayDate = Carbon::now()->format('Y-m-d');
        if ($request->date != null) {
            $orders = Orders::when(
                $request->date != null,
                function ($q) use ($request) {
                    return $q->whereDate('created_at', $request->date);
                },
                function ($q) use ($todayDate) {
                    $q->whereDate('created_at', $todayDate);
                }
            )
                ->when($request->status != null, function ($q) use ($request) {

                    return $q->where('status_message', $request->status);
                })
                ->paginate(10);
        } else if ($request->status != null) {
            $orders = Orders::when($request->status != null, function ($q) use ($request) {
                return $q->where('status_message', $request->status);
            })->get();
        } else {
            $orders = Orders::get();
        }
        if ($request->has('showAll')) {
            $orders = Orders::get();
        }
        return view('admin.orders.index', compact('orders'));
    }

    public function show(int $orderId)
    {
        $order = Orders::where('id', $orderId)->first();
        // $couponOrder = CouponOrder::Where('order_id', $orderId)->first();
        if ($order) {
            $dateFilter = request()->query('date'); // Retrieve the 'date' query parameter
            return view('admin.orders.detail', compact(
                'order',
                'dateFilter',
                // 'couponOrder'
            ));
        } else {
            return redirect('admin/orders')->with('message', 'Order not found');
        }
    }



    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Orders::where('id', $orderId)->first();
        if ($order && $request->order_status != null) {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/' . $orderId)->with('message', 'Order updated successfully');
        } else {
            return redirect('admin/orders/' . $orderId)->with('message', 'Order not found');
        }
    }


    public function viewInvoice(int $orderId)
    {
        $order = Orders::findOrFail($orderId);
        // $couponOrder = CouponOrder::Where('order_id', $orderId)->first();
        return view('admin.invoice.generate-invoice', compact(
            'order',
            // 'couponOrder'
        ));
    }

    public function mailInvoice(int $orderId)
    {
        try {
            $order = Orders::findOrFail($orderId);
            Mail::to($order->email)->send(new InvoiceOrderMailable($order));
            return redirect('admin/orders/' . $orderId)->with('message', 'Invoice has been sent to ' . $order->email);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('admin/orders/' . $orderId)->with('message', 'Something went wrong!!');
        }
    }

    public function generateInvoice(int $orderId)
    {
        $order = Orders::findOrFail($orderId);
        // $couponOrder = CouponOrder::Where('order_id', $orderId)->first();
        $data = [
            'order' => $order,
            // 'couponOrder' => $couponOrder
        ];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);

        $todayDate = Carbon::now()->format('Y-m-d');
        return $pdf->download('invoice-' . $order->id . '-' . $todayDate . '.pdf');
    }
}
