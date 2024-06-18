<?php

namespace App\Filament\Admin\Resources\CommentResource\Pages;

use App\Filament\Admin\Resources\CommentResource;
use App\Filament\CreateRedirect;

class CreateComment extends CreateRedirect
{
    protected static string $resource = CommentResource::class;
}
