<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{


    public function upgrade(User $user){

        if( $user->hasRole('regular')  ){

            $user->removeRole('regular');
            $user->assignRole('super_admin');

            $message = 'Bien mise a niveau';
            $state = 'success';
    
            return view('back.layouts.message', compact( 'message', 'state' ));



        }


        return back();


    }

    public function downgrade(User $user){

        if( $user->hasRole('super_admin')  ){

            $user->removeRole('super_admin');
            $user->assignRole('regular');

            $message = 'Dégradation activé';
            $state = 'success';
    
            return view('back.layouts.message', compact( 'message', 'state' ));



        }


        return back();


    }


    public function res(User $user){

        if( Auth::user()->hasRole('super_admin')  ){

            $upper_layout = 'back';

        }else{

            $upper_layout = 'front';
            
        }



        return view( 'users.res', compact('user', 'upper_layout') );

        

    }
    public function modInfo(User $user){

        if( Auth::user()->hasRole('super_admin') ||  Auth::id() == $user->id  ){

            return view('back.users.mod-info', compact('user'));

        }else{


            return redirect('/');
        }

        

    }


    public function modInfoPut(Request $request, User $user){

        $pseudo = Crypt::encryptString( $user->pseudo );


        $user->pseudo = $pseudo;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->sex = $request->sex;
        $user->email = $request->email;
        $user->tel = $request->tel;

        $user->update();

        return redirect()->route('home');

    }
}
