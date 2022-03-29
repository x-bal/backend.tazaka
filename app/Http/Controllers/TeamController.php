<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::get();

        return view('team.index', compact('teams'));
    }

    public function create()
    {
        $team = new Team();

        return view('team.create', compact('team'));
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);

        try {
            DB::beginTransaction();

            $image = $request->file('image');

            $attr['image'] = $image->storeAs('images/team', Str::slug($request->name) . '.' . $image->extension());
            $attr['twitter'] = $request->twitter;
            $attr['facebook'] = $request->facebook;
            $attr['instagram'] = $request->instagram;
            $attr['linkedin'] = $request->linkedin;

            Team::create($attr);

            DB::commit();

            return redirect()->route('team.index')->with('success', 'Your team successfully added');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Team $team)
    {
        //
    }

    public function edit(Team $team)
    {
        return view('team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $attr = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
        ]);

        try {
            DB::beginTransaction();

            if ($request->file('image')) {
                Storage::delete($team->image);
                $image = $request->file('image');
                $attr['image'] = $image->storeAs('images/team', Str::slug($request->name) . '.' . $image->extension());
            } else {
                $attr['image'] = $team->image;
            }

            $attr['twitter'] = $request->twitter;
            $attr['facebook'] = $request->facebook;
            $attr['instagram'] = $request->instagram;
            $attr['linkedin'] = $request->linkedin;

            $team->update($attr);

            DB::commit();

            return redirect()->route('team.index')->with('success', 'Your team successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Team $team)
    {
        try {
            DB::beginTransaction();

            Storage::delete($team->image);
            $team->delete();

            DB::commit();

            return redirect()->route('team.index')->with('success', 'Your team successfully deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
