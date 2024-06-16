<?php

namespace App\Filament\Admin\Resources\PostResource\Pages;

use App\Filament\Admin\Resources\PostResource;
use App\Filament\CreateRedirect;

class CreatePost extends CreateRedirect
{
    protected static string $resource = PostResource::class;
}
