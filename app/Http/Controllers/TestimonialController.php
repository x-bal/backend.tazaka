<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::get();

        return view('testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        $testimonial = new Testimonial();

        return view('testimonial.create', compact('testimonial'));
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);

        try {
            DB::beginTransaction();

            $image = $request->file('image');
            $attr['image'] = $image->storeAs('images/testimonial', date('Ymd') . rand(1000, 9999) . '.' . $image->extension());

            Testimonial::create($attr);

            DB::commit();

            return redirect()->route('testimonial.index')->with('success', 'Your testimonial successfully added');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Testimonial $testimonial)
    {
        //
    }

    public function edit(Testimonial $testimonial)
    {
        return view('testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $attr = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'image' => 'mimes:jpg,png,jpeg',
        ]);

        try {
            DB::beginTransaction();

            if ($request->file('image')) {
                Storage::delete($testimonial->image);
                $image = $request->file('image');
                $attr['image'] = $image->storeAs('images/testimonial', date('Ymd') . rand(1000, 9999) . '.' . $image->extension());
            } else {
                $attr['image'] = $testimonial->image;
            }

            $testimonial->update($attr);

            DB::commit();

            return redirect()->route('testimonial.index')->with('success', 'Your testimonial successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Testimonial $testimonial)
    {
        try {
            DB::beginTransaction();

            Storage::delete($testimonial->image);
            $testimonial->delete();

            DB::commit();

            return redirect()->route('testimonial.index')->with('success', 'Your testimonial successfully deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
