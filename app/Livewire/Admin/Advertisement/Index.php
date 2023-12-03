<?php

namespace App\Livewire\Admin\Advertisement;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use App\Models\Advertisememt;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $advertisement_id;

    public function deleteAdvertisement($advertisement_id)
    {
        // Set the category_id to the selected category_id
        $this->advertisement_id = $advertisement_id;
    }

    public function destroyAdvertisement()
    {
        // Find the category to be deleted
        $advertisement = Advertisememt::find($this->advertisement_id);

        if (!$advertisement) {
            // Category not found, do something (optional)
            // For example, show an error message or log the issue.
            return;
        }

        // Delete the category from the database
        $advertisement->delete();

        // Delete the associated image file from the server
        $path = 'uploads/advertisement/' . $advertisement->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        // Show a success message after successful deletion
        session()->flash('success', 'advertisement deleted successfully.');
        // Reset the category_id property
        $this->advertisement_id = null;
    }
    public function render()
    {
        $advertisement = Advertisememt::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.advertisement.index',['advertisement' => $advertisement]);
    }
}
