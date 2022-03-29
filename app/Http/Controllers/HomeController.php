<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function index()
    {
        $home = Home::find(1);

        return view('home.index', compact('home'));
    }

    public function update(Request $request, Home $home)
    {
        $attr = $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
        ]);

        try {
            DB::beginTransaction();

            if ($request->file('image')) {
                Storage::delete($home->image);
                $image = $request->file('image');
                $attr['image'] = $image->storeAs('images/home', date('Ymd') . rand(1000, 9999) . '.' . $image->extension());
            } else {
                $attr['image'] = $home->image;
            }

            $home->update($attr);

            DB::commit();

            return redirect()->route('home.index')->with('success', 'Home page successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
