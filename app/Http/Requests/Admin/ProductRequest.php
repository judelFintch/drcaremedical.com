<?php

namespace App\Http\Requests\Admin;

use App\Enums\PublicationStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name_fr' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'summary_fr' => ['nullable', 'string', 'max:255'],
            'summary_en' => ['nullable', 'string', 'max:255'],
            'description_fr' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'spec_labels' => ['nullable', 'array'],
            'spec_labels.*' => ['nullable', 'string', 'max:255'],
            'spec_values' => ['nullable', 'array'],
            'spec_values.*' => ['nullable', 'string', 'max:255'],
            'main_image' => ['nullable', 'image', 'max:4096'],
            'gallery.*' => ['nullable', 'image', 'max:4096'],
            'reference' => ['nullable', 'string', 'max:255'],
            'brand' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::enum(PublicationStatus::class)],
            'is_local_stock' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'order' => ['nullable', 'integer', 'min:0'],
            'seo_title_fr' => ['nullable', 'string', 'max:255'],
            'seo_title_en' => ['nullable', 'string', 'max:255'],
            'seo_description_fr' => ['nullable', 'string', 'max:500'],
            'seo_description_en' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function specifications(): array
    {
        $labels = $this->input('spec_labels', []);
        $values = $this->input('spec_values', []);

        $specs = [];

        foreach ($labels as $index => $label) {
            if (filled($label) && filled($values[$index] ?? null)) {
                $specs[$label] = $values[$index];
            }
        }

        return $specs;
    }
}
