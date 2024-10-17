<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index()
    {
        $profiles = Profile::all();
        return view('dashboard.profile', compact('profiles'));
    }

    public function create()
    {
        return view('dashboard.profile');
    }

    public function edit(Profile $profile)
    {
        return view('dashboard.editprofile', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'company_name' => 'required|string',
            'address' => 'required|string',
            'number' => 'required|string',
            'email' => 'required|string',
            'image' => 'required',
        ]);

        $imagePath = $request->file('image')->store('public/profiles');
        $imageName = basename($imagePath);

        $profile->update([
            'company_name' => $request->company_name,
            'address' => $request->address,
            'number' => $request->number,
            'email' => $request->email,
            'image' => $imageName,
        ]);

        return redirect()->route('profiles.index')->with('success', 'Profil berhasil di update');
    }
}
