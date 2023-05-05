<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    public function transaction()
    {
        return $this->belongsToMany(Transaction::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
