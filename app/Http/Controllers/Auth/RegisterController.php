<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AddressDetail;
use App\Models\User;
use App\Models\Company;
use App\Models\Position;
use App\Models\Province;
use App\Models\City;
use App\Models\CompanySize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'whatsapp_number' => 'required|numeric',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'whatsapp_number' => $validatedData['whatsapp_number']
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
            $user->save();
        }

        Auth::login($user);

        return redirect()->route('complete.registration');
    }

    // Metode untuk menampilkan halaman pelengkap data
    public function showCompleteRegistrationForm()
    {
        $provinces = Province::all();
        $companies = Company::all();
        $positions = Position::all();
        $companysizes = CompanySize::all();
        return view(
            'auth.complete_registration',
            compact('provinces', 'companies', 'positions', 'companysizes')
        );
    }

    public function getCitiesByProvince($provinceId)
    {
    $cities = City::where('province_id', $provinceId)->get();
    return response()->json($cities);
    }


    // Metode untuk menyimpan data pelengkap
    public function completeRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string',
            'position_name' => 'required|string',
            'province_name' => 'required|string',
            'city_name' => 'required|string',
            'company_size_size' => 'required|string',
            'address_detail' => 'required|string|max:255',
            'whatsapp_number' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $company = Company::firstOrCreate(['name' => $validatedData['company_name']]);
        $position = Position::firstOrCreate(['name' => $validatedData['position_name']]);
        $province = Province::firstOrCreate(['name' => $validatedData['province_name']]);
        $city = City::firstOrCreate(['name' => $validatedData['city_name']]);
        $companySize = CompanySize::firstOrCreate(['size' => $validatedData['company_size_size']]);

        // Ensure company is linked with company size
        $company->company_size_id = $companySize->id;
        $company->save();
        
        $position->company_id = $company->id;
        $position->save();

        // Create or update address detail
        $addressDetail = AddressDetail::updateOrCreate([
            'address' => $validatedData['address_detail'],
            'province_id' => $province->id,
            'city_id' => $city->id,
        ]);
        $position->company_id = $company->id;
        $position->save();

        $user = Auth::user();
        $user->company_id = $company->id;
        $user->position_id = $position->id;
        $user->address_details_id = $addressDetail->id;

        $user->save(); //abaikan jika syntax "save" error

        return redirect()->route('dashboard')->with('status', 'Registration completed!');
    }
}