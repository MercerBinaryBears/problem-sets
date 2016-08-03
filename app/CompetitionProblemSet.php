<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\File;

class CompetitionProblemSet extends Model
{
    protected $fillable = ['name', 'filename'];

    public function problems()
    {
        return $this->hasMany('App\Problem');
    }

    public function getFullPathAttribute()
    {
        return storage_path('uploads') . '/' . $this->filename;
    }

    public static function boot()
    {
        CompetitionProblemSet::created(function($problemSet) {
            \Artisan::call('split:competition', ['competition_problem_set_id' => $problemSet->id]);
        });
    }
}
