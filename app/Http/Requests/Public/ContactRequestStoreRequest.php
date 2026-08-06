<?php

namespace App\Http\Requests\Public;

use App\Enums\ContactNeedType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequestStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Honeypot anti-spam : ce champ doit rester vide.
            'website' => ['prohibited'],

            'name' => ['required', 'string', 'max:255'],
            'institution' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'need_type' => ['required', Rule::enum(ContactNeedType::class)],
            'message' => ['required', 'string', 'max:5000'],
            'consent' => ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'consent.accepted' => 'Vous devez accepter le traitement de vos informations pour envoyer votre message.',
        ];
    }
}
