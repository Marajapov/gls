<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
use \Model\User\ModelName as User;
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
            }elseif(auth()->user()->isManager()){
                return redirect()->route('admin.home');
            }elseif(auth()->user()->isDoer()){
                auth()->logout();
                return redirect()->route('front.home');
            }
        } else {
            return redirect()->route('front.login')->with('status','error');
        }

    }

    public function postLogout()
    {
        auth()->logout();

        return redirect()->route('front.home');
    }
}
