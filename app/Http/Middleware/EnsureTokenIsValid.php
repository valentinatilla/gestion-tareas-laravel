<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
{
    // Obtiene el token del encabezado 'Authorization'
    $token = $request->header('Authorization');

    // Construye el token válido esperado (ej: "Bearer un-token-super-secreto-12345")
    $validToken = 'Bearer ' . env('API_TOKEN');

    // Compara el token recibido con el token válido
    if ($token !== $validToken) {
        // Si no coincide, devuelve un error de no autorizado
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    // Si el token es válido, permite que la solicitud continúe
    return $next($request);
}
}
