<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Alert;
class Admin
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
        if(Auth::check() && Auth::user()->level==1){
            return $next($request);
        }
        Alert::error('Lỗi','Đăng nhập để thực hiện chức năng này');
        return redirect()->route('login');
    }
}
