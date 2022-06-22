<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use App\Util\TenantConnector;
use Closure;
use Illuminate\Http\Request;

class TenantHandler
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
        if ($request->session()->has('instancia')) {
            $tenant = Tenant::where('id_imobiliaria', $request->session()->get('instancia'))->first();
            TenantConnector::connect($tenant);
            return $next($request);
        } else {
            return redirect()->route('login.index');
        }
    }
}
