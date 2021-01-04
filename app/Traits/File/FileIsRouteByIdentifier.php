<?php


namespace App\Traits\File;


trait FileIsRouteByIdentifier
{
    public function getRouteKeyName(): string
    {
        return 'identifier';
    }
}
