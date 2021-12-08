<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
{
    private $cus;

    public function __construct(){

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$guard = 'cus')
    {
        if(Auth::guard($guard)->check()){
            return $next($request);
        }
        return redirect()->route('home.login');
    }
}
