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
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

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
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect()->route('complete.registration');
    }

    // Metode untuk login/register menggunakan Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $socialUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            ['google_id' => $socialUser->id],
            [
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'profile_picture' => $socialUser->getAvatar(),
                'password' => Hash::make('123'),
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
            ]
        );

        if (!$user->password) {
            $user->password = Hash::make('123'); // Set a default password if not set
            $user->save();
        }

        Auth::login($user);

        return redirect()->route('complete.registration');
    }

    // Metode untuk menampilkan halaman pelengkap data
    public function showCompleteRegistrationForm()
    {
        $provinces = Province::all();
        $cities = City::all();
        $companies = Company::all();
        $positions = Position::all();
        $companysizes = CompanySize::all();
        return view(
            'auth.complete_registration',
            compact('provinces', 'cities', 'companies', 'positions', 'companysizes')
        );
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
        $user->whatsapp_number = $validatedData['whatsapp_number'];

        

        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->save(); //abaikan jika syntax "save" error

        return redirect()->route('set.password')->with('status', 'Registration completed!');
    }
    public function showSetPasswordForm()
    {
        return view('auth.set_password');
    }

    public function setPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save(); //abaikan jika syntax "save" error

        return redirect()->route('home')->with('status', 'Password set successfully!');
    }
}