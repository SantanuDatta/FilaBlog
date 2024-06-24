<?php

namespace App\Filament\Blogger\Resources\CommentResource\Pages;

use App\Filament\Blogger\Resources\CommentResource;
use App\Filament\CreateRedirect;

class CreateComment extends CreateRedirect
{
    protected static string $resource = CommentResource::class;
}
