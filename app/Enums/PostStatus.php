<?php
namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasLabel;

enum PostStatus: string implements HasLabel, HasColor, HasDescription {
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
            self::ARCHIVED  => 'heroicon-o-archive',
        };
    }

    public function getIconColor(): string | null {
        return match ($this) {
            self::DRAFT     => 'gray',
            self::PUBLISHED => 'success',
            self::ARCHIVED  => 'warning',
        };
    }

    public function getDescription(): ?string {
        return match ($this) {
            self::DRAFT     => 'El post no ha sido terminado de escribir y no estará visible para el público.',
            self::PUBLISHED => 'El post ha sido aprobado y estará público en el blog.',
            self::ARCHIVED  => 'El post ha sido archivado y no estará visible para el público.',
        };
    }
}
