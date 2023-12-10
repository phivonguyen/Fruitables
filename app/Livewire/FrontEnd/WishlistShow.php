<?php

namespace App\Livewire\FrontEnd;
use App\Models\Carts;
use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{

    public function removeWishlistItem(int $wishlistId)
    {
        // dd($wishlistId);
        Wishlist::where('user_id', auth()->user()->id)->where('id',$wishlistId)->delete();
        session()->forget('checkWishlist');

        $this->dispatch('wishlistAddedUpdated');
        $this->dispatch('message',
            text : 'Wish products has been removed',
            type : 'success',
            status : 200
        );
    }
    public function render()
    {
        $wishlist = []; // Initialize the $wishlist variable as an empty array

        // Check if the user is authenticated before accessing the wishlist
        if (auth()->check()) {
            $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
            $cart = Carts::where('user_id', auth()->user()->id)->get();
        }
        return view('livewire.front-end.wishlist-show',[
            'wishlist' => $wishlist,
            'cart' => $cart
        ]);
    }
}
