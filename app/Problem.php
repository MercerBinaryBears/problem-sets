<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = ['name', 'sample_input', 'sample_output', 'judge_input', 'judge_output', 'start_page', 'end_page', 'competition_problem_set_id'];

    public static function boot() {
        $do_split = function($problemSet) {
            \Artisan::call('pdf:join:problem', ['problem_id' => $problemSet->id]);
        };

        Problem::created($do_split);
        Problem::updated($do_split);
    }

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

    public function solutions()
    {
        return $this->hasMany('App\Solution');
    }

    public function getFullPathAttribute()
    {
        return storage_path('problem_cache') . "/problem_$this->id.pdf";
    }

    public function scopeHasTags($query, $tag_ids)
    {
        return $query->join('problem_tag', 'problems.id', '=', 'problem_tag.problem_id')
            ->whereIn('tag_id', $tag_ids)
            ->groupBy('problem_id')
            ->havingRaw("count(*) <= " . count($tag_ids))
            ->select('problems.*');
    }
}
