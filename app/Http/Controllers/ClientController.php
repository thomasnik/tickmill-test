<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(10);
        return response()->json($clients);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:20',
            'email' => 'required|email|unique:clients,email',
            'lastname' => 'required|string|max:20',
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public'); // Save in storage/app/public/avatars
            $validatedData['avatar'] = $avatarPath;
        }

        $client = Client::create($validatedData);

        return response()->json($client, 201);
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validatedData = $request->validate([
            'firstname' => 'required|string|max:20',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'lastname' => 'required|string|max:20',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        if ($request->hasFile('avatar')) {
            // Delete old avatar if it exists
            if ($client->avatar) {
                Storage::disk('public')->delete('avatars/' . $client->avatar);
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validatedData['avatar'] = $avatarPath;
        }

        $client->update($validatedData);

        return response()->json($client);
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        if ($client->avatar) {
            Storage::disk('public')->delete('avatars/' . $client->avatar);
        }

        $client->delete();

        return response()->json(['message' => 'Client deleted successfully.']);
    }

}
