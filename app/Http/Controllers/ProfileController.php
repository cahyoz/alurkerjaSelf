<?php

namespace App\Http\Controllers;

use App\Models\AddressDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use App\Models\Position;
use App\Models\Province;
use App\Models\City;
use App\Models\CompanySize;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function showProfilePassword()
    {
        $user = Auth::user();
        return view('profile.password', compact('user'));
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
        $addressDetails = $user->addressDetail;
        $provinceId = $addressDetails && $addressDetails->province ? $addressDetails->province->name : '';
        $cityId = $addressDetails && $addressDetails->city ? $addressDetails->city->name : '';
        $company = $user->company;
        $companySizeName = $company && $company->companySize ? $company->companySize->size : '';

        return view('profile.detail', compact('user', 'companies', 'positions', 'provinces', 'companysizes', 'companyName', 'addressDetail', 'positionName', 'provinceId', 'cityId', 'companySizeName'));
    
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

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function updateProfileDetail(Request $request)
{
    $validatedData = $request->validate([
        'company_name' => 'required|string',
        'position_name' => 'required|string',
        'province_name' => 'required|string',
        'city_name' => 'required|string',
        'company_size_size' => 'required|string',
        'address_detail' => 'required|string|max:255',
    ]);

    $user = Auth::user();

    // Find or create the related records
    $company = Company::firstOrCreate(['name' => $validatedData['company_name']]);
    $position = Position::firstOrCreate(['name' => $validatedData['position_name']]);
    $province = Province::firstOrCreate(['name' => $validatedData['province_name']]);
    $city = City::firstOrCreate(['name' => $validatedData['city_name']]);
    $companySize = CompanySize::firstOrCreate(['size' => $validatedData['company_size_size']]);

    // Update the company with the company size
    $company->company_size_id = $companySize->id;
    $company->save();

    // Update the position with the company
    $position->company_id = $company->id;
    $position->save();

    // Create or update the address detail
    $addressDetail = AddressDetail::updateOrCreate([
        'id' => $user->address_details_id ?? null,
    ], [
        'address' => $validatedData['address_detail'],
        'province_id' => $province->id,
        'city_id' => $city->id,
    ]);

    // Update the user's details
    $user->company_id = $company->id;
    $user->position_id = $position->id;
    $user->address_details_id = $addressDetail->id;

    $user->save();

    return redirect()->route('profile.detail')->with('status', 'Profile updated successfully!');
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

    public function updatePassword(Request $request)
{
    $request->validate([
        'old_password' => ['required', 'current_password'],
        'new_password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = Auth::user();
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('profile')->with('status', 'Password updated successfully!');
}
}