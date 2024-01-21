<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle($request, Closure $next)
    {
        // Verifica si el usuario está autenticado
        if (auth()->check()) {
            // Verifica si el usuario tiene el rol 1
            if (auth()->user()->idRol == 1) {
                return $next($request);
            }
        }
        // Si el usuario no está autenticado o no tiene el rol 1, redirige a una página de acceso no autorizado
        return redirect('error');
    }
}
