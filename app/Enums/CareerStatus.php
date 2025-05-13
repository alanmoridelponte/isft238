<?php
namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum CareerStatus: string implements HasLabel, HasColor, HasIcon, HasDescription {
case DRAFT     = 'draft';
case PUBLISHED = 'published';
case ARCHIVED  = 'archived';

    public function getLabel(): string {
        return match ($this) {
            self::DRAFT => 'Borrador',
            self::PUBLISHED => 'Publicado',
            self::ARCHIVED  => 'Archivado'
        };
    }

    public function getColor(): string | array | null {
        return match ($this) {
            self::DRAFT     => 'gray',
            self::ARCHIVED  => 'warning',
            self::PUBLISHED => 'success',
        };
    }

    public function getIcon(): string | null {
        return match ($this) {
            self::DRAFT     => 'heroicon-o-pencil',
            self::PUBLISHED => 'heroicon-o-check-circle',
            self::ARCHIVED  => 'heroicon-o-archive-box',
        };
    }

    public function getDescription(): ?string {
        return match ($this) {
            self::DRAFT     => 'Borrador: No visible públicamente.',
            self::PUBLISHED => 'Publicado: Visible en la página.',
            self::ARCHIVED  => 'Archivado: Ya no es público.',
        };
    }
}
