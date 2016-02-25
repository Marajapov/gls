<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    public function __construct()
    {
    }
    public function Login()
    {
        return view('Front::auth.login');
    }

    public function postLogin(Request $request)
    {

        if(auth()->attempt(['phone' => $request->input('phone'), 'password' => $request->input('password')]))
        {
            if(auth()->user()->isAdmin()){
                return redirect()->route('admin.home');
            }
        }

        return redirect()->route('front.login')->with('danger-message', 'Email же сырсөз туура эмес');
    }

    public function postLogout()
    {
        auth()->logout();

        return redirect()->route('front.home');
    }
}
