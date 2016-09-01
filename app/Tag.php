<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = [
        'tag', 'user_id', 'password_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function password()
    {
        return $this->belongsTo('App\Password','password_id','id');
    }
}
