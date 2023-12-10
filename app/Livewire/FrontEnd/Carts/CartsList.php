<?php

namespace App\Livewire\FrontEnd\Carts;

use App\Models\Carts;
use Livewire\Component;

class CartsList extends Component
{
    public $cart, $totalPrice = 0;
    public function incrementQuantity(int $cartId)
    {
        $cartData = Carts::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            //check quantity in Cart with the quantity in database
            if ($cartData->product->quantity > $cartData->quantity) {
                $cartData->increment('quantity');
                $this->dispatch(
                    'message',
                    text: 'Quantity of product increased',
                    type: 'success',
                    status: 200
                );
            } else {
                $this->dispatch(
                    'message',
                    text: 'Only ' . $cartData->product->quantity . ' product(s) left are available',
                    type: 'error',
                    status: 409
                );
            }
        } else {
            $this->dispatch(
                'message',
                text: 'Something went wrong',
                type: 'error',
                status: 404
            );
        }
    }

    public function decrementQuantity(int $cartId)
    {
        $cartData = Carts::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->quantity > 1) {

                $cartData->decrement('quantity');
                $this->dispatch(
                    'message',
                    text: 'Quantity has been updated',
                    type: 'success',
                    status: 200
                );
            } else {
                $this->dispatch(
                    'message',
                    text: 'The quantity must exceed one!',
                    type: 'success',
                    status: 200
                );
            }
        } else {

            $this->dispatch(
                'message',
                text: 'Something went wrong!',
                type: 'error',
                status: 404
            );
        }
    }

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Carts::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        if ($cartRemoveData) {
            $cartRemoveData->delete();

            $this->dispatch('CartAddedUpdated');
            // session()->flash('message', 'Added to Wishlist');
            $this->dispatch(
                'message',
                text: 'The deletion of the cart item was executed successfully.',
                type: 'success',
                status: 200
            );
        } else {
            $this->dispatch(
                'message',
                text: 'Something went wrong',
                type: 'error',
                status: 404
            );
        }
    }
    public function render()
    {
        $this->cart = Carts::where('user_id', auth()->user()->id)->get();
        return view('livewire.front-end.carts.carts-list', [
            'cart' => $this->cart
        ]);
    }
}
