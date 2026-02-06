<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'meta_title' => 'SEO Title',
            'meta_description' => 'SEO Description',
            'meta_keyword' => 'SEO Keywords',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $currentCategoryId = optional($this->route('news'))->category_id;

        return [
            'name' => 'required|max:255',
            'date' => 'required|date',
            'category_id' => [
                'nullable',
                Rule::exists('article_categories', 'id')
                    ->whereNull('deleted_at')
                    ->where(function ($query) use ($currentCategoryId) {
                        $query->where('status', 'Published');

                        if ($currentCategoryId) {
                            $query->orWhere('id', $currentCategoryId);
                        }
                    }),
            ],
            'news_image' => 'nullable|image|max:5000',
            'news_thumbnail' => 'nullable|image|max:2000',
            'image_url' => 'nullable|url',
            'thumbnail_url' => 'nullable|url',
            'contents' => 'required',
            'visibility' => 'nullable',
            'teaser' => 'required|max:1000',
            'is_featured' => 'nullable',
            'delete_image' => 'nullable',
            'delete_thumbnail' => 'nullable',
            'meta_title' => 'nullable|max:60',
            'meta_description' => 'nullable|max:160',
            'meta_keyword' => 'nullable|max:160',
            'json' => 'nullable',
            'styles' => 'nullable'
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The news title is required.',
            'name.max' => 'The news title cannot exceed 255 characters.',
            'date.required' => 'The publication date is required.',
            'date.date' => 'Please provide a valid publication date.',
            'contents.required' => 'The news content is required.',
            'teaser.required' => 'The news summary/teaser is required.',
            'teaser.max' => 'The news summary cannot exceed 1000 characters.',
            'category_id.exists' => 'The selected category is invalid.',
            'news_image.image' => 'The uploaded file must be an image.',
            'news_image.max' => 'The image file size cannot exceed 5MB.',
            'news_thumbnail.image' => 'The uploaded thumbnail must be an image.',
            'news_thumbnail.max' => 'The thumbnail file size cannot exceed 2MB.',
            'image_url.url' => 'Please provide a valid image URL.',
            'thumbnail_url.url' => 'Please provide a valid thumbnail URL.',
            'meta_title.max' => 'The SEO title cannot exceed 60 characters.',
            'meta_description.max' => 'The SEO description cannot exceed 160 characters.',
            'meta_keyword.max' => 'The SEO keywords cannot exceed 160 characters.'
        ];
    }
}
