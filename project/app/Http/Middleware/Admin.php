<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 26.5.2017.
 * Time: 12:28
 */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Admin {

    public function handle($request, Closure $next)
    {

        if ( Auth::check() && Auth::user()->isAdmin() )
        {
            return $next($request);
        }

        return redirect('/');

    }

}