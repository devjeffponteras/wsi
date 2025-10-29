<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'name', 'slug', 'contents', 'teaser', 'date', 'status', 'is_featured',
        'banner_image', 'thumbnail_image', 'category_id', 'user_id',
        'meta_title', 'meta_description', 'meta_keyword', 'json', 'styles'
    ];

    protected $casts = [
        'date' => 'date',
        'is_featured' => 'boolean',
        'json' => 'array',
        'deleted_at' => 'datetime'
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id')->withDefault([
            'name' => 'Uncategorized',
            'id' => '0',
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessors & Mutators
    public function getImageAttribute()
    {
        if ($this->banner_image) {
            // If it's a full URL, return as is
            if (filter_var($this->banner_image, FILTER_VALIDATE_URL)) {
                return $this->banner_image;
            }
            // If it's a filename, return the storage URL
            return Storage::disk('public')->url('news_image/' . $this->banner_image);
        }
        return asset('theme/images/banners/image1.jpg'); // Default fallback image
    }

    public function getThumbnailAttribute()
    {
        if ($this->thumbnail_image) {
            // If it's a full URL, return as is
            if (filter_var($this->thumbnail_image, FILTER_VALIDATE_URL)) {
                return $this->thumbnail_image;
            }
            // If it's a filename, return the storage URL
            return Storage::disk('public')->url('news_image/news_thumbnail/' . $this->thumbnail_image);
        }
        return $this->getImageAttribute(); // Fallback to main image
    }

    public function getExcerptAttribute()
    {
        if ($this->teaser) {
            return \Illuminate\Support\Str::limit($this->teaser, 120);
        }
        return \Illuminate\Support\Str::limit(strip_tags($this->contents), 120);
    }

    public function getUrlAttribute()
    {
        return url('/news/' . $this->slug);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'Published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('date', 'desc');
    }

    // Helper methods
    public static function getFeaturedArticle()
    {
        return self::published()->featured()->latest()->first();
    }

    public static function getLatestArticles($limit = 6)
    {
        return self::published()->with('category')->latest()->limit($limit)->get();
    }

    public static function getArticlesByCategory($categoryId, $limit = 6)
    {
        return self::published()->byCategory($categoryId)->with('category')->latest()->limit($limit)->get();
    }

    // File management helpers
    public function get_banner_image_storage_path()
    {
        $delimiter = 'storage/';
        if (strpos($this->banner_image, $delimiter) !== false) {
            $paths = explode($delimiter, $this->banner_image);
            return $paths[1];
        }
        return '';
    }

    public function get_thumbnail_image_storage_path()
    {
        $delimiter = 'storage/';
        if (strpos($this->thumbnail_image, $delimiter) !== false) {
            $paths = explode($delimiter, $this->thumbnail_image);
            return $paths[1];
        }
        return '';
    }

    // Check if user can set featured
    public static function can_set_featured()
    {
        return auth()->check() && (auth()->user()->is_an_admin() || auth()->user()->has_access_to_news_module());
    }

    // Statistics
    public static function totalNews()
    {
        return self::withTrashed()->count();
    }

    public static function totalPublishedNews()
    {
        return self::published()->count();
    }

    public static function totalDraftNews()
    {
        return self::where('status', 'Private')->count();
    }

    public static function totalDeletedNews()
    {
        $withTrashed = self::withTrashed()->count();
        return $withTrashed - self::count();
    }
}
