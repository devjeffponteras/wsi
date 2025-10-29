@extends('admin.layouts.app')

@section('pagetitle')
    News Categories Management
@endsection

@section('pagecss')
    <style>
        .category-stats {
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
        .badge {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 4px 8px;
            border-radius: 4px;
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
        .filter-section {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            border: 1px solid #e9ecef;
        }
        .filter-title {
            font-size: 1rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 15px;
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
                    <li class="breadcrumb-item active">News Categories</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1"> News Categories</h4>
            <p class="text-muted mg-b-0">Organize your news articles with categories</p>
        </div>
        <div class="d-flex gap-2">
            @if(auth()->user()->has_access_to_route('news-categories.create'))
                <a class="btn btn-primary" href="{{ route('news-categories.create') }}">
                    <i data-feather="plus" class="wd-16 mg-r-5"></i> Create Category
                </a>
            @endif
        </div>
    </div>

    <!-- Search Filter -->
    <div class="filter-section">
        <div class="filter-title"> Search Categories</div>
        <form id="filterForm" class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search categories..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-control">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active Only</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive Only</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="orderBy" class="form-control">
                    <option value="name" {{ request('orderBy') == 'name' ? 'selected' : '' }}>Sort by Name</option>
                    <option value="created_at" {{ request('orderBy') == 'created_at' ? 'selected' : '' }}>Sort by Date</option>
                    <option value="articles_count" {{ request('orderBy') == 'articles_count' ? 'selected' : '' }}>Sort by Article Count</option>
                </select>
            </div>
            <div class="col-md-2">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    <a href="{{ route('news-categories.index') }}" class="btn btn-secondary btn-sm">Reset</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Categories Table -->
    <div class="card">
        <div class="card-body pd-0">
            <div class="table-responsive">
                <table class="table table-hover mg-b-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Category Name</th>
                            <th width="150">Slug</th>
                            <th width="100">Status</th>
                            <th width="120">Articles</th>
                            <th width="120">Created</th>
                            <th width="140">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <!-- Category Name -->
                                <td>
                                    <div class="category-info">
                                        <h6 class="category-title mb-1">
                                            <i data-feather="folder" class="feather-14 mr-2"></i>
                                            {{ $category->name }}
                                        </h6>
                                        @if($category->description)
                                            <p class="category-description text-muted mb-0">
                                                {{ Str::limit($category->description, 80) }}
                                            </p>
                                        @endif
                                    </div>
                                </td>

                                <!-- Slug -->
                                <td>
                                    <code class="small">{{ $category->slug }}</code>
                                </td>

                                <!-- Status -->
                                <td>
                                    @if($category->is_active ?? true)
                                        <span class="badge badge-success">
                                            <i data-feather="check-circle" class="feather-12 mr-1"></i>
                                            Active
                                        </span>
                                    @else
                                        <span class="badge badge-secondary">
                                            <i data-feather="x-circle" class="feather-12 mr-1"></i>
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <!-- Articles Count -->
                                <td class="text-center">
                                    <div class="articles-count">
                                        <span class="badge badge-light">
                                            {{ $category->get_total_articles() }} articles
                                        </span>
                                    </div>
                                </td>

                                <!-- Created Date -->
                                <td>
                                    <div class="date-info">
                                        <div class="created-date">
                                            {{ $category->created_at->format('M j, Y') }}
                                        </div>
                                        <small class="text-muted">
                                            {{ $category->created_at->format('g:i A') }}
                                        </small>
                                    </div>
                                </td>

                                <!-- Actions -->
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        @if(auth()->user()->has_access_to_route('news-categories.edit'))
                                            <a href="{{ route('news-categories.edit', $category->id) }}"
                                               class="btn btn-outline-primary btn-sm"
                                               title="Edit Category">
                                                <i data-feather="edit" class="feather-14"></i>
                                            </a>
                                        @endif

                                        @if($category->get_total_articles() > 0)
                                            <a href="{{ route('news.index', ['category_id' => $category->id]) }}"
                                               class="btn btn-outline-info btn-sm"
                                               title="View Articles">
                                                <i data-feather="file-text" class="feather-14"></i>
                                            </a>
                                        @endif

                                        <button onclick="deleteCategory({{ $category->id }})"
                                                class="btn btn-outline-danger btn-sm"
                                                title="Delete Category">
                                            <i data-feather="trash-2" class="feather-14"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="empty-state">
                                        <i data-feather="folder" class="feather-48 text-muted mb-3"></i>
                                        <h5 class="text-muted">No Categories Found</h5>
                                        <p class="text-muted mb-3">You haven't created any news categories yet.</p>
                                        @if(auth()->user()->has_access_to_route('news-categories.create'))
                                            <a href="{{ route('news-categories.create') }}" class="btn btn-primary">
                                                <i data-feather="plus" class="feather-16 mr-2"></i> Create Your First Category
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
    @if(isset($categories) && $categories->hasPages())
        <div class="d-flex justify-content-between align-items-center mg-t-30">
            <div>
                <p class="text-muted mg-b-0">
                    Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} categories
                </p>
            </div>
            <div>
                {!! $categories->appends(request()->input())->links() !!}
            </div>
        </div>
    @endif
</div>
@endsection

@section('customjs')
    <script>
        $(function(){
            'use strict'

            // Initialize feather icons
            feather.replace();

            // Filter form submission
            $('#filterForm').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                window.location.href = "{{ route('news-categories.index') }}?" + formData;
            });
        });

        // Delete category function
        function deleteCategory(categoryId) {
            // Get category name for confirmation
            const categoryRow = event.target.closest('tr');
            const categoryName = categoryRow.querySelector('.category-title').textContent.trim();

            // Custom confirmation dialog
            const confirmationMessage = `Are you sure you want to delete this category?\n\n"${categoryName}"\n\nThis action cannot be undone. Articles in this category will need to be reassigned.`;

            if (confirm(confirmationMessage)) {
                // Show loading state
                const deleteButton = event.target.closest('button');
                const originalContent = deleteButton.innerHTML;
                deleteButton.innerHTML = '<i data-feather="loader" class="feather-14"></i>';
                deleteButton.disabled = true;

                // Create and submit form
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("news-categories.delete") }}';
                form.style.display = 'none';

                // Add CSRF token
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                // Add category ID as 'pages' parameter (controller expects this)
                const categoryIdField = document.createElement('input');
                categoryIdField.type = 'hidden';
                categoryIdField.name = 'pages';
                categoryIdField.value = categoryId;
                form.appendChild(categoryIdField);

                // Add form to document and submit
                document.body.appendChild(form);

                // Debug: Log what we're sending
                console.log('Deleting category:', {
                    categoryId: categoryId,
                    action: form.action,
                    csrfToken: csrfToken.value
                });

                // Submit form
                form.submit();
            }
        }
    </script>
@endsection
