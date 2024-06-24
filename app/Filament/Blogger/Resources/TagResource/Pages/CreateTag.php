<?php

namespace App\Filament\Blogger\Resources\TagResource\Pages;

use App\Filament\Blogger\Resources\TagResource;
use App\Filament\CreateRedirect;

class CreateTag extends CreateRedirect
{
    protected static string $resource = TagResource::class;
}
