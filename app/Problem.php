<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = ['name', 'start_page', 'end_page', 'competition_problem_set_id'];

    public function competitionProblemSet()
    {
        return $this->belongsTo('App\CompetitionProblemSet');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function practiceProblemSets()
    {
        return $this->belongsToMany('App\PracticeProblemSet');
    }
}
