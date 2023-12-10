<?php

namespace App\Livewire\FrontEnd\Carts;

use App\Models\Carts;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartsCounter extends Component
{
    public $cartCounter;

    protected $listeners = ['CartAddedUpdated' => 'checkCartCounter'];

    public function checkCartCounter()
    {
        if (Auth::check()) {
            return $this->cartCounter = Carts::where('user_id', auth()->user()->id)->count();
        } else {
            return $this->cartCounter = 0;
        }
    }
    public function render()
    {
        $this->cartCounter = $this->checkCartCounter();
        return view('livewire.front-end.carts.carts-counter', [
            'cartCounter' => $this->cartCounter
        ]);
    }
}
