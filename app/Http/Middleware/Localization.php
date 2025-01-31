<?php
namespace App\Http\Middleware;
use App;
use Closure;
use \Illuminate\Http\Request;

class Localization {
    /**
     * Handle an incoming request.
     * @param Request $request
     * @param wClosure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        if (session()->has('locale')) {
            App::setlocale(session()->get('locale'));
        }
        return $next($request);
    }
}
