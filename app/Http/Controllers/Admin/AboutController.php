<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //
    public function index()
    {
        $about = About::all();
        return view("admin.about.index", compact("about"));
    }

    public function create()
    {
        return view("admin.about.create");
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            About::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => 'images/' . $imageName,
                'status' => $request->input('status'),
            ]);

            return redirect()->route('about/index')->with('success', 'Add about successfully');
        } else {
            return redirect()->route('about/create')->with('error', 'Please choose an image');
        }
    }
    public function edit($id)
    {
        $about = About::find($id);
        if (!$about) {
            return redirect()->route("about/index")->with("error", "about not found");
        }

        return view("admin.about.edit", compact("about"));
    }

    public function update(Request $request, $id)
    {
        $about = About::find($id);

        if (!$about) {
            return redirect()->route("about/index")->with("error", "about not found");
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $about->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => 'images/' . $imageName,
                'status' => $request->input('status'),
            ]);

            return redirect()->route("about/index")->with("success", "Update about successfully");
        } else {
            // Handle case where no new image is provided
            $about->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ]);

            return redirect()->route("about/index")->with("success", "Update about successfully");
        }
    }

    public function delete($id)
    {
        $about = About::find($id);
        if ($about != null) {
            $about->delete();
            return redirect()->route("about/index")->with("success", "Delete about successfully");
        }
    }
    public function updateStatus($id, $status)
    {
        $About = About::find($id);

        if (!$About) {
            return redirect()->route("About/index")->with("error", "About not found");
        }

        $About->update(['status' => $status]);

        return redirect()->route("About/index")->with("success", "Update status successfully");
    }
}
