<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    public function problem()
    {
        return $this->belongsTo('App\Problem');
    }

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public function getSlugAttribute()
    {
        // remove any digits from the name, convert to lower case. Hopefully, highlight.js can figure it out from there
        return preg_replace('/[^a-z]+/', '', strtolower($this->name));
    }
}
