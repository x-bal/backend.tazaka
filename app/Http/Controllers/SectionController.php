<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::get();

        return view('section.index', compact('sections'));
    }

    public function create()
    {
        $section = new Section();
        $sections = ['Service', 'Client', 'Testimonial', 'Portfolio', 'Team', 'Product', 'Contact', 'Newsletter'];

        return view('section.create', compact('sections', 'section'));
    }

    public function store(Request $request)
    {
        $request->validate(['section' => 'required', 'content' => 'required']);

        try {
            DB::beginTransaction();

            Section::updateOrCreate(
                ['section' => $request->section],
                ['content' => $request->content]
            );

            DB::commit();

            return redirect()->route('section.index')->with('success', 'Section successfullyy added');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Section $section)
    {
        //
    }

    public function edit(Section $section)
    {
        $sections = ['Service', 'Client', 'Testimonial', 'Portfolio', 'Team', 'Product', 'Contact', 'Newsletter'];

        return view('section.edit', compact('sections', 'section'));
    }

    public function update(Request $request, Section $section)
    {
        $attr = $request->validate(['section' => 'required', 'content' => 'required']);

        try {
            DB::beginTransaction();

            Section::updateOrCreate(
                ['section' => $request->section],
                ['content' => $request->content]
            );

            DB::commit();

            return redirect()->route('section.index')->with('success', 'Section successfullyy updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Section $section)
    {
        try {
            DB::beginTransaction();

            $section->delete();

            DB::commit();

            return redirect()->route('section.index')->with('success', 'Section successfullyy deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
