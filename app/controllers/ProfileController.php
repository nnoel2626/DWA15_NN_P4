<?php

class ProfileController extends \BaseController {

    public function user($username){

        $user = User::where('username', '=', $username);

        if($user->count()) {

            $user = $user->first();

            return View::Make('profile.user')
                ->with('user', $user);
        }

        return App::abort(404);
    }

}