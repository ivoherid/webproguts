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
