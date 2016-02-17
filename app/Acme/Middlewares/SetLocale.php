<?php
namespace Acme\Middlewares;
use Closure;
class SetLocale {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		app()->setlocale($request->cookie('locale', 'kg'));
		return $next($request);
	}
}