<?php

namespace App\Filament\Admin\Pages\Auth;

use App\Models\User;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseProfile;
use Filament\Support\Enums\Alignment;
use Illuminate\Support\Facades\Storage;

class EditProfile extends BaseProfile
{
    public function form(Form $form): Form
    {
        return $this->makeForm()
            ->schema([
                Section::make('Profile Information')
                    ->description('Update your account\'s profile information and email address.')
                    ->aside()
                    ->schema([
                        $this->getAvatarFormComponent(),
                        $this->getFirstNameFormComponent(),
                        $this->getLastNameFormComponent(),
                        $this->getUserNameFormComponent(),
                        $this->getEmailFormComponent(),
                    ]),
                Section::make('Update Password')
                    ->description('Ensure your account is using a long, random password to stay secure.')
                    ->aside()
                    ->schema([
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ]),
            ])
            ->operation('edit')
            ->model($this->getUser())
            ->statePath('data');
    }

    protected function getAvatarFormComponent(): Component
    {
        return FileUpload::make('avatar_url')
            ->label('Upload Avatar')
            ->image()
            ->imageEditor()
            ->avatar()
            ->directory('users')
            ->deleteUploadedFileUsing(fn (User $record) => Storage::disk('public')
                ->delete($record->avatar_url));
    }

    protected static function getFirstNameFormComponent()
    {
        return TextInput::make('first_name')
            ->maxLength(255)
            ->required();
    }

    protected static function getLastNameFormComponent()
    {
        return TextInput::make('last_name')
            ->maxLength(255)
            ->required();
    }

    protected static function getUserNameFormComponent()
    {
        return TextInput::make('username')
            ->maxLength(255)
            ->unique(ignoreRecord: true)
            ->required();
    }

    public function getFormActionsAlignment(): string|Alignment
    {
        return Alignment::End;
    }
}
