<?php

namespace App\Livewire\Admin\About;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use App\Models\About;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $about_id;

    public function deleteAbout($about_id)
    {
        // Set the category_id to the selected category_id
        $this->about_id = $about_id;
    }

    public function destroyAbout()
    {
        // Find the category to be deleted
        $about = About::find($this->about_id);

        if (!$about) {
            // Category not found, do something (optional)
            // For example, show an error message or log the issue.
            return;
        }

        // Delete the category from the database
        $about->delete();

        // Delete the associated image file from the server
        $path = 'uploads/about/' . $about->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        // Show a success message after successful deletion
        session()->flash('success', 'about deleted successfully.');
        // Reset the category_id property
        $this->about_id = null;
    }
    public function render()
    {
        $about = About::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.about.index',['about' => $about]);
    }
}
