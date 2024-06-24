<?php

namespace App\Filament\Blogger\Resources\PostResource\Pages;

use App\Filament\Blogger\Resources\PostResource;
use App\Filament\EditRedirect;
use Filament\Actions;

class EditPost extends EditRedirect
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
