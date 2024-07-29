<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckProfileCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (is_null($user->whatsapp_number) || is_null($user->address_details_id)) {
            return redirect()->route('complete-registration');
        }

        return $next($request);
    }
}
