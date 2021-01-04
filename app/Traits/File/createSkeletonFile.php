<?php


namespace App\Traits\File;


trait createSkeletonFile
{
    public function createSkeletonFile()
    {
        return auth()->user()->files()->create([
            'title' => 'nope',
            'overview_short' => 'nope',
            'overview' => 'nope',
            'price' => 0,
            'finished' => false
        ]);
    }
}
