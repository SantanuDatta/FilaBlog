<?php

namespace App\Filament\Admin\Resources\TagResource\Pages;

use App\Filament\Admin\Resources\TagResource;
use App\Filament\EditRedirect;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;

class EditTag extends EditRedirect
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('reset')
                ->outlined()
                ->icon('heroicon-o-arrow-path')
                ->action(fn () => $this->fillForm()),
            DeleteAction::make()
                ->outlined(),
        ];
    }
}
