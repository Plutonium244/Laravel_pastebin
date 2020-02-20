<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $casts = [
        'title' => 'string',
        'text' => 'text',
        'user_id' => 'int',
        'lifetime' => 'int',
        'password' => 'string'
    ];

    protected $fillable = [
    	'title', 
    	'text', 
        'user_id',
        'lifetime',
        'password',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
