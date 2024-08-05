<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use App\Models\Position;
use App\Models\Province;
use App\Models\City;
use App\Models\CompanySize;
class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function showProfileDetail()
    {
        $user = Auth::user();

        $companies = Company::all();
        $positions = Position::all();
        $provinces = Province::all();
        $companysizes = CompanySize::all();
    
        $companyName = $user->company ? $user->company->name : '';
        $positionName = $user->position ? $user->position->name : '';
        $addressDetail = $user->addressDetail ? $user->addressDetail->address : '';
        $provinceName = $addressDetail->province ? $addressDetail->province->name : '';
        dump($provinceName);
        return view('profile.detail', compact('user', 'companies', 'positions', 'provinces', 'companysizes', 'companyName', 'addressDetail', 'positionName', 'provinceName'));
    
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'whatsapp_number' => 'nullable|string|max:20',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->whatsapp_number = $request->whatsapp_number;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }

    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/profile_pictures', $filename);

            // Delete the old profile picture if it's not the default one
            if ($user->profile_picture && !filter_var($user->profile_picture, FILTER_VALIDATE_URL)) {
                Storage::delete('public/' . $user->profile_picture);
            }

            $user->profile_picture = 'profile_pictures/' . $filename;
            $user->save();
        }

        return redirect()->route('profile')->with('success', 'Profile picture updated successfully!');
    }
}