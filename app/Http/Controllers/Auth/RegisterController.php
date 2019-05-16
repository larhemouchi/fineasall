<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
  public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'pseudo' => 'required|string| min:6|confirmed',            
            'password' => 'required|string|min:6|confirmed',
            'confirm-password' => 'required|string|min:6|confirmed',
            'nom' => 'required|string|min:3|max:255|confirmed',
            'prenom' => 'required|string|min:3|max:255|confirmed',
            'sex' => 'required|string|confirmed',
            'email' => 'required|string|min:7|email|max:255|unique:users|confirmed',
            'tel' => 'required|string|min:9|max:255|confirmed',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {



        $enc_pseudo = Crypt::encryptString( $data['pseudo'] );


        $user = User::create([
            'pseudo' => $enc_pseudo,
            'password' => bcrypt($data['password']),
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'sex' => $data['sex'],
            'email' => $data['email'],
            'tel' => $data['tel'],
        ]);


        $user->assignRole('regular');



        return $user;
    }
}
