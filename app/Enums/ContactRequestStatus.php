<?php

namespace App\Enums;

enum ContactRequestStatus: string
{
    case New = 'new';
    case InProgress = 'in_progress';
    case Processed = 'processed';
    case Archived = 'archived';

    public function label(): string
    {
        return match ($this) {
            self::New => 'Nouveau',
            self::InProgress => 'En cours',
            self::Processed => 'Traité',
            self::Archived => 'Archivé',
        };
    }

    public function badgeColor(): string
    {
        return match ($this) {
            self::New => 'blue',
            self::InProgress => 'amber',
            self::Processed => 'green',
            self::Archived => 'gray',
        };
    }
}
