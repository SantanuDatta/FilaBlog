<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PostStatus: string implements HasColor, HasIcon, HasLabel
{
    case Draft = 'draft';
    case Reviewing = 'reviewing';
    case Published = 'published';
    case Rejected = 'rejected';

    public function getLabel(): string
    {
        return __($this->name);
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Draft => 'warning',
            self::Reviewing => 'info',
            self::Published => 'success',
            self::Rejected => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Draft => 'heroicon-s-arrow-path',
            self::Reviewing => 'heroicon-s-clock',
            self::Published => 'heroicon-s-check-badge',
            self::Rejected => 'heroicon-s-x-circle',
        };
    }

    public static function randomValue()
    {
        $cases = self::cases();
        $key = array_rand($cases);

        return $cases[$key]->value;
    }
}
