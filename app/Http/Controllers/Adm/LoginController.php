<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    public function __construct()
    {
        // Apply middleware to the 'admin' guard, allowing only guests to access login and logout actions
        $this->middleware('guest:admin')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        // Display the login form
        return view('adm.auth.login');
    }

    public function auth(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        // Attempt to log the user in using the 'admin' guard
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // If successful, redirect to the intended location or default dashboard
            return redirect()->intended(route('adm.dashboard'));
        }
        // If unsuccessful, redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    public function logout()
    {
        // Logout the admin user and redirect to the login page
        Auth::guard('admin')->logout();
        return redirect()->route('adm.auth.login');
    }
}
