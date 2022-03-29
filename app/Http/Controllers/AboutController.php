<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::find(1);

        return view('about.index', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $attr = $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'content' => 'required',
        ]);

        try {
            DB::beginTransaction();

            if ($request->file('image')) {
                Storage::delete($about->image);
                $image = $request->file('image');
                $attr['image'] = $image->storeAs('images/about', date('YmdHis') . '.' . $image->extension());
            } else {
                $attr['image'] = $about->image;
            }

            $about->update($attr);

            DB::commit();

            return redirect()->route('about.index')->with('success', 'About page successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
