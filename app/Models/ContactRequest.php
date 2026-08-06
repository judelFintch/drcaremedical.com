<?php

namespace App\Models;

use App\Enums\ContactNeedType;
use App\Enums\ContactRequestStatus;
use Database\Factories\ContactRequestFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name', 'institution', 'city', 'email', 'phone', 'need_type',
    'message', 'locale',
])]
class ContactRequest extends Model
{
    /** @use HasFactory<ContactRequestFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'status' => ContactRequestStatus::class,
            'need_type' => ContactNeedType::class,
            'processed_at' => 'datetime',
        ];
    }

    public function scopeNew($query)
    {
        return $query->where('status', ContactRequestStatus::New);
    }
}
