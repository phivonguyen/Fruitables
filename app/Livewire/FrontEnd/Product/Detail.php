<?php

namespace App\Livewire\FrontEnd\Product;

use Livewire\Component;
use App\Models\Carts;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class Detail extends Component
{
    public $category, $product, $quantityCount = 1;

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function addToWishList($productId)
    {
        // dd($productId);
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                // session()->flash('message', 'Your product has already been added to wishlist');
                $this->dispatch(
                    'message',
                    text: 'Your product has already been added to wishlists',
                    type: 'error',
                    status: 409
                );
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                //Event firing for wishlist increment
                $this->dispatch('wishlistAddedUpdated');
                // session()->flash('message', 'Added to Wishlist');
                $this->dispatch(
                    'message',
                    text: 'Added to Wishlist',
                    type: 'success',
                    status: 200
                );
            }
        } else {
            // session()->flash('message', 'Please login to continue');
            $this->dispatch(
                'message',
                text: 'Please login to continue',
                type: 'info',
                status: 401
            );
            return false;
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        } else {
            $this->dispatch(
                'message',
                text: 'Maximum quantity is 10',
                type: 'warning',
                status: 409
            );
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function addToCart(int $product_id)
    {
        if (Auth::check()) {
            // dd($product_id);
            if ($this->product->where('id', $product_id)->where('status', '0')->exists()) {
                if (Carts::where('user_id', auth()->user()->id)->where('product_id', $product_id)->exists()) {
                    $this->dispatch(
                        'message',
                        text: 'Product has been already added to the shopping cart.',
                        type: 'warning',
                        status: 200
                    );
                } else {
                    if ($this->product->quantity > 0) {
                        if ($this->product->quantity >= $this->quantityCount) {
                            Carts::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $product_id,
                                'quantity' => $this->quantityCount
                            ]);
                            $this->dispatch('CartAddedUpdated');
                            $this->dispatch(
                                'message',
                                text: 'Successfully added the item to the cart',
                                type: 'success',
                                status: 200
                            );
                        } else {
                            $this->dispatch(
                                'message',
                                text: 'Only ' . $this->product->quantity . ' product(s) left remaining in stock!',
                                type: 'warning',
                                status: 404
                            );
                        }
                    } else {
                        $this->dispatch(
                            'message',
                            text: ' Unfortunately, the item is not currently in stock.',
                            type: 'warning',
                            status: 404
                        );
                    }
                }
            } else {
                $this->dispatch(
                    'message',
                    text: 'The product is no longer offered or is out of circulation.',
                    type: 'warning',
                    status: 401
                );
            }
        } else {
            $this->dispatch(
                'message',
                text: 'Please login to add product to cart!',
                type: 'info',
                status: 401
            );
        }
    }



    public function render()
    {
        $checkWishlist = session()->get('checkWishlist');
        return view('livewire.front-end.product.detail', [
            'category' => $this->category,
            'product' => $this->product,
            'checkWishlist' => $checkWishlist
        ]);
    }
}
