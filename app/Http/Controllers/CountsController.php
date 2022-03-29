<?php

namespace App\Http\Controllers;

use App\Models\Counts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountsController extends Controller
{
    public function index()
    {
        $counts = Counts::get();

        return view('count.index', compact('counts'));
    }

    public function create()
    {
        $count = new Counts();

        return view('count.create', compact('count'));
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'title' => 'required',
            'total' => 'required',
        ]);

        try {
            DB::beginTransaction();

            Counts::create($attr);;

            DB::commit();

            return redirect()->route('count.index')->with('success', 'Count successfully added');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Counts $count)
    {
        //
    }

    public function edit(Counts $count)
    {
        return view('count.edit', compact('count'));
    }

    public function update(Request $request, Counts $count)
    {
        $attr = $request->validate([
            'title' => 'required',
            'total' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $count->update($attr);;

            DB::commit();

            return redirect()->route('count.index')->with('success', 'Count successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Counts $count)
    {
        try {
            DB::beginTransaction();

            $count->delete();;

            DB::commit();

            return redirect()->route('count.index')->with('success', 'Count successfully deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
