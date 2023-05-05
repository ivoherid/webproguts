<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function start()
    {
        $id = 1;
        return redirect('/user/'.$id.'/home');
    }

    public function home($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hour = date('G');

        $user = User::find($id);
        return view('homepage', ['user' => $user, 'hour' => $hour]);
    }

    public function transaction($id)
    {
        $user = User::find($id);
        return view('transaction', ['user' => $user]);
    }
}


// class UserController extends Controller
// {
//     // public function start()
//     // {
//     //     $current_hour = date('G');
//     //     $id = 1;
//     //     $user = User::find($id);
//     //     return view('user', ['user' => $user, 'hour' => $current_hour]);
//     // }

//     public function insert(){
//         $user = new User;
//         $user->name='Vico Lomar';
//         $user->email='Example@gmail.com';
//         $user->password='password';
//         $user->loyalty='GOLD';
//         $user->points='80';
//         $user->save();

//         dump($user);
//     }
//     public function tampil(){
//         $user = User::all();
//         return view('homepage')->with('user',$user);
//     }
//     public function tampil2(){
//         $user = User::all();
//         return view('transaction')->with('user',$user);
//     }

//     public function cekObject(){
//         $user = new User;
//         $user::all();
//         dump($user);
//     }
// }
