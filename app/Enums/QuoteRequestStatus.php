<?php

namespace App\Enums;

enum QuoteRequestStatus: string
{
    case New = 'new';
    case UnderReview = 'under_review';
    case Answered = 'answered';
    case Accepted = 'accepted';
    case Refused = 'refused';
    case Archived = 'archived';

    public function label(): string
    {
        return match ($this) {
            self::New => 'Nouveau',
            self::UnderReview => 'En étude',
            self::Answered => 'Répondu',
            self::Accepted => 'Accepté',
            self::Refused => 'Refusé',
            self::Archived => 'Archivé',
        };
    }

    public function badgeColor(): string
    {
        return match ($this) {
            self::New => 'blue',
            self::UnderReview => 'amber',
            self::Answered => 'violet',
            self::Accepted => 'green',
            self::Refused => 'red',
            self::Archived => 'gray',
        };
    }
}
