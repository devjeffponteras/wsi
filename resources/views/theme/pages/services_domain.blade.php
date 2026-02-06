@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>
    /* Additional styles for domain checker and table */
    .domain-checker {
        width: 100%;
        max-width: none;
        padding: 2rem 0;
        background: #fff;
        border-radius: 0;
        box-shadow: none;
        display: none; /* Hidden by default */
    }
    .domain-checker form {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }
    .domain-input {
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        font-size: 1rem;
        width: 200px;
    }
    .domain-extension {
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        font-size: 1rem;
        width: 100px;
    }
    .domain-table {
        width: 100%;
        max-width: 1200px;
        margin: 2rem auto 0;
        border-collapse: collapse;
    }
    .domain-table th,
    .domain-table td {
        padding: 1rem;
        text-align: left;
        border: 1px solid #e5e7eb;
    }
    .domain-table th {
        background-color: #f3f4f6;
        font-weight: 600;
    }
    .domain-table tr:nth-child(even) {
        background-color: #f9fafb;
    }
    /* Styles for custom domain cards */
    .custom-domain-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(43, 86, 211, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }
    .custom-domain-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }
    .custom-domain-card .card-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .domain-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 8px;
        background: linear-gradient(135deg, #2b56d3, #5b7ce8);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
    }
    .custom-domain-card .card-header h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
    }
    .custom-domain-card .card-content {
        list-style: none;
        padding: 0;
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }
    .custom-domain-card .card-content li {
        padding: 0.5rem 0;
        border-bottom: 1px solid #f3f4f6;
        color: #6b7280;
    }
    .custom-domain-card .card-content li:last-child {
        border-bottom: none;
    }
    .custom-domain-card .card-footer {
        font-size: 1.5rem;
        font-weight: 800;
        color: #2b56d3;
        margin-bottom: 1rem;
    }
    .custom-domain-card .package-cta {
        width: 100%;
        text-align: center;
    }
    @media (max-width: 1024px) {
        .custom-domain-card {
            margin-bottom: 1rem;
        }
    }
    @media (max-width: 640px) {
        .domain-checker form {
            flex-direction: column;
            gap: 0.5rem;
        }
        .domain-input, .domain-extension, .btn.btn-primary {
            width: 100%;
        }
        .grid-cols-2 {
            grid-template-columns: 1fr; /* Stack cards vertically on small screens */
        }
    }
    /* Enhanced styles for Domain Types table */
    .domain-types-table {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        border-collapse: separate;
        border-spacing: 0;
        background: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    .domain-types-table th,
    .domain-types-table td {
        padding: 1.2rem 1.5rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }
    .domain-types-table th {
        background-color: #2b56d3;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .domain-types-table tr:last-child td {
        border-bottom: none;
    }
    .domain-types-table tr:hover {
        background-color: #f3f4f6;
        transition: background-color 0.3s ease;
    }
    .domain-types-table .type-cell {
        display: flex;
        align-items: center;
        font-weight: 600;
        color: #1f2937;
    }
    .domain-types-table .type-cell .domain-icon {
        width: 2rem;
        height: 2rem;
        margin-right: 0.75rem;
        font-size: 1rem;
        transition: transform 0.3s ease;
    }
    .domain-types-table tr:hover .domain-icon {
        transform: scale(1.1);
    }
    .domain-types-table .description-cell {
        color: #4b5563;
        font-size: 0.95rem;
    }
    .domain-types-table .extensions-cell {
        font-family: monospace;
        color: #2b56d3;
    }
    /* Styles for See All Domain Price button */
    .see-all-button {
        display: block;
        margin: 1.5rem auto;
        padding: 0.75rem 1.5rem;
        background-color: #2b56d3;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .see-all-button:hover {
        background-color:  #ff5600;
        transform: translateY(-2px);
    }
    @media (max-width: 640px) {
        .domain-types-table {
            display: block;
            overflow-x: auto;
        }
        .domain-types-table th,
        .domain-types-table td {
            min-width: 150px;
        }
    }
</style>
@endsection

@section('content')
<div class="flex flex-col min-h-screen">
    <!-- Hero Section -->

    <!-- Why a Custom Domain Matters -->
    {!! $content->contents !!}
    <!-- Domain Checker -->

    <!-- FAQ Section -->

         <!-- CTA Section -->
        @include('theme.pages.partials.news-cta', [
            'ctaHeroStyle' => 'transform: rotateY(180deg); bottom: 0; left: 10%; width: 770px;'
        ])
</div>
@endsection

@section('pagejs')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -30px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, observerOptions);

    // Observe scroll animation elements
    document.querySelectorAll('.scroll-animate').forEach(el => observer.observe(el));

    // Button hover effect
    document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('mouseenter', () => {
            btn.style.transform = 'translateY(-3px)';
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = 'translateY(0)';
        });
    });

    // Toggle Domain Checker visibility
    const toggleButton = document.getElementById('toggleDomainChecker');
    const domainChecker = document.querySelector('.domain-checker');
    toggleButton.addEventListener('click', function() {
        if (domainChecker.style.display === 'none' || domainChecker.style.display === '') {
            domainChecker.style.display = 'block';
        } else {
            domainChecker.style.display = 'none';
        }
    });
});
</script>
@endsection
