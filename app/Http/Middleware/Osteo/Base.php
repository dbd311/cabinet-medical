<?php

namespace App\Http\Middleware\Osteo;

use Closure;
use Auth;
use Osteo;
use App;

class Base
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
        
        if(Osteo::checkInstalled()) {
            # Check if the user is activated
            if(Auth::check()) {

                $user = Osteo::loggedInuser();

                if(!$user->active) {
                    if(Osteo::currentURL() != url('/logout')) {
                        if (strpos(Osteo::currentURL(), route('Osteo::activate_form')) !== false) {
                            // Seems to be ok
                        } else {
                            return redirect()->route('Osteo::activate_form');
                        }
                    }

                }

                if($user->banned and Osteo::currentURL() != route('Osteo::banned')) {
                    if(Osteo::currentURL() != url('/logout')) {
                        return redirect()->route('Osteo::banned');
                    }
                }

                # Set App Locale
                if($user->locale) {
                    App::setLocale($user->locale);
                }

            }
        }

        return $next($request);
    }
}
