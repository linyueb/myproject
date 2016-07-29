<?php

namespace App\Http\Middleware;

use Closure;

class OldMiddleware
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
		if ($request->input('age') <= 200) {
            return redirect('home'); //如果 age<=200，中间件会返回一个 HTTP 重定向到客户端
        }
		
        return $next($request);
    }
}
