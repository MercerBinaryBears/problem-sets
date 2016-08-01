<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitionProblemSet extends Model
{
    protected $fillable = ['name', 'filename', 'file'];

    public function setFileAttribute(\SplFileInfo $value)
    {
        $this->filename = $value->getRealPath();
    }
}
