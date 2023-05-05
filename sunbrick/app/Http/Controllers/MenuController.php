<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\user;

class MenuController extends Controller
{

    public function tampil(){
        $menu =  Menu::all();
        $id = 1;
        $user = User::find($id);
        $type = 1;

        return view('menu',['menu' => $menu, 'user'=>$user])->with($type);
    }
}
