<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Alert;
class User
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
        if(Auth::check() && Auth::user()->level==0){
            return $next($request);
        }
        else{
            Alert::warning('Chú ý','Đăng nhập để thực hiện chức năng này');
            return redirect()->route('login');
        }
        
    }
}
