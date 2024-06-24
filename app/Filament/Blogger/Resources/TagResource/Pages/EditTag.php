<?php

namespace App\Filament\Blogger\Resources\TagResource\Pages;

use App\Filament\Blogger\Resources\TagResource;
use App\Filament\EditRedirect;
use Filament\Actions;

class EditTag extends EditRedirect
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
