<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

class AdminTypeIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        
        Log::info('Verificando el rol del usuario', [
            'user_id' => $user ? $user->id : null,
            'user_type' => $user ? $user->user_type : null
        ]);
        
        if (Auth::user()->user_type == 'user') {
            // Redirect...
            
            // Lógica para determinar la vista (por ejemplo, 'admin' o 'user')
            $request->session()->put('user_type', $user->user_type);
            return redirect('/home');
            
        }


        return $next($request);
    }
}
