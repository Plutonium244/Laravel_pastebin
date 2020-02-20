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
        'password' => 'string',
        'shortlink' => 'string',
    ];

    protected $fillable = [
    	'title', 
    	'text', 
        'user_id',
        'lifetime',
        'password',
        'shortlink',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
