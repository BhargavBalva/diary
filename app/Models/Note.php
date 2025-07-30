<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $fillable = [
        'title',
        'content',
        'entry_date',
        'mood',
        'location',
        'user_id',
    ];
    public $timestamps = true;

     protected $casts = [
        'entry_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
