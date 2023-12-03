<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        $category = Category::find($this->category_id);
        if (!$category) {
            return;
        }
        $category->delete();
        $path = 'uploads/category/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        session()->flash('success', 'Category deleted successfully.');
        $this->category_id = null;
    }
    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
