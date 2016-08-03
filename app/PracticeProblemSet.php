<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PracticeProblemSet extends Model
{
    protected $fillable = ['name'];

    public function problems()
    {
        return $this->belongsToMany('App\Problem');
    }

    public function getFullPathAttribute()
    {
        return storage_path('problem_set_cache') . "/problem_set_$this->id.pdf";
    }
}
