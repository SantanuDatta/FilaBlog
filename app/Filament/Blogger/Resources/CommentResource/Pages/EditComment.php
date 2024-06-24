<?php

namespace App\Filament\Blogger\Resources\CommentResource\Pages;

use App\Filament\Blogger\Resources\CommentResource;
use App\Filament\EditRedirect;
use Filament\Actions;

class EditComment extends EditRedirect
{
    protected static string $resource = CommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
