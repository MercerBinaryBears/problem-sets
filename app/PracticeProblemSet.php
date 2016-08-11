<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PracticeProblemSet extends Model
{
    protected $fillable = ['name'];

    public static function boot()
    {
        $do_split = function($practice) {
            \Artisan::call('pdf:join:practice', ['practice_id' => $practice->id]);
        };

        PracticeProblemSet::created($do_split);
        PracticeProblemSet::updated($do_split);
    }

    public function problems()
    {
        return $this->belongsToMany('App\Problem');
    }

    public function getFullPathAttribute()
    {
        return storage_path('problem_set_cache') . "/problem_set_$this->id.pdf";
    }
}
