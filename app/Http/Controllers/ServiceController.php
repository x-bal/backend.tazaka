<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::get();

        return view('service.index', compact('services'));
    }

    public function create()
    {
        $service = new Service();

        return view('service.create', compact('service'));
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();

            Service::create($attr);

            DB::commit();

            return redirect()->route('service.index')->with('success', 'Your service successfully added');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Service $service)
    {
        //
    }

    public function edit(Service $service)
    {
        return view('service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $attr = $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $service->update($attr);

            DB::commit();

            return redirect()->route('service.index')->with('success', 'Your service successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Service $service)
    {
        try {
            DB::beginTransaction();

            $service->delete();

            DB::commit();

            return redirect()->route('service.index')->with('success', 'Your service successfully deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
