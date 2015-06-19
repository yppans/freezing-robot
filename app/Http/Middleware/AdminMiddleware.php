<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminMiddleware {
protected $auth;
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}
	public function handle($request, Closure $next)
	{
	if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
            return redirect('home');
				//return redirect()->guest('auth/login');
			}
		}
        if ($request->user()->role != 'admin')
        {
            return redirect('home');
        }
		return $next($request);
	}

}
