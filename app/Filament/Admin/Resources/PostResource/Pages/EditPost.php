<?php

namespace App\Filament\Admin\Resources\PostResource\Pages;

use App\Filament\Admin\Resources\PostResource;
use App\Filament\EditRedirect;
use App\Models\Post;
use Filament\Actions;
use Illuminate\Support\Facades\Storage;

class EditPost extends EditRedirect
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('reset')
                ->outlined()
                ->icon('heroicon-o-arrow-path')
                ->action(fn () => $this->fillForm()),
            Actions\DeleteAction::make()
                ->outlined()
                ->before(function (Post $record) {
                    Storage::disk('public')->delete($record->cover);
                }),
        ];
    }
}
