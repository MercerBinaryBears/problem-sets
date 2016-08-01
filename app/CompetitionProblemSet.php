<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\File;

class CompetitionProblemSet extends Model
{
    protected $fillable = ['name', 'filename', 'file'];

    public function setFileAttribute(File $value)
    {
        $new_home = $value->move(storage_path() . '/uploads', 10000 * microtime(true) . '.pdf');
        $this->filename = $new_home->getRealPath();
    }
}
