<?php

namespace App\Livewire\Admin\Contact;

use App\Models\ContactUs;
use Livewire\WithPagination;
use Livewire\Component;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $contact_id;

    public function deleteContact($contact_id)
    {
        $this->contact_id = $contact_id;
    }

    public function destroyContact()
    {

        $contact = ContactUs::find($this->contact_id);

        if (!$contact) {
            return;
        }


        $contact->delete();

        // Show a success message after successful deletion
        session()->flash('success', 'contact deleted successfully.');

        $this->contact_id = null;
    }
    public function render()
    {
        $contact = ContactUs::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.contact.index', [
            'contact' => $contact
        ]);
    }
}
