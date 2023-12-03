<?php

namespace App\Livewire\Admin\Origin;

use App\Models\Origin;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status, $origin_id, $category_id;

    public function rules () {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'category_id' => 'required|integer',
            'status' => 'nullable',
        ];
    }

    public function resetInput() {
        $this->name = null;
        $this->slug = null;
        $this->status = null;
        $this->origin_id = null;
        $this->category_id = null;
    }

    public function storeOrigin()
    {
        $validatedData = $this->validate();
        Origin::create
        ([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0' ,
            'category_id'=>$this->category_id
        ]);
        session()->flash('message','Origin added successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function closeModal () {
        $this->resetInput();
    }

    public function editOrigin(int $origin_id)
    {
        $this->origin_id = $origin_id;
        $origin = Origin::findOrFail($origin_id);
        $this->name = $origin->name;
        $this->slug = $origin->slug;
        $this->status = $origin->status;
        $this->category_id = $origin->category_id;

    }

    public function updateOrigin () {
        $validatedData = $this->validate();
        Origin::findOrFail($this->origin_id)->update
        ([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0' ,
            'category_id'=>$this->category_id

        ]);
        session()->flash('message', 'Origin Updated successfully');

        // $this->emit('originUpdated'); // Emit a custom event
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function deleteOrigin ($origin_id){
        $this->origin_id = $origin_id;
    }

    public function destroyOrigin () {
        Origin::findOrFail($this->origin_id)->delete();
        session()->flash('message','Origin deleted successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $categories = Category::where('status','0')->get();
        $origins = Origin::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.origin.index',
        [
            'origins'=>$origins,
            'categories'=>$categories
            ])->extends('layouts.admin')->section('content');
    }
}
