<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $casts = [
        'title' => 'string',
        'text' => 'text',
        'created_at' => 'date',
    ];

    protected $fillable = [
    	"title", 
    	"text", 
    	"created_at"
    ];
    
    public function author()
    {
        return $this->hasOne('App\User');
    }
}
