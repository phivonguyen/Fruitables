<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
class ContactController extends Controller
{
    public function index()
    {
        $contact = ContactUs::all();
        return view("admin.contact.index", compact("contact"));
    }
    public function reply($id)
    {
        $contact = ContactUs::find($id);
        return view('admin.contact.reply', compact('contact'));
    }
    public function delete($id)
    {
        $contact = ContactUs::find($id);
        if ($contact != null) {
            $contact->delete();
            return redirect()->route("contact/index")->with("success", "Delete contact successfully");
        }
    }
}
