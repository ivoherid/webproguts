<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $with = ['user','menu'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');

        return $this->belongsTo(Menu::class,'coffee_id');
    }
    public function menu()
    {

        return $this->belongsTo(Menu::class,'coffee_id');
    }
}
