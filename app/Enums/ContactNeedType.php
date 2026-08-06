<?php

namespace App\Enums;

enum ContactNeedType: string
{
    case Information = 'information';
    case Quote = 'quote';
    case AfterSales = 'after_sales';
    case Maintenance = 'maintenance';
    case Partnership = 'partnership';
    case Other = 'other';

    public function label(): string
    {
        return match ($this) {
            self::Information => 'Demande d\'information',
            self::Quote => 'Demande de devis',
            self::AfterSales => 'Service après-vente',
            self::Maintenance => 'Maintenance',
            self::Partnership => 'Partenariat',
            self::Other => 'Autre',
        };
    }
}
