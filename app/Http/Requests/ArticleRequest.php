<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'meta_title' => 'SEO Title',
            'meta_description' => 'SEO Description',
            'meta_keyword' => 'SEO Keywords',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $currentCategoryId = optional($this->route('news'))->category_id
            ?? optional($this->route('article'))->category_id;

        return [
            'name' => 'required|max:150',
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
                    })
            ],
            'news_image' => 'nullable|image|max:5000',
            'news_thumbnail' => 'nullable|image|max:2000',
            'image_url' => 'nullable|url',
            'thumbnail_url' => 'nullable|url',
            'contents' => 'required',
            'visibility' => '',
            'teaser' => 'required',
            'is_featured' => '',
            'delete_image' => '',
            'delete_thumbnail' => '',
            'meta_title' => 'max:60',
            'meta_description' => 'max:160',
            'meta_keyword' => 'max:160',
            'json' => '',
            'styles' => ''
        ];
    }
}
