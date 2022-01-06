<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class AuthController extends Controller
{
	public function masuk()
    {
        // Get URLs
        $urlPrevious = url()->previous();
        $urlBase = url()->to('/');
    
        // Set the previous url that we came from to redirect to after successful login but only if is internal
        if(($urlPrevious != $urlBase . '/login') && (substr($urlPrevious, 0, strlen($urlBase)) === $urlBase)) 
        {
            session()->put('url.intended', $urlPrevious);
        }

        return view('auth.masuk');
    }

    public function daftarakun()
    {
        return view('auth.daftar-akun');
    }

    public function resetemail()
    {
        return view('auth.reset-email');
    }

    public function loginsukses()
    {
        return back();
    }
}
