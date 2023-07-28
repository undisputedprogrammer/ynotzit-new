<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminServices{

    public function generateCredentials($name){

        // $nameArray = explode(" ", $name);

        // $firstname=$nameArray[0];

        // $username = $firstname.strval(rand(1000, 9999));

        $alpha = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","%","&","@","#","$","+","1","2","3","4","5","6","7","8","9"];

        $pwdkeys = array_rand($alpha, 8);
        $password = "";

        foreach($pwdkeys as $key){
            $password = $password.$alpha[$key];
        }

        $cred = [
        'password'=>$password];
        // dd($password);
        return $cred;
    }

    public function createUser($registration , $cred){
        $user = User::create([
            'name'=>$registration['name'],
            'email'=>$registration['email'],
            'password'=>Hash::make($cred['password'])
        ]);

        return $user;
    }
}

