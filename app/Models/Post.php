<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $casts = [
        'title' => 'string',
        'text' => 'text',
        'created_at' => 'date',
        'user_id' => 'int',
        'lifetime' => 'int',
    ];

    protected $fillable = [
    	'title', 
    	'text', 
    	'created_at',
        'user_id',
        'lifetime',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
