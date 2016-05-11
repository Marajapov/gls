<?php
namespace Front\Controllers;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    
    public function __construct()
    {
    }

    public function setLocale($locale = 'kg')
    {
        return redirect()->back()->withCookie(cookie()->forever('locale', $locale));
    }

}

