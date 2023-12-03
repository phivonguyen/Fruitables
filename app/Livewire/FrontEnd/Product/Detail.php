<?php

namespace App\Livewire\FrontEnd\Product;

use Livewire\Component;
use App\Models\Cart;
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
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Your product has already been added to wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);

                //Event firing for wishlist increment
                $this->emit('wishlistAddedUpdated');


                // session()->flash('message', 'Added to Wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to Wishlist',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            // session()->flash('message', 'Please login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Maximum quantity is 10',
                'type' => 'warning',
                'status' => 409
            ]);
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

                //check for color product quantity and add to cart
                if ($this->product->productColors()->count() > 1) {
                    if ($this->prodColorSelectedQuantity != NULL) {

                        if (Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $product_id)
                            ->where('product_color_id', $this->productColorId)
                            ->exists()
                        ) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product Already Added',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        } else {
                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity >= $this->quantityCount) {
                                    //Insert Product to Cart with color and quantity
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $product_id,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);
                                    $this->emit('CartAddedUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product added successfully to cart',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only ' . $productColor->quantity . ' product(s) left!!',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Select Your Color Before Add to Cart',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Your Color Before Add to Cart',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                } else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $product_id)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product already addded',
                            'type' => 'warning',
                            'status' => 200
                        ]);
                    } else {
                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity >= $this->quantityCount) {
                                //Insert Product to Cart without color
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $product_id,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdated');

                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product added successfully to cart',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only ' . $this->product->quantity . ' product(s) left hmm!!',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of Stock ! Please comeback later :D',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product does not exists :(',
                    'type' => 'warning',
                    'status' => 401
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to Add to Cart',
                'type' => 'info',
                'status' => 401
            ]);
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
