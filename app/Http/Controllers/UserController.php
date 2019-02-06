<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests\SignInRequest;
use App\User;
use Session;

class UserController extends MainController
{
    public function postSignIn(SignInRequest $request)
    {
        if (User::userValidation($request['email'], $request['password'])) {
            return 1;
        } else {
            return 0;
        }
    }

    public function register(SignInRequest $reg_request)
    {
        if (User::registerValidation($reg_request['email'], $reg_request['password'], $reg_request['name'])) {
            return 1;
        } else {
            return 0;
        }
    }
    public function signOut()
    {
        Categorie::getCategories(self::$data);
        Session::flush();
        return \redirect('/');
    }
}