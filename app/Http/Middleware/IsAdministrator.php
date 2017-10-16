<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class IsAdministrator
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
        // if user is logged in as moderator 
        // logout user and send to login route with
        // message "You don't have privilegies for this resource!!!"
        if(auth()->check() && auth()->user()->role != USER::ROLE_ADMINISTRATOR){
            // set message
            session()->flash('message', [
                'status' => 'danger',
                'text' => "You don't have privilegies for this resource!!!"
            ]);
            
            // case 1 - logout and redirect
            auth()->logout();
            return redirect()->route('login');
            
            
            // case 2 - jovin case
            //return redirect()->route('users-welcome');
            
            
            // case 3 - goran case
            //abort(403, 'Unauthorized action.');
        }
        
        // if user isn't logged in
        if(!auth()->check()){
            // set message
            session()->flash('message', [
                'status' => 'danger',
                'text' => "You don't have privilegies for this resource!!!"
            ]);
            
            //redirect
            return redirect()->route('login');
        }
        
        return $next($request);
    }
}
