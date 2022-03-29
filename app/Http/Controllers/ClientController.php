<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::get();

        return view('client.index', compact('clients'));
    }

    public function create()
    {
        $client = new Client();

        return view('client.create', compact('client'));
    }

    public function store(Request $request)
    {
        $attr =  $request->validate([
            'name' => 'required',
            'logo' => 'required|mimes:jpg,png,jpeg'
        ]);

        try {
            DB::beginTransaction();

            $logo = $request->file('logo');
            $attr['logo'] = $logo->storeAs('images/logo', date('Ymd') . rand(1000, 9999) . '.' . $logo->extension());

            $attr['description'] = $request->description;

            Client::create($attr);

            DB::commit();

            return redirect()->route('client.index')->with('success', 'Client successfully added');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Client $client)
    {
        //
    }

    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $attr =  $request->validate([
            'name' => 'required',
            'logo' => 'mimes:jpg,png,jpeg'
        ]);

        try {
            DB::beginTransaction();

            if ($request->file('logo')) {
                Storage::delete($client->logo);
                $logo = $request->file('logo');
                $attr['logo'] = $logo->storeAs('images/logo', date('Ymd') . rand(1000, 9999) . '.' . $logo->extension());
            } else {
                $attr['logo'] = $client->logo;
            }

            $attr['description'] = $request->description;

            $client->update($attr);

            DB::commit();

            return redirect()->route('client.index')->with('success', 'Client successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Client $client)
    {
        try {
            DB::beginTransaction();

            Storage::delete($client->logo);
            $client->delete();

            DB::commit();

            return redirect()->route('client.index')->with('success', 'Client successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
