<?php

namespace App\Livewire\FrontEnd\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{

    public $products, $category, $originInputs = [], $priceInput;

    protected $queryString = [
        'originInputs'  => ['except' => '', 'as' => 'origin'],
        'priceInput'  => ['except' => '', 'as' => 'price']
    ];

    public function mount($category)
    {

        $this->category = $category;
    }

    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->originInputs, function ($q) {
                $q->whereIn('origin', $this->originInputs);
            })
            ->when($this->priceInput, function ($q) {

                $q->when($this->priceInput == 'high-to-low', function ($q2) {
                    $q2->orderBy('selling_price', 'DESC');
                })
                    ->when($this->priceInput == 'low-to-high', function ($q2) {
                        $q2->orderBy('selling_price', 'ASC');
                    });
            })
            ->where('status', '0')
            ->get();
        return view('livewire.front-end.product.index', [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
