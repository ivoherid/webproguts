<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function tampil(){
        $member = Member::ALl();
        return view('homepage')->with('member',$member);
    }
}
