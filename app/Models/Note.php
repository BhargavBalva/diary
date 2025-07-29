<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $fillable = ['title', 'content', 'date'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
        
    }
}
