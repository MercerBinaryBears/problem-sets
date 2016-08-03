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
            $output_directory = storage_path('split_pages') . '/';
            $output_files = \App::make('App\Services\PdfService')->split($problemSet->fullPath, $output_directory);
            \Log::info($problemSet->name . ' split ' . var_export($output_files, true));
        });
    }
}
