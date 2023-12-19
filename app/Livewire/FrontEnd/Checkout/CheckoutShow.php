<?php

namespace App\Livewire\FrontEnd\Checkout;

use App\Models\Carts;
use App\Models\Orders;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Mail\MailController;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount, $totalPrice = 0;


    public $fullname, $email, $phone, $postcode, $address, $payment_mode = NULL, $payment_id = NULL, $user_description = NULL;

    protected $listeners = [
        'validationForAll',
        'transactionDispatch' => 'paidOnlineOrder',
        'momoOrderEmit' => 'momoOrder',
    ];

    public function paidOnlineOrder($value)
    {
        // $this->newTransaction = $value;
        // dd($value);
        $this->payment_id = $value;
        $this->payment_mode = 'Paid by Paypal';

        $codOrder = $this->placeOrder();
        if ($codOrder) {
            // When checkout is successful, delete the Cart items
            Carts::where('user_id', auth()->user()->id)->delete();
            try{
                $order = Orders::findOrFail($codOrder->id);
                Mail::to($codOrder->email)->send(new PlaceOrderMailable($order));
            }catch(\Exception $e){

            }
            session()->flash('message', 'Placed order successfully');

            $this->dispatch(
                'message',
                text: 'Order placed successfully',
                type: 'success',
                status: 200
            );
            return redirect()->to('appreciation');
        } else {
            $this->dispatch(
                'message',
                text: 'Something went wrong',
                type: 'error',
                status: 500
            );
        }
    }

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:120',
            'email' => 'required|email|max:120',
            'phone' => 'required|string|max:12|min:9',
            'postcode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
            'user_description' => 'required|string|max:500',
        ];
    }

    public function validationForAll()
    {
        $this->validate();
    }

    public function placeOrder()
    {
        $this->validate();
        $order = Orders::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'Fruit-' . Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'postcode' => $this->postcode,
            'address' => $this->address,
            'status_message' => 'In Progress...',
            'user_description' => $this->user_description,
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);
        foreach ($this->carts as $item) {
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product->id,
                'quantity' => $item->quantity,
                'price' => $item->product->selling_price
            ]);

            //When checkout decreases the quantity
            $item->product()->where('id', $item->product_id)->decrement('quantity', $item->quantity);
        }
        return $order;
    }

    public function codOrder()
    {
        $this->payment_mode = 'Cash On Delivery';
        $codOrder = $this->placeOrder();
        if ($codOrder) {
            // When checkout is successful, delete the Cart items
            Carts::where('user_id', auth()->user()->id)->delete();
            try{
                $order = Orders::findOrFail($codOrder->id);
                Mail::to($codOrder->email)->send(new PlaceOrderMailable($order));
            }catch(\Exception $e){
            }
            session()->flash('message', 'The order has been successfully placed.');
            $this->dispatch(
                'message',
                text: 'The order has been successfully placed.',
                type: 'success',
                status: 200
            );
            return redirect()->to('appreciation');
        } else {
            $this->dispatch(
                'message',
                text: 'Something went wrong',
                type: 'error',
                status: 500
            );
        }
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Carts::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $item) {
            $this->totalProductAmount += $item->product->selling_price * $item->quantity;
        }
        return $this->totalProductAmount;
    }
    public function render()
    {
        $this->carts = Carts::where('user_id', auth()->user()->id)->get();
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->phone = auth()->user()->user_detail->phone;
        $this->email = auth()->user()->email;
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.front-end.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount,
            'carts' => $this->carts
        ]);
    }
}
