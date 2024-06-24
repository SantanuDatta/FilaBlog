<?php

namespace App\Filament\Blogger\Resources\PostResource\Pages;

use App\Filament\Blogger\Resources\PostResource;
use App\Filament\CreateRedirect;

class CreatePost extends CreateRedirect
{
    protected static string $resource = PostResource::class;
}
