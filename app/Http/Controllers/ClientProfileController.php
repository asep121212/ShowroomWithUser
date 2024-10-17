<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $addresses = $user->addresses; // Retrieve the user's addresses

        return view('clientProfile.edit', compact('user', 'addresses'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'addresses' => 'array',
            'addresses.*' => 'nullable|string|max:255',
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->save();

        // Update addresses
        $user->addresses()->delete(); // Delete existing addresses
        foreach ($request->addresses as $address) {
            if (!empty($address)) {
                $user->addresses()->create(['address' => $address]);
            }
        }

        return redirect()->route('clientProfile.edit')->with('success', 'Profile updated successfully.');
    }
}
