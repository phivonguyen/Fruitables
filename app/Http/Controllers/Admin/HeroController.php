<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hero;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\HeroFormRequest;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::all();
        return view('admin.hero.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.hero.create');
    }

    public function store(HeroFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/hero/', $filename);
            $validatedData['image'] = 'uploads/hero/' . $filename;
        }

        $validatedData['status'] = $request->status == true ? '1' : '0';
        // dd($request->validated());
        Hero::create([
            'title' => $validatedData['title'],
            'image' => $validatedData['image'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'href' => $validatedData['href'],
        ]);

        return redirect('admin/hero')->with('message', 'Hero for header added successfully');
    }

    public function edit(Hero $hero)
    {
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(HeroFormRequest $request, Hero $hero)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {

            $destination = $hero->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/hero/', $filename);
            $validatedData['image'] = 'uploads/hero/' . $filename;
        }

        $validatedData['status'] = $request->status == true ? '1' : '0';
        // dd($request->validated());
        // dd($request->file('image'));
        // dd($request->all());
        Hero::where('id', $hero->id)->update([
            'title' => $validatedData['title'],
            'image' => $validatedData['image'] ?? $hero->image,
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'href' => $validatedData['href'],
        ]);

        return redirect('admin/hero')->with('message', 'Hero Header Updated Successfully');
    }

    public function delete(Hero $hero)
    {

        if ($hero->count() > 0) {
            $destination = $hero->image;
            // dd($destination);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $hero->delete();
            return redirect('admin/hero')->with('message', 'Hero Header Deleted Successfully');
        }
        return redirect('admin/hero')->with('message', 'Something went wrong');
    }
}
