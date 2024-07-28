<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showCompleteProfileForm()
    {
        return view('auth.complete-profile');
    }

    public function completeProfile(Request $request)
    {
        $request->validate([
            'whatsapp_number' => 'required|string|max:15',
            'company_id' => 'required|integer|exists:companies,id',
            'position_id' => 'required|integer|exists:positions,id',
        ]);

        $user = Auth::user();
        $user->whatsapp_number = $request->whatsapp_number;
        $user->company_id = $request->company_id;
        $user->position_id = $request->position_id;
        $user->address_detail_id = $request->address_detail_id;
        // $user->save();

        return redirect()->route('home');
    }
}
