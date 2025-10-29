@extends('admin.layouts.app')

@section('pagetitle')
    Edit News Article
@endsection

@section('pagecss')
    <link href="{{ asset('lib/bselect/dist/css/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">

    <style>
        /* Article Body Styling - Matches News Detail Page Exactly */
        .article-body h1 {
            font-size: 2rem;
            font-weight: 800;
            color: #1e40af;
            margin: 2.5rem 0 1.5rem 0;
            line-height: 1.2;
            border-bottom: 3px solid #e5e7eb;
            padding-bottom: 0.75rem;
        }

        .article-body h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            margin: 2rem 0 1rem 0;
            line-height: 1.3;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 0.5rem;
        }

        .article-body h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #374151;
            margin: 1.5rem 0 0.75rem 0;
            line-height: 1.4;
        }

        .article-body h4 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #4b5563;
            margin: 1.25rem 0 0.5rem 0;
            line-height: 1.4;
        }

        .article-body p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #374151;
            margin: 0 0 1.5rem 0;
            text-align: justify;
        }

        .article-body ul, .article-body ol {
            margin: 1.5rem 0;
            padding-left: 2rem;
        }

        .article-body li {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #374151;
            margin: 0.5rem 0;
        }

        .article-body ul li {
            list-style-type: disc;
        }

        .article-body ol li {
            list-style-type: decimal;
        }

        .article-body strong {
            font-weight: 700;
            color: #1f2937;
        }

        .article-body em {
            font-style: italic;
            color: #6b7280;
        }

        .article-body blockquote {
            background: #f8fafc;
            border-left: 4px solid #1e40af;
            padding: 1.5rem;
            margin: 2rem 0;
            border-radius: 0 8px 8px 0;
            font-style: italic;
            color: #4b5563;
        }

        .article-body img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 1.5rem 0;
        }

        /* Preview Container Styling - Matches News Detail Page */
        .content-preview {
            background: white !important;
            border: 2px solid #e5e7eb !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .preview-title {
            color: #1f2937;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #e5e7eb;
            font-size: 1rem;
        }

        .preview-output.article-body {
            margin-bottom: 0;
        }

        #content-preview h6 {
            color: #1f2937;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #e5e7eb;
            font-size: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .content-preview {
                padding: 1.5rem;
            }

            .article-body h1 {
                font-size: 1.75rem;
                margin: 2rem 0 1rem 0;
            }

            .article-body h2 {
                font-size: 1.5rem;
                margin: 1.5rem 0 0.75rem 0;
            }

            .article-body h3 {
                font-size: 1.25rem;
                margin: 1.25rem 0 0.5rem 0;
            }

            .article-body h4 {
                font-size: 1.1rem;
                margin: 1rem 0 0.5rem 0;
            }

            .article-body p,
            .article-body li {
                font-size: 1rem;
                line-height: 1.6;
            }

            .article-body ul, .article-body ol {
                padding-left: 1.5rem;
            }
        }
    </style>
@endsection

