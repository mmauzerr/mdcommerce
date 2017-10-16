<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordRecovery;

class UsersController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth')->except(['login', 'passwordRecovery']);
        $this->middleware('administrator')->except(['login', 'welcome', 'edit', 'logout', 'changePassword', 'passwordRecovery']);
        $this->middleware('guest')->only(['login']);
    }
    
    public function index(){
        $users = User::notDeleted()->get();
        
        return view('users.index', compact('users'));
    }
    
    public function login(){
        // validate request only for POST method
        if(request()->isMethod('post')){
            // validate login form
            $this->validate(request(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            
            // attempt login
            if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                // Authentication passed
                return redirect()->intended('/users/welcome');
            }else{
                // login failed
                return redirect('users/login')
                    ->withErrors([
                        'email' => 'Username or password does not match records!!!'
                    ])
                    ->withInput([
                        'email' => request('email')
                    ]);
            }
        }
        
        // show login form
        return view('users.login');
    }
    
    public function welcome(){
        
        return view('users.welcome');
    }
    
    public function create(){
        // validate request only for POST method
        if(request()->isMethod('post')){
            // validate user form
            $roleAdmin = \App\User::ROLE_ADMINISTRATOR;
            $roleModerator = \App\User::ROLE_MODERATOR;
            $this->validate(request(), [
                'name' => 'required|string|max:191',
                'email' => 'required|email|unique:users|max:191',
                'phone' => 'max:191',
                'address' => 'max:191',
                'role' => "required|in:$roleAdmin,$roleModerator",
                'password' => 'required|min:5|confirmed',
                'password_confirmation' => 'required' //same:password
            ]);
            
            $user = new User();
            $user->name = request('name');
            $user->email = request('email');
            $user->phone = request('phone');
            $user->address = request('address');
            $user->role = request('role');
            $user->password = bcrypt(request('password'));
            
            // save into database
            $user->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "User: $user->name is created successfully"
            ]);
            
            // redirect to all users
            return redirect(route('users-list'));
        }
        return view('users.create');
    }
    
    public function edit(User $user){
        // moderator may change only his/her profile
        if(auth()->user()->role != 'administrator' && auth()->user()->id != $user->id){
            abort(403, 'Unauthorized action.');
        }
        
        // validate request only for POST method
        if(request()->isMethod('post')){
            // validate user form
            $roleAdmin = \App\User::ROLE_ADMINISTRATOR;
            $roleModerator = \App\User::ROLE_MODERATOR;
            $this->validate(request(), [
                'name' => 'required|string|max:191',
                'phone' => 'max:191',
                'address' => 'max:191',
                'role' => "required|in:$roleAdmin,$roleModerator",
            ]);
            
            $user->name = request('name');
            $user->phone = request('phone');
            $user->address = request('address');
            $user->role = request('role');
            
            // save into database
            $user->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "User: $user->name is updated successfully"
            ]);
                        
            return redirect(route('users-list'));
        }
        
        return view('users.edit', compact('user'));
    }
    
    public function changePassword(User $user){
        
        // moderator may change only his/her password
        if(auth()->user()->role != 'administrator' && auth()->user()->id != $user->id){
            abort(403, 'Unauthorized action.');
        }
        
        // validate request only for POST method
        if(request()->isMethod('post')){
            // validate password form
            $this->validate(request(), [
                'password' => 'required|min:5|confirmed',
                'password_confirmation' => 'required' //same:password
            ]);
           
            $user->password = bcrypt(request('password'));
            
            // save into database
            $user->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "New password for user: $user->name changed successfully"
            ]);
            
            // redirect to all users
            return redirect(route('users-list'));
        }
        
        return view('users.change-password', compact('user'));
    }
    
    public function delete(User $user){
        $user->deleted = 1;
        $user->deleted_by_user_id = auth()->user()->id; // Auth::id() ili auth()->id()
        $user->save();
        
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "User: $user->name is deleted successfully"
        ]);
        
        // redirect to all users table
        return redirect(route('users-list'));
    }
    
    public function logout(){
        // clear user session
        Auth::logout();
        
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "Thank you!!! Come again!!!"
        ]);
        
        return redirect(route('login'));
    }
    
    public function passwordRecovery(){
        // if user is authenticated send him/her (redirect) to change password route 
        if(auth()->check()){
            return redirect()->route('users-change-password', auth()->user()->id);
        }
            
            
        if(request()->isMethod('post')){
            // validate form
            $this->validate(request(), [
                'email' => 'required|email|max:191', // exists:users
                'g-recaptcha-response' => 'required|recaptcha',
            ]);
            
            $user = User::where('email', 'like', request('email'))
                ->where('deleted', '=', '0')->first();
            // check email in users table
            if(count($user) > 0){
                $existingToken = DB::table('password_resets')
                    ->where('email', 'like', request('email'))
                    ->get();
                // check password_resets table for email
                if(count($existingToken) > 0){
                    // delete all old records
                    DB::table('password_resets')
                        ->where('email', 'like', request('email'))
                        ->delete();
                }
                // generate token
                $token = Str::random(60);
                // insert token and email in password_resets table
                DB::table('password_resets')
                    ->insert([
                        'email' => request('email'),
                        'token' => $token,
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                
                // send email to user with reset link
                Mail::to(request('email'))->send(new PasswordRecovery($token));
                
                // redirect to the same page but set message in session - flash
                // set message to other page
                session()->flash('message', [
                    'status' => 'success',
                    'text' => "Email sent!!! Please check your inbox/spam to reset password!!!"
                ]);
                
                return redirect(route('users-password-recovery'));
            } else{
                info('Email: ' . request('email') . " Date: " . date('Y-m-d H:i:s'));
                // if email doesn't exists in user table redirect back with
                // email input and error for email 'account with this email doesn't exists'
                return redirect(route('users-password-recovery'))
                    ->withErrors([
                        'email' => 'Email does not exist or is deleted!!!'
                    ])
                    ->withInput([
                        'email' => request('email')
                    ]);
            }
            
        }
        
        return view('users.password-recovery');
    }
    
    public function passwordReset($token){
        // if user is authenticated send him/her (redirect) to change password route 
        if(auth()->check()){
            return redirect()->route('users-change-password', auth()->user()->id);
        }
        
        DB::enableQueryLog();
        $tokenIsValid = FALSE;
        
        $tokenRow = DB::table('password_resets')
            ->where('token', 'like', $token)
            ->where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1hours'))) // da testiramo
            ->where('created_at', '<=', date('Y-m-d H:i:s'))
            ->first();

        //dd(DB::getQueryLog()); // dd() skracenica za die() and dump()
        
        if(count($tokenRow) > 0) {
            // token postoji i nije istekao
            $tokenIsValid = TRUE;
            
            // accept POST request
            // validate new password 
            // auto login user 
            // clear token from 'password_resets' table
            // redirect user to 'users-welcome' route/page
            // validate request only for POST method
            if(request()->isMethod('post')){
                // validate password form
                $this->validate(request(), [
                    'password' => 'required|min:5|confirmed',
                    'password_confirmation' => 'required' //same:password
                ]);

                $user = User::where('email', 'like', $tokenRow->email)->first();
                
                // treba i provera da nije korisnik u medjuvremenu obrisan, ali to necemo raditi
                // pretpostavka je da korisnik postoji
                
                $user->password = bcrypt(request('password'));

                // save into database
                $user->save();
                            
                // delete token from 'password_resets' table
                DB::table('password_resets')->where('token', 'like', $token)->delete(); 
                // ne treba provera datum, da se ne bi desilo da prodje 
                // koji minut dok korisnik resetuje sifru a token istekne
                // a svakako to i gore radimo
                
                // set message to other page
                session()->flash('message', [
                    'status' => 'success',
                    'text' => "New password for user: $user->name changed successfully"
                ]);

                // login user
                // attempt login
                if (Auth::attempt(['email' => $user->email, 'password' => request('password')])) {
                    // Authentication passed
                    return redirect()->intended('/users/welcome');
                }
            }
        }else{
            // token ne postoji
            // setujemo poruku - netreba redirect, moze i bez toga
            session()->flash('message', [
                    'status' => 'danger',
                    'text' => "Token expired or doesn't exist!!!"
                ]);
            
        }
        
        return view('users.password-reset', compact('tokenIsValid'));
    }
}
