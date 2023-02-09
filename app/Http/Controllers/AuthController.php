<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $email; 
    private $pass;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = htmlspecialchars(trim($email));
    }
    

    public function getPass()
    {
        return $this->pass;
    }

    public function setPass($pass)
    {
        $this->pass = htmlspecialchars($pass);    
    }

    public function login(Request $request)
    {
        if(!(Auth::check())){

            
            $this->setEmail($request->email);
            $this->setPass($request->inputPassword);


            $this->authenticate($request);
        }
    }


    private function authenticate($request)
    {
        $email = $this->getEmail();
        $pass = $this->getPass();

        if(Auth::attempt(['email' => $email, 'password' => $pass, 'activate' => 'S'])) {
            $request->session()->regenerate();
        }

        return "teste";

    }

}
