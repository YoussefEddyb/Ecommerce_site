<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClientLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:client')->except('deconnexion');;
    }

    public function showLoginForm()
    {
        $param=Parametre::find(1);
        return view('frontend.connexion',['param'=>$param]);
    }

    public function deconnexion()
    {
        Auth::guard('client')->logout();
        Session::flush();
        return redirect()->route('site.connexion');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('client.profile'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email'));
    }
}
