<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\user;

class MenuController extends Controller
{

    public function tampil($id){
        $menu =  Menu::all();
        $user = User::find($id);
        $type = 1;

        return view('menu',['menu' => $menu, 'user'=>$user]);
    }
}
