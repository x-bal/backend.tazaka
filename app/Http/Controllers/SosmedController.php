<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class SosmedController extends Controller
{
    public function index()
    {
        $sosmeds = Sosmed::get();

        return view('sosmed.index', compact('sosmeds'));
    }

    public function create()
    {
        $sosmed = new Sosmed();

        return view('sosmed.create', compact('sosmed'));
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'icon' => 'required',
            'link' => 'required',
        ]);

        try {
            DB::beginTransaction();

            Sosmed::create($attr);

            DB::commit();

            return redirect()->route('sosmed.index')->with('success', 'Your sosmed successfully added');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Sosmed $sosmed)
    {
        //
    }

    public function edit(Sosmed $sosmed)
    {
        return view('sosmed.edit', compact('sosmed'));
    }

    public function update(Request $request, Sosmed $sosmed)
    {
        $attr = $request->validate([
            'icon' => 'required',
            'link' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $sosmed->update($attr);

            DB::commit();

            return redirect()->route('sosmed.index')->with('success', 'Your sosmed successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Sosmed $sosmed)
    {
        try {
            DB::beginTransaction();

            $sosmed->delete();

            DB::commit();

            return redirect()->route('sosmed.index')->with('success', 'Your sosmed successfully deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
