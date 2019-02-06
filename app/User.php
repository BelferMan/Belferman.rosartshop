<?php

namespace App;

use DB;
use Hash;
use Illuminate\Database\Eloquent\Model;
use Session;

class User extends Model
{
    public static function userValidation($email, $password)
    {
        $auth = false;
        $user = DB::select("SELECT * FROM users AS u JOIN users_roles AS ur ON u.id = ur.uid WHERE email = ?", [$email]);
        if ($user) {
            if (Hash::check($password, $user[0]->password)) {
                $auth = true;
                if ($user[0]->rid == 5) {
                    Session::put('is_admin', true);
                }
                Session::put('user_name', $user[0]->name);
                Session::put('user_id', $user[0]->id);

            } else {
                $auth = false;
            }
        }
        return $auth;
    }

    public static function registerValidation($email, $password, $name)
    {
        $userTaken = DB::select("SELECT * FROM users WHERE email = ?", [$email]);
        if ($userTaken) {
            return false;
        } else {
            $user = new self;
            $user->email = $email;
            $user->password = \bcrypt($password);
            $user->name = $name;
            $user->save();
            $uid = $user->id;
            DB::insert("INSERT INTO users_roles VALUES($uid,1)");
            return true;
        }

    }
}