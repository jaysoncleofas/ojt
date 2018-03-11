<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ojt extends Model
{
    protected $guarded = ['id'];

    public function setMIAttribute($value)
    {
        $this->attributes['m_i'] = ucwords($value);
    }
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords($value);
    }
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords($value);
    }
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = ucwords($value);
    }
    public function setSchoolAttribute($value)
    {
        $this->attributes['school'] = ucwords($value);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
