<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    //

    protected $fillable = [
        'password_name', 'user_name', 'encrypt_password', 'website_url', 'remark', 'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
    public function getUserNameAttribute($value)
    {
        return \Crypt::decrypt($value);
    }
    public function getEncryptPasswordAttribute($value)
    {
        return \Crypt::decrypt($value);
    }
}