@section('content')
<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('dashboard')}}">CMS</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('news.index')}}">News</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Edit News Article: {{ $news->name }}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">News Article Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="d-block">Title *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $news->name)}}" class="form-control @error('name') is-invalid @enderror" required maxlength="255" placeholder="Enter news title">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="d-block">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $news->slug)}}" class="form-control @error('slug') is-invalid @enderror" placeholder="Auto-generated if left empty">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="d-block">Category *</label>
                            <select name="category_id" class="selectpicker mg-b-5 @error('category_id') is-invalid @enderror" data-style="btn btn-outline-light btn-md btn-block tx-left" title="Select category" data-width="100%" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old("category_id", $news->category_id) == $category->id ? "selected":"") }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="d-block">Publication Date *</label>
                            <input type="date" name="date" id="date" value="{{ old('date', $news->date ? \Carbon\Carbon::parse($news->date)->format('Y-m-d') : date('Y-m-d'))}}" class="form-control @error('date') is-invalid @enderror" required>
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="d-block">Teaser/Summary</label>
                            <textarea name="teaser" id="teaser" class="form-control @error('teaser') is-invalid @enderror" rows="3" maxlength="500" placeholder="Brief description or summary of the article">{{ old('teaser', $news->teaser) }}</textarea>
                            @error('teaser')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="d-block">Content *</label>

                            <div class="alert alert-success mb-3">
                                <h6><strong>📝 HTML Commands to Use:</strong></h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="bg-light p-3 rounded">
                                            <p class="mb-2"><strong>Text Formatting:</strong></p>
                                            <ul class="small mb-2">
                                                <li><code>&lt;h1&gt;Main Title&lt;/h1&gt;</code></li>
                                                <li><code>&lt;h2&gt;Section Title&lt;/h2&gt;</code></li>
                                                <li><code>&lt;h3&gt;Sub Title&lt;/h3&gt;</code></li>
                                                <li><code>&lt;p&gt;Paragraph text&lt;/p&gt;</code></li>
                                                <li><code>&lt;strong&gt;Bold text&lt;/strong&gt;</code></li>
                                                <li><code>&lt;em&gt;Italic text&lt;/em&gt;</code></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bg-light p-3 rounded">
                                            <p class="mb-2"><strong>Lists & Links:</strong></p>
                                            <ul class="small mb-2">
                                                <li><code>&lt;ul&gt;&lt;li&gt;Bullet item&lt;/li&gt;&lt;/ul&gt;</code></li>
                                                <li><code>&lt;ol&gt;&lt;li&gt;Number item&lt;/li&gt;&lt;/ol&gt;</code></li>
                                                <li><code>&lt;a href="url"&gt;Link text&lt;/a&gt;</code></li>
                                                <li><code>&lt;img src="url" alt="text"&gt;</code></li>
                                                <li><code>&lt;br&gt;</code> = Line break</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <small class="text-muted">💡 <strong>Tip:</strong> You can type these HTML tags directly or use the toolbar buttons!</small>
                            </div>

                            <textarea name="contents" id="contents" class="form-control summernote @error('contents') is-invalid @enderror" required>{{ old('contents', $news->contents) }}</textarea>
                            @error('contents')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Publishing Options</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="visibility" name="visibility" value="1" {{ old('visibility', $news->status == 'Published') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="visibility">Publish Immediately</label>
                        </div>
                        <small class="text-muted">Uncheck to save as draft</small>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $news->is_featured) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_featured">Featured Article</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Images</h6>
                </div>
                <div class="card-body">
                    @if($news->banner_image || $news->thumbnail_image)
                        <div class="current-image mb-3">
                            <label class="d-block text-muted mb-2">Current Images:</label>
                            @if($news->banner_image)
                                <div class="mb-2">
                                    <span class="d-block small">Banner Image:</span>
                                    <img src="{{ $news->image }}" alt="{{ $news->name }} Banner" class="img-thumbnail" style="max-width: 200px; max-height: 150px;">
                                </div>
                            @endif
                            @if($news->thumbnail_image)
                                <div class="mb-2">
                                    <span class="d-block small">Thumbnail Image:</span>
                                    <img src="{{ $news->thumbnail }}" alt="{{ $news->name }} Thumbnail" class="img-thumbnail" style="max-width: 200px; max-height: 150px;">
                                </div>
                            @endif
                            <div class="mt-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="delete_image" name="delete_image" value="1">
                                    <label class="custom-control-label text-danger" for="delete_image">Delete current images</label>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="d-block">Banner Image</label>
                        <input type="file" name="news_image" id="news_image" class="form-control-file @error('news_image') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Main banner image for the article. Accepted formats: JPG, PNG, GIF. Max size: 5MB. Leave empty to keep current image.</small>
                        @error('news_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <!-- Image Preview -->
                        <div id="image_preview" class="mt-3" style="display: none;">
                            <label class="d-block">New Banner Image Preview:</label>
                            <img id="image_preview_img" src="" alt="Banner Image Preview" class="img-fluid" style="max-width: 300px; max-height: 200px; border: 1px solid #ddd; border-radius: 4px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="d-block">Thumbnail Image</label>
                        <input type="file" name="news_thumbnail" id="news_thumbnail" class="form-control-file @error('news_thumbnail') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Smaller version for article listings and previews. Accepted formats: JPG, PNG, GIF. Max size: 2MB</small>
                        @error('news_thumbnail')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <!-- Thumbnail Preview -->
                        <div id="thumbnail_preview" class="mt-3" style="display: none;">
                            <label class="d-block">New Thumbnail Image Preview:</label>
                            <img id="thumbnail_preview_img" src="" alt="Thumbnail Image Preview" class="img-fluid" style="max-width: 200px; max-height: 150px; border: 1px solid #ddd; border-radius: 4px;">
                        </div>

                        @if($news->thumbnail_image)
                            <div class="mt-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="delete_thumbnail" name="delete_thumbnail" value="1">
                                    <label class="custom-control-label text-danger" for="delete_thumbnail">Delete current thumbnail</label>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">SEO Settings</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="d-block">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $news->meta_title)}}" class="form-control @error('meta_title') is-invalid @enderror" maxlength="60" placeholder="SEO title">
                        @error('meta_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">Meta Keywords</label>
                        <input type="text" name="meta_keyword" id="meta_keyword" value="{{ old('meta_keyword', $news->meta_keyword)}}" class="form-control @error('meta_keyword') is-invalid @enderror" placeholder="keyword1, keyword2, keyword3" data-role="tagsinput">
                        @error('meta_keyword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="3" maxlength="160" placeholder="Brief description for search engines">{{ old('meta_description', $news->meta_description) }}</textarea>
                        @error('meta_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mg-t-20 text-center">
                <button class="btn btn-primary btn-sm btn-uppercase" type="submit" style="min-width: 150px;">Update News Article</button>
                <a class="btn btn-outline-secondary btn-sm btn-uppercase mg-l-10" href="{{ route('news.index') }}" style="min-width: 100px;">Cancel</a>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection

@section('pagejs')
    <script src="{{ asset('lib/bselect/dist/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('lib/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
@endsection

@section('customjs')
    <script>
        $(function() {
            $('.selectpicker').selectpicker();

            // Initialize Summernote
            $('.summernote').summernote({
                height: 400,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ]
            });

            // Initialize tags input
            $('[data-role="tagsinput"]').tagsinput();

            // Auto-generate slug from title (only if slug is empty)
            $('#name').on('input', function() {
                if ($('#slug').val() === '') {
                    let slug = $(this).val()
                        .toLowerCase()
                        .replace(/[^a-z0-9 -]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-')
                        .trim('-');
                    $('#slug').val(slug);
                }
            });

            // Image preview functionality
            $('#news_image').on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image_preview_img').attr('src', e.target.result);
                        $('#image_preview').show();
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#image_preview').hide();
                }
            });

            // Thumbnail preview functionality
            $('#news_thumbnail').on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#thumbnail_preview_img').attr('src', e.target.result);
                        $('#thumbnail_preview').show();
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#thumbnail_preview').hide();
                }
            });
        });
    </script>
@endsection
