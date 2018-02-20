<?php

namespace App\Http\Middleware\Osteo;

use Closure;
use Osteo;
use Auth;

class Authenticate extends \App\Http\Middleware\Authenticate {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = NULL) {
//        error_log('Checking authentication...');
        $user = Auth::user();

        if (!empty($user)) {
            if ($user->role != 0 && $user->role != 1) { // NOT admin nor secretariat
                return redirect()->guest('/admin/login');
            }
        } else { // login again
            if ($request->ajax()) {
//                error_log('ajax querying ... ');
//                abort(403);
                return response('Unauthorized', 401);
            } else {
                return redirect()->guest('/admin/login');
            }
        }

        return $next($request);
    }

}
