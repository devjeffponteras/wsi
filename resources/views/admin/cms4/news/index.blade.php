@extends('admin.layouts.app')

@section('pagetitle')
    News Management
@endsection

@section('pagecss')
    <link href="{{ asset('lib/ion-rangeslider/css/ion.rangeSlider.min.css') }}" rel="stylesheet">
    <style>
        .news-stats {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
        }
        .stat-item {
            text-align: center;
        }
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            display: block;
        }
        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        .news-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            margin-bottom: 20px;
            overflow: hidden;
            position: relative;
        }
        .news-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }
        .news-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 0.9rem;
        }
        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .news-image-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 180px;
            background: #f8f9fa;
            color: #6c757d;
            font-size: 0.9rem;
        }
        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }
        .delete-btn:hover {
            background: #c82333;
            transform: scale(1.1);
        }
        .news-header {
            background: #f8f9fa;
            padding: 15px 20px;
            border-bottom: 1px solid #dee2e6;
        }
        .news-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0;
            color: #495057;
        }
        .news-meta {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 5px;
        }
        .news-content {
            padding: 20px;
        }
        .news-excerpt {
            color: #6c757d;
            margin-bottom: 15px;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        .news-tags {
            margin-bottom: 15px;
        }
        .tag {
            display: inline-block;
            padding: 4px 8px;
            background: #e9ecef;
            color: #495057;
            border-radius: 12px;
            font-size: 0.75rem;
            margin-right: 8px;
            margin-bottom: 5px;
        }
        .tag.published {
            background: #d4edda;
            color: #155724;
        }
        .tag.draft {
            background: #fff3cd;
            color: #856404;
        }
        .tag.featured {
            background: #cce5ff;
            color: #004085;
        }
        .news-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .btn-action {
            padding: 6px 12px;
            font-size: 0.8rem;
            border-radius: 5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }
        .btn-edit {
            background: #17a2b8;
            color: white;
        }
        .btn-edit:hover {
            background: #138496;
            color: white;
        }
        .btn-view {
            background: #28a745;
            color: white;
        }
        .btn-view:hover {
            background: #218838;
            color: white;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background: #c82333;
            color: white;
        }
        .filter-section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 25px;
        }
        .filter-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #495057;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        /* Table Styles */
        .table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background: #f8f9fa;
            border: none;
            color: #495057;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 15px 12px;
            vertical-align: middle;
        }

        .table tbody td {
            padding: 15px 12px;
            vertical-align: middle;
            border-top: 1px solid #e9ecef;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Article Info */
        .article-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #495057;
            line-height: 1.3;
            margin-bottom: 4px;
        }

        .article-excerpt {
            font-size: 0.8rem;
            line-height: 1.4;
            margin-bottom: 0;
        }

        /* Badges */
        .badge {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 4px 8px;
            border-radius: 4px;
        }

        .badge-category {
            background: #e9ecef;
            color: #495057;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .badge-secondary {
            background: #e2e3e5;
            color: #6c757d;
            border: 1px solid #d6d8db;
        }

        .badge-warning {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }

        /* Date Info */
        .date-info {
            text-align: center;
        }

        .published-date {
            font-size: 0.875rem;
            font-weight: 500;
            color: #495057;
            margin-bottom: 2px;
        }

        /* Stats Info */
        .stats-info {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .views-count {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Action Buttons */
        .btn-group .btn {
            border-radius: 4px;
            margin-right: 2px;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-outline-info:hover {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
@endsection

@section('content')
<div class="container pd-x-0">
    <!-- Header Section -->
    <div class="d-sm-flex align-items-center justify-content-between mg-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-5">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">News Management</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">News Articles</h4>
            <p class="text-muted mg-b-0">Manage and organize your news articles</p>
        </div>
        <div class="d-flex gap-2">
            @if(auth()->user()->has_access_to_route('news.create'))
                <a class="btn btn-primary" href="{{ route('news.create') }}">
                    <i data-feather="plus" class="wd-16 mg-r-5"></i> Create New Article
                </a>
            @endif
        </div>
    </div>

    <!-- Quick Filters -->
    <div class="filter-section">
        <div class="filter-title">Quick Filters</div>
        <form id="filterForm" class="row">
            <div class="col-md-3">
                <label class="form-label">Sort by</label>
                <select name="orderBy" class="form-control">
                    <option value="updated_at" @if (isset($filter) && $filter->orderBy == 'updated_at') selected @endif>Last Modified</option>
                    <option value="name" @if (isset($filter) && $filter->orderBy == 'name') selected @endif>Title</option>
                    <option value="date" @if (isset($filter) && $filter->orderBy == 'date') selected @endif>Publication Date</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Order</label>
                <select name="orderType" class="form-control">
                    <option value="desc" @if (isset($filter) && $filter->sortBy == 'desc') selected @endif>Newest First</option>
                    <option value="asc" @if (isset($filter) && $filter->sortBy == 'asc') selected @endif>Oldest First</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="">All Status</option>
                    <option value="Published" @if (isset($advanceSearchData) && $advanceSearchData->status == 'Published') selected @endif>Published</option>
                    <option value="Private" @if (isset($advanceSearchData) && $advanceSearchData->status == 'Private') selected @endif>Draft</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control">
                    <option value="">All Categories</option>
                    @if(isset($uniqueNewsByCategory))
                        @php $categories = collect($uniqueNewsByCategory)->pluck('category')->unique('id')->filter() @endphp
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if (isset($advanceSearchData) && $advanceSearchData->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">&nbsp;</label>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                    <button type="button" id="reset" class="btn btn-secondary btn-sm">Reset</button>
                </div>
            </div>
        </form>
    </div>

    <!-- News Articles Table -->
    <div class="card">
        <div class="card-body pd-0">
            <div class="table-responsive">
                <table class="table table-hover mg-b-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Title</th>
                            <th width="120">Category</th>
                            <th width="100">Status</th>
                            <th width="120">Date</th>
                            <th width="80">Views</th>
                            <th width="140">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($news as $article)
                            <tr>
                                <!-- Title Column -->
                                <td>
                                    <div class="article-info">
                                        <h6 class="article-title mb-1">
                                            {{ $article->name }}
                                            @if($article->is_featured)
                                                <span class="badge badge-warning badge-sm ml-1">
                                                    <i data-feather="star" class="feather-12"></i> Featured
                                                </span>
                                            @endif
                                        </h6>
                                        @if($article->teaser)
                                            <p class="article-excerpt text-muted mb-0">
                                                {{ Str::limit($article->teaser, 80) }}
                                            </p>
                                        @endif
                                    </div>
                                </td>                                <!-- Category Column -->
                                <td>
                                    @if($article->category)
                                        <span class="badge badge-light badge-category">
                                            <i data-feather="folder" class="feather-12 mr-1"></i>
                                            {{ $article->category->name }}
                                        </span>
                                    @else
                                        <span class="text-muted">No Category</span>
                                    @endif
                                </td>

                                <!-- Status Column -->
                                <td>
                                    @if($article->status == 'Published')
                                        <span class="badge badge-success">
                                            <i data-feather="check-circle" class="feather-12 mr-1"></i>
                                            Published
                                        </span>
                                    @else
                                        <span class="badge badge-secondary">
                                            <i data-feather="edit" class="feather-12 mr-1"></i>
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                <!-- Date Column -->
                                <td>
                                    <div class="date-info">
                                        <div class="published-date">
                                            {{ \Carbon\Carbon::parse($article->date)->format('M j, Y') }}
                                        </div>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($article->updated_at)->format('g:i A') }}
                                        </small>
                                    </div>
                                </td>

                                <!-- Views Column -->
                                <td>
                                    <div class="stats-info text-center">
                                        <div class="views-count">
                                            <i data-feather="eye" class="feather-14 text-muted"></i>
                                            <span class="ml-1">{{ $article->views ?? 0 }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Actions Column -->
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        @if(auth()->user()->has_access_to_route('news.edit'))
                                            <a href="{{ route('news.edit', $article->id) }}"
                                               class="btn btn-outline-primary btn-sm"
                                               title="Edit Article">
                                                <i data-feather="edit" class="feather-14"></i>
                                            </a>
                                        @endif

                                        @if($article->status == 'Published')
                                            <a href="{{ url('/news/' . $article->slug) }}"
                                               target="_blank"
                                               class="btn btn-outline-info btn-sm"
                                               title="View Live">
                                                <i data-feather="external-link" class="feather-14"></i>
                                            </a>
                                        @endif

                                        <button onclick="deleteArticle({{ $article->id }})"
                                                class="btn btn-outline-danger btn-sm"
                                                title="Delete Article">
                                            <i data-feather="trash-2" class="feather-14"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="empty-state">
                                        <i data-feather="file-text" class="feather-48 text-muted mb-3"></i>
                                        <h5 class="text-muted">No News Articles Found</h5>
                                        <p class="text-muted mb-3">You haven't created any news articles yet.</p>
                                        @if(auth()->user()->has_access_to_route('news.create'))
                                            <a href="{{ route('news.create') }}" class="btn btn-primary">
                                                <i data-feather="plus" class="feather-16 mr-2"></i> Create Your First Article
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    @if(isset($news) && $news->hasPages())
        <div class="d-flex justify-content-between align-items-center mg-t-30">
            <div>
                <p class="text-muted mg-b-0">
                    Showing {{ $news->firstItem() }} to {{ $news->lastItem() }} of {{ $news->total() }} articles
                </p>
            </div>
            <div>
                {!! $news->appends(request()->input())->links() !!}
            </div>
        </div>
    @endif
</div>

@endsection

@section('pagejs')
    <script src="{{ asset('lib/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
@endsection

@section('customjs')
    <script>
        $(function(){
            'use strict'

            // Filter form submission
            $('#filterForm').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                window.location.href = "{{ route('news.index') }}?" + formData;
            });

            // Reset filter
            $('#reset').on('click', function() {
                window.location.href = "{{ route('news.index') }}";
            });

            // Initialize feather icons
            feather.replace();
        });

        // Delete article function
        function deleteArticle(articleId) {
            // Get article title for confirmation
            const articleRow = event.target.closest('tr');
            const articleTitle = articleRow.querySelector('.article-title').textContent.trim();

            // Custom confirmation dialog
            const confirmationMessage = `Are you sure you want to delete this article?`;

            if (confirm(confirmationMessage)) {
                // Show loading state
                const deleteButton = event.target.closest('button');
                const originalContent = deleteButton.innerHTML;
                deleteButton.innerHTML = '<i data-feather="loader" class="feather-14"></i>';
                deleteButton.disabled = true;

                // Create and submit form
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("news.delete") }}';
                form.style.display = 'none';

                // Add CSRF token
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                // Add article ID as 'pages' parameter (controller expects this)
                const articleIdField = document.createElement('input');
                articleIdField.type = 'hidden';
                articleIdField.name = 'pages';
                articleIdField.value = articleId;
                form.appendChild(articleIdField);

                // Add form to document and submit
                document.body.appendChild(form);

                // Debug: Log what we're sending
                console.log('Deleting article:', {
                    articleId: articleId,
                    action: form.action,
                    csrfToken: csrfToken.value
                });

                // Submit form
                form.submit();
            }
        }

        // Alternative AJAX delete function for better error handling
        function deleteArticleAjax(articleId) {
            // Get article title for confirmation
            const articleRow = event.target.closest('tr');
            const articleTitle = articleRow.querySelector('.article-title').textContent.trim();

            if (confirm(`Are you sure you want to delete "${articleTitle}"?\n\nThis action cannot be undone.`)) {
                const deleteButton = event.target.closest('button');
                const originalContent = deleteButton.innerHTML;

                // Show loading state
                deleteButton.innerHTML = '<i data-feather="loader" class="feather-14"></i>';
                deleteButton.disabled = true;

                // Create form data
                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('pages', articleId);

                // AJAX request
                fetch('{{ route("news.delete") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log('Delete response:', response);
                    if (response.ok) {
                        // Success - reload page to show updated list
                        window.location.reload();
                    } else {
                        throw new Error('Delete failed with status: ' + response.status);
                    }
                })
                .catch(error => {
                    console.error('Delete error:', error);

                    // Restore button
                    deleteButton.innerHTML = originalContent;
                    deleteButton.disabled = false;
                    feather.replace();

                    // Show error message
                    alert('Failed to delete article. Please check the console for details and try again.');
                });
            }
        }
    </script>
@endsection
