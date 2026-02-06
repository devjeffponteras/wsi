<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            // Absolute URL
            if (filter_var($this->banner_image, FILTER_VALIDATE_URL)) {
                return $this->banner_image;
            }
            // Already a public path like "/images/..."
            if (is_string($this->banner_image) && Str::startsWith($this->banner_image, '/images/')) {
                return asset($this->banner_image);
            }
            // Plain filename stored in DB
            return asset('images/news_image/' . ltrim($this->banner_image, '/'));
        }
        return asset('theme/images/banners/image1.jpg'); // Default fallback image
    }

    public function getThumbnailAttribute()
    {
        if ($this->thumbnail_image) {
            if (filter_var($this->thumbnail_image, FILTER_VALIDATE_URL)) {
                return $this->thumbnail_image;
            }
            if (is_string($this->thumbnail_image) && Str::startsWith($this->thumbnail_image, '/images/')) {
                return asset($this->thumbnail_image);
            }
            return asset('images/news_image/news_thumbnail/' . ltrim($this->thumbnail_image, '/'));
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

    public function get_url()
    {
        return $this->getUrlAttribute();
    }

    public function date_posted()
    {
        return Carbon::parse($this->date)->toFormattedDateString();
    }

    public function get_created_at_date_only()
    {
        return Carbon::parse($this->created_at)->toFormattedDateString();
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
        if (!$this->banner_image) return '';

        // If we stored a public URL like /images/news_image/...
        if (is_string($this->banner_image) && Str::contains($this->banner_image, 'images/')) {
            $parts = explode('images/', $this->banner_image, 2);
            return 'images/' . ($parts[1] ?? '');
        }
        // If we stored only the filename
        return 'images/news_image/' . ltrim($this->banner_image, '/');
    }

    public function get_thumbnail_image_storage_path()
    {
        if (!$this->thumbnail_image) return '';

        if (is_string($this->thumbnail_image) && Str::contains($this->thumbnail_image, 'images/')) {
            $parts = explode('images/', $this->thumbnail_image, 2);
            return 'images/' . ($parts[1] ?? '');
        }
        return 'images/news_image/news_thumbnail/' . ltrim($this->thumbnail_image, '/');
    }

    // Check if user can set featured
    public static function can_set_featured()
    {
        return auth()->check() && (auth()->user()->is_an_admin() || auth()->user()->has_access_to_news_module());
    }

    // Featured helpers/limits
    public static function featured_limit(): int
    {
        return (int) env('FEATURED_NEWS_LIMIT', 5);
    }

    public static function has_featured_limit(): bool
    {
        return self::featured_limit() > 0;
    }

    public static function featured_count(): int
    {
        return (int) self::where('is_featured', true)->count();
    }

    public static function cannot_create_featured_news(): bool
    {
        return self::featured_count() >= self::featured_limit();
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
