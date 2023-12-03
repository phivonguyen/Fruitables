<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advertisememt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    //
    public function index()
    {
        $advertisement = Advertisememt::all();
        return view("admin.advertisement.index", compact("advertisement"));
    }

    public function create()
    {
        return view("admin.advertisement.create");
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            Advertisememt::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => 'images/' . $imageName,
                'status' => $request->input('status'),
            ]);

            return redirect()->route('advertisement/index')->with('success', 'Add advertisement successfully');
        } else {
            return redirect()->route('advertisement.create')->with('error', 'Please choose an image');
        }
    }
    public function edit($id)
    {
        $advertisement = Advertisememt::find($id);
        if (!$advertisement) {
            return redirect()->route("advertisement/index")->with("error", "advertisement not found");
        }

        return view("admin/advertisement/edit", compact("advertisement"));
    }

    public function update(Request $request, $id)
    {
        $advertisement = Advertisememt::find($id);

        if (!$advertisement) {
            return redirect()->route("advertisement/index")->with("error", "advertisement not found");
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $advertisement->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => 'images/' . $imageName,
                'status' => $request->input('status'),
            ]);

            return redirect()->route("advertisement/index")->with("success", "Update advertisement successfully");
        } else {
            // Handle case where no new image is provided
            $advertisement->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ]);

            return redirect()->route("advertisement/index")->with("success", "Update advertisement successfully");
        }
    }

    public function delete($id)
    {
        $advertisement = Advertisememt::find($id);
        if ($advertisement != null) {
            $advertisement->delete();
            return redirect()->route("advertisement/index")->with("success", "Delete advertisement successfully");
        }
    }
}
