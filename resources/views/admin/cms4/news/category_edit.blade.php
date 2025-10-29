@extends('admin.layouts.app')

@section('pagetitle')
    Edit News Category
@endsection

@section('pagecss')
    <link href="{{ asset('lib/bselect/dist/css/bootstrap-select.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('dashboard')}}">CMS</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('news-categories.index')}}">News Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Edit Category: {{ $newsCategory->name }}</h4>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('news-categories.update', $newsCategory->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            <i data-feather="folder" class="feather-16 mr-2"></i>
                            Category Information
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="d-block">Category Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $newsCategory->name)}}"
                                   class="form-control @error('name') is-invalid @enderror"
                                   required maxlength="255"
                                   placeholder="Enter category name">
                            <small class="text-muted">This will be the display name of the category</small>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="d-block">Category Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $newsCategory->slug)}}"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   placeholder="auto-generated-from-name">
                            <small class="text-muted">Leave empty to auto-generate from category name. Used in URLs.</small>
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="d-block">Description</label>
                            <textarea name="description" id="description"
                                      class="form-control @error('description') is-invalid @enderror"
                                      rows="4" maxlength="500"
                                      placeholder="Brief description of this category (optional)">{{ old('description', $newsCategory->description) }}</textarea>
                            <small class="text-muted">Optional description to explain what type of articles belong to this category</small>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="card-title">
                            <i data-feather="settings" class="feather-16 mr-2"></i>
                            Category Settings
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', $newsCategory->is_active ?? true) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">
                                    <strong>Active Category</strong>
                                </label>
                            </div>
                            <small class="text-muted">Only active categories will be available when creating/editing articles</small>
                        </div>

                        <div class="form-group">
                            <label class="d-block">Display Order</label>
                            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $newsCategory->sort_order ?? 0)}}"
                                   class="form-control @error('sort_order') is-invalid @enderror"
                                   min="0" placeholder="0">
                            <small class="text-muted">Lower numbers appear first. Use 0 for default ordering.</small>
                            @error('sort_order')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mg-t-30 text-center">
                    <button class="btn btn-primary btn-md pd-x-20" type="submit">
                        <i data-feather="save" class="feather-16 mr-2"></i>
                        Update Category
                    </button>
                    <a class="btn btn-outline-secondary btn-md pd-x-20 mg-l-10" href="{{ route('news-categories.index') }}">
                        <i data-feather="x" class="feather-16 mr-2"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">
                        <i data-feather="bar-chart-2" class="feather-16 mr-2"></i>
                        Category Statistics
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="stat-item">
                                <h3 class="text-primary mb-1">{{ $newsCategory->get_total_articles() }}</h3>
                                <small class="text-muted">Articles</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-item">
                                <h3 class="text-success mb-1">{{ $newsCategory->created_at->diffForHumans() }}</h3>
                                <small class="text-muted">Created</small>
                            </div>
                        </div>
                    </div>

                    @if($newsCategory->get_total_articles() > 0)
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('news.index', ['category_id' => $newsCategory->id]) }}" class="btn btn-outline-info btn-sm">
                                <i data-feather="file-text" class="feather-14 mr-2"></i>
                                View Articles in this Category
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="card-title">
                        <i data-feather="info" class="feather-16 mr-2"></i>
                        Category Guidelines
                    </h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h6 class="alert-heading">
                            <i data-feather="lightbulb" class="feather-16 mr-2"></i>
                            Tips for Managing Categories
                        </h6>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <i data-feather="check" class="feather-14 mr-2 text-success"></i>
                                Keep category names descriptive
                            </li>
                            <li class="mb-2">
                                <i data-feather="check" class="feather-14 mr-2 text-success"></i>
                                Update slugs carefully
                            </li>
                            <li class="mb-2">
                                <i data-feather="check" class="feather-14 mr-2 text-success"></i>
                                Consider existing articles
                            </li>
                            <li class="mb-2">
                                <i data-feather="check" class="feather-14 mr-2 text-success"></i>
                                Test category changes
                            </li>
                        </ul>
                    </div>

                    @if($newsCategory->get_total_articles() > 0)
                        <div class="alert alert-warning">
                            <h6 class="alert-heading">
                                <i data-feather="alert-triangle" class="feather-16 mr-2"></i>
                                Important Notice
                            </h6>
                            <p class="mb-0">
                                This category contains <strong>{{ $newsCategory->get_total_articles() }} articles</strong>.
                                Changes to this category will affect all associated articles.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
    <script src="{{ asset('lib/bselect/dist/js/bootstrap-select.js') }}"></script>
@endsection

@section('customjs')
    <script>
        $(function() {
            // Initialize Feather Icons
            feather.replace();

            // Auto-generate slug from category name (only if slug is empty)
            $('#name').on('input', function() {
                if ($('#slug').val() === '' || $('#slug').data('auto-generated')) {
                    let slug = $(this).val()
                        .toLowerCase()
                        .replace(/[^a-z0-9 -]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-')
                        .trim('-');
                    $('#slug').val(slug).data('auto-generated', true);
                }
            });

            // Mark slug as manually edited if user types in it
            $('#slug').on('input', function() {
                $(this).removeData('auto-generated');
            });

            // Form validation
            $('form').on('submit', function(e) {
                let name = $('#name').val().trim();

                if (name === '') {
                    e.preventDefault();
                    alert('Please enter a category name.');
                    $('#name').focus();
                    return false;
                }

                if (name.length < 2) {
                    e.preventDefault();
                    alert('Category name must be at least 2 characters long.');
                    $('#name').focus();
                    return false;
                }

                // Show loading state
                $(this).find('button[type="submit"]').prop('disabled', true).html('<i data-feather="loader" class="feather-16 mr-2"></i> Updating...');
            });

            // Character counter for description
            $('#description').on('input', function() {
                let length = $(this).val().length;
                let maxLength = 500;
                let remaining = maxLength - length;

                let counter = $(this).siblings('.char-count');
                if (counter.length === 0) {
                    counter = $('<small class="char-count text-muted"></small>');
                    $(this).parent().append(counter);
                }

                counter.text(length + '/' + maxLength + ' characters');

                if (remaining < 50) {
                    counter.addClass('text-warning');
                } else {
                    counter.removeClass('text-warning');
                }

                if (remaining < 0) {
                    counter.addClass('text-danger').removeClass('text-warning');
                } else {
                    counter.removeClass('text-danger');
                }
            });

            // Trigger character counter on load
            $('#description').trigger('input');
        });
    </script>
@endsection
