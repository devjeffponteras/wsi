
@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>
text-center.mb-12 {
    margin-bottom: 2rem;
}

.text-center.mb-12 h2 {
    margin: 0;
    line-height: 1.3;
}

.text-center.mb-12 h2 + h2 {
    margin-top: 0.5rem;
}

.highlight {
    display: inline-block;
    background: linear-gradient(90deg, #facc15);
    color: #000000ff;
    font-size: 1.8rem;
    padding: 6px 14px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    margin-bottom: 8px;
    font-weight: 600;
}


.focuscare-section {
    padding: 60px 0;
}

.focuscare-overlay {
    position: absolute;
    top: 260px;
    left: 50px;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: left;
    align-items: left;
    text-align: left;
}

.focuscare-img {
    width: 100%;
    height: auto;
    opacity: 0.3;
    object-fit: cover;
    border-radius: 12px;
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.focuscare {
    font-size: 4rem;
    font-weight: 800;
    margin-bottom: 0.1rem;
    line-height: 1.1;
    color: #086fddff;
}

.focuscare-subs {
    font-size: 1.2rem;
    color: #555;
    margin-top: 0;
    line-height: 1.2;
}

.focuscare-text_bg {
    font-size: 1.7rem;
    font-weight: 550;
    line-height: 1.2;
    color: #222;
    margin: 2px 0;
}

.focuscare-text_hover {
    font-size: 1.3rem;
    font-weight: 450;
    line-height: 1.2;
    color: #222;
    margin: 2px 0;
}

.focuscare-text_best {
    font-size: 1.2rem;
    font-weight: 400;
    line-height: 1.5;
    color: #222;
    margin: 4px 0;
}


.hosting-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 2rem 1.5rem;
    padding: 0 1rem;
}

.hosting-grid_fc {
    display: flex;
    justify-content: center;
    align-items: stretch;
    flex-wrap: wrap;
    gap: 7rem;
    text-align: center;
    margin-top: 2rem;
}

.hosting-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 16px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(43, 86, 211, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
}

.hosting-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.hosting-card_fc {
    background: #f9fafb;
    border-radius: 1rem;
    border: 1px solid #e5e7eb;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    display: flex;
    align-items: center;
    justify-content: center;
    height: 350px;
    width:300px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hosting-card_fc:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    border-color: #3b82f6;
}

.hosting-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.hosting-description {
    font-size: 1rem;
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    flex-grow: 1;
}

.hosting-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 3.5rem;
    height: 3.5rem;
    border-radius: 12px;
    background: linear-gradient(135deg, #2b56d3, #5b7ce8);
    color: white;
    margin-bottom: 1.5rem;
    transition: transform 0.3s ease;
}

.hosting-card:hover .hosting-icon {
    transform: scale(1.1);
}

.hosting-icon-secondary {
    background: linear-gradient(135deg, #ec4899, #ef4444);
}

.hosting-icon-accent {
    background: linear-gradient(135deg, #16a34a, #059669);
}

.hosting-icon-baremetal {
    background: linear-gradient(135deg, #6b7280, #4b5563);
}


.packages-section {
    padding: 2rem 0;
}

.packages-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 0 auto;
    max-width: 1300px;
    justify-content: center;
    align-items: stretch; /* ensures cards stretch to equal height */
}


.package-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(43, 86, 211, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%; /* stretch to full grid row */
}
.package-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.package-header {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
}

.package-icon {
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

.package-icon-secondary {
    background: linear-gradient(135deg, #ec4899, #ef4444);
}

.package-icon-accent {
    background: linear-gradient(135deg, #16a34a, #059669);
}

.package-icon-baremetal {
    background: linear-gradient(135deg, #6b7280, #4b5563);
}

.package-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
}

.package-price {
    font-size: 2.3rem;
    font-weight: 800;
    color: #2b56d3;
    margin-bottom: 1rem;
}


.package-features {
    list-style: none;
    padding: 0;
    margin-bottom: 1.5rem;
    flex-grow: 1;
    text-align: center;
}

.package-features li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #f3f4f6;
    color: #6b7280;
}

.package-features li:last-child {
    border-bottom: none;
}

.package-cta {
    width: 100%;
    text-align: center;
}

.package-save {
    display: inline-block;
    background: linear-gradient(90deg, #facc15, #f97316);
    color: #ffffffff;
    font-weight: bold;
    font-size: 0.9rem;
    padding: 6px 14px;
    border-radius: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    margin-bottom: 8px;
}

.plans-header {
    text-align: center;
    margin-bottom: 2rem;
}

.plans-header .rating {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: #1f2937;
    margin-bottom: 0.5rem;
    gap: 0.5rem;
}

.plans-header .stars {
    display: flex;
    gap: 0.25rem;
}

.plans-header .stars svg {
    width: 1.5rem;
    height: 1.5rem;
    fill: #facc15;
}

.plans-header .plan-tabs {
    display: flex;
    justify-content: center;
    gap: 0;
    margin-top: 1rem;
    position: relative;
    background: #e5e7eb;
    border-radius: 50px;
    padding: 4px;
    width: fit-content;
    margin-left: auto;
    margin-right: auto;
}



.plans-header .plan-tabs.yearly::before {
    transform: translateX(100%);
}

.plans-header .plan-tabs a {
    padding: 0.75rem 2rem;
    background: transparent;
    border-radius: 46px;
    text-decoration: none;
    color: #6b7280;
    font-weight: 600;
    display: inline-block;
    transition: color 0.3s ease;
    position: relative;
    z-index: 2;
    min-width: 120px;
    text-align: center;
}

.plans-header .plan-tabs a.active {
    color: white;
}

.plans-header .plan-tabs a:hover {
    color: #2b56d3;
}

.plans-header .plan-tabs a.active:hover {
    color: white;
}

.plans-intro {
    margin-top: 1.5rem;
    padding: 1rem 1.5rem;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 0.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.srp-highlight {
    background: linear-gradient(135deg, #fee2e2, #fecaca) !important;
    border: 2px solid #f87171 !important;
    border-radius: 12px;
    padding: 12px;
    margin-bottom: 12px;
    position: relative;
    box-shadow: 0 4px 12px rgba(248, 113, 113, 0.2);
    animation: srpPulse 2s infinite;
}

.srp-highlight::before {
    content: "💰";
    position: absolute;
    top: -8px;
    right: -8px;
    font-size: 1.2rem;
    background: #ef4444;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.srp-highlight .text-red-700 {
    color: #b91c1c !important;
    font-weight: 800;
    font-size: 1.1rem;
}

.srp-highlight .text-red-600 {
    color: #dc2626 !important;
    font-weight: 700;
    letter-spacing: 0.05em;
}

@keyframes srpPulse {
    0%, 100% {
        box-shadow: 0 4px 12px rgba(248, 113, 113, 0.2);
    }
    50% {
        box-shadow: 0 6px 16px rgba(248, 113, 113, 0.4);
    }
}

.pricing-compact {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 1.25rem;
}

.pricing-header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 0.5rem;
}

.save-badge {
    background: linear-gradient(90deg,#facc15,#f59e0b);
    color: #08203a;
    font-weight: 700;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 0.85rem;
    box-shadow: 0 2px 6px rgba(0,0,0,0.12);
    display: inline-block;
}

.srp-text {
    font-size: 0.95rem;
    color: #1f2937;
    font-weight: 600;
}

.price-large {
    font-family: 'Georgia', serif;
    font-size: 3.5rem;
    color: #08306a;
    font-weight: 800;
    letter-spacing: 0.02em;
    margin: 0.25rem 0 0.75rem;
    line-height: 0.9;
}

.inquire-cta {
    background: linear-gradient(180deg,#2b56d3,#1f4fd1);
    color: #fff;
    padding: 8px 22px;
    border-radius: 6px;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 4px 10px rgba(43,86,211,0.25);
    font-weight: 700;
}

.section-cta { 
    overflow: hidden; 
}

.section-cta .hero-decor { 
    max-width: 770px; 
    width: 42%; 
    height: auto; 
    bottom: 0; 
}

@media (max-width: 768px) {
    .section-cta .hero-decor {
        display: none !important;
    }
}

@media (max-width: 1279px) {
    .packages-grid {
        grid-template-columns: repeat(2, minmax(300px, 1fr));
    }
}

@media (max-width: 767px) {
    .packages-grid {
        grid-template-columns: 1fr;
    }
    .plans-header .plan-tabs a {
        padding: 0.5rem 1rem;
    }
}

@media (max-width: 480px) {
    .price-large { font-size: 2.6rem; }
    .pricing-header { gap: 0.4rem; }
}

packages-wrapper .packages-grid {
  display: none; /* hide all by default */
}

#plan1:checked ~ .packages-wrapper .year1 {
  display: flex; /* or block/grid as needed */
}

#plan2:checked ~ .packages-wrapper .year2 {
  display: flex;
}

/* Tabs styling */
.plan-tabs {
  margin-bottom: 20px;
}

.plan-tabs .tab-link {
  padding: 8px 16px;
  background: #f1f1f1;
  border-radius: 4px;
  margin-right: 5px;
  cursor: pointer;
}

#plan1:checked ~ .plan-tabs label[for="plan1"],
#plan2:checked ~ .plan-tabs label[for="plan2"] {
  background: #2b56d3;
  color: white;
}
.plan-tabs .tab-link {
  padding: 10px 20px;
  background: #f1f1f1;
  margin-right: 8px;
  cursor: pointer;
  border-radius: 50px; /* makes it fully rounded */
  transition: background 0.3s, color 0.3s;
  display: inline-block;
  font-weight: 500;
}

/* GENERAL STYLES */
.text-center.mb-12 {
    margin-bottom: 2rem;
}
.text-center.mb-12 h2 {
    margin: 0;
    line-height: 1.3;
}
.text-center.mb-12 h2 + h2 {
    margin-top: 0.5rem;
}
.highlight {
    display: inline-block;
    background: linear-gradient(90deg, #facc15);
    color: #000000ff;
    font-size: 1.8rem;
    padding: 6px 14px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    margin-bottom: 8px;
    font-weight: 600;
}

/* FOCUSCARE SECTION */
.focuscare-section {
    padding: 60px 0;
}
.focuscare-overlay {
    position: absolute;
    top: 260px;
    left: 50px;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: left;
    align-items: left;
    text-align: left;
}
.focuscare-img {
    width: 100%;
    height: auto;
    opacity: 0.3;
    object-fit: cover;
    border-radius: 12px;
    transition: opacity 0.3s ease, transform 0.3s ease;
}
.focuscare {
    font-size: 4rem;
    font-weight: 800;
    margin-bottom: 0.1rem;
    line-height: 1.1;
    color: #086fddff;
}
.focuscare-subs {
    font-size: 1.2rem;
    color: #555;
    margin-top: 0;
    line-height: 1.2;
}
.focuscare-text_bg, .focuscare-text_hover, .focuscare-text_best {
    color: #222;
}
.focuscare-text_bg {
    font-size: 1.7rem;
    font-weight: 550;
    line-height: 1.2;
    margin: 2px 0;
}
.focuscare-text_hover {
    font-size: 1.3rem;
    font-weight: 450;
    line-height: 1.2;
    margin: 2px 0;
}
.focuscare-text_best {
    font-size: 1.2rem;
    font-weight: 400;
    line-height: 1.5;
    margin: 4px 0;
}

/* HOSTING CARDS */
.hosting-grid, .hosting-grid_fc {
    display: grid;
    gap: 2rem;
    margin: 2rem 1.5rem;
}

.hosting-card_fc p {
    text-align: center;
    margin: 0 auto;
    line-height: 1.5;
}
.hosting-card{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hosting-card:hover, .hosting-card_fc:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
}

/* PACKAGES SECTION */
.packages-section {
    padding: 2rem 0;
}

/* PACKAGES GRID */
.packages-wrapper .packages-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 0 auto;
    max-width: 1300px;
    justify-content: center;
    align-items: stretch; /* stretch all cards */
}

/* Hide yearly groups by default */
.packages-wrapper .year1,
.packages-wrapper .year2 {
    display: none;
}

/* Show selected plan */
#plan1:checked ~ .packages-wrapper .year1,
#plan2:checked ~ .packages-wrapper .year2 {
    display: grid;
}
.year2{
    display: none;
}

/* PACKAGE CARDS */
.package-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: 1px solid rgba(43,86,211,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%; /* equal height */
}
.package-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

/* Inner sections stretch */

.package-features li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #f3f4f6;
    color: #6b7280;
}
.package-features li:last-child {
    border-bottom: none;
}

/* PACKAGE PRICE */
.package-price {
    font-size: 2.3rem;
    font-weight: 800;
    color: #2b56d3;
    margin-bottom: 1rem;
}
#package_price {
    margin-bottom: 14rem;
}

/* PACKAGE CTA */
.package-cta a {
    background: linear-gradient(180deg,#2b56d3,#1f4fd1);
    color: #fff;
    padding: 8px 22px;
    border-radius: 6px;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 4px 10px rgba(43,86,211,0.25);
    font-weight: 700;
    transition: transform 0.3s ease;
}
.package-cta a:hover {
    transform: translateY(-2px);
}

/* PLAN TABS */
.plan-tabs {
    margin-bottom: 20px;
    display: flex;
    justify-content: center;
    gap: 8px;
}
.plan-tabs .tab-link {
    padding: 10px 20px;
    background: #f1f1f1;
    border-radius: 50px;
    cursor: pointer;
    font-weight: 500;
    transition: background 0.3s, color 0.3s;
}
#plan1:checked ~ .plan-tabs label[for="plan1"],
#plan2:checked ~ .plan-tabs label[for="plan2"] {
    background: #2b56d3;
    color: white;
}
 .focuscare-card{
        margin-bottom: 1rem;
    }
    
/* RESPONSIVE */
@media (max-width: 1279px) {
    .packages-wrapper .packages-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 767px) {
    .packages-wrapper .packages-grid {
        grid-template-columns: 1fr;
    }
    .plan-tabs .tab-link {
        padding: 8px 16px;
    }
}
@media (max-width: 480px) {
    .price-large { font-size: 2.6rem; }
}
</style>


@endsection

@section('content')
<div class="flex flex-col min-h-screen">
    <!-- Hero Section -->

    <!-- Hosting Overview -->
   {!! $content->contents !!}
    <!-- CTA Section -->
        @include('theme.pages.partials.news-cta', [
            'ctaHeroStyle' => 'transform: rotateY(180deg); bottom: 0; left: 10%; width: 770px;'
        ])
</div>
@endsection

@section('pagejs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const plan1 = document.getElementById("plan1");
    const plan2 = document.getElementById("plan2");
    const year1 = document.querySelector(".year1");
    const year2 = document.querySelector(".year2");

    // Show year1 initially
    year1.style.display = "grid";

    function toggleYears() {
        if (plan1.checked) {
            year1.style.display = "grid";
            year2.style.display = "none";
        } else if (plan2.checked) {
            year1.style.display = "none";
            year2.style.display = "grid";
        }
    }

    plan1.addEventListener("change", toggleYears);
    plan2.addEventListener("change", toggleYears);
});
    </script>
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

    // Comprehensive pricing data based on your table
    const pricingData = {
        monthly: {
            standard: {
                price: '₱639',
                srp: '₱8,520',
                total: '₱7,668',
                discounted: '₱7,668',
                discount: '10%',
                duration: '1 year',
                period: '1 year subscription',
                savings: '₱852',
                description: 'You save ₱852 compared to SRP!'
            },
            deluxe: {
                price: '₱1,125',
                srp: '₱15,000',
                total: '₱13,500',
                discounted: '₱13,500',
                discount: '10%',
                duration: '1 year',
                period: '1 year subscription',
                savings: '₱1,500',
                description: 'You save ₱1,500 compared to SRP!'
            },
            business: {
                price: '₱1,809',
                srp: '₱24,120',
                total: '₱21,708',
                discounted: '₱21,708',
                discount: '10%',
                duration: '1 year',
                period: '1 year subscription',
                savings: '₱2,412',
                description: 'You save ₱2,412 compared to SRP!'
            }
        },
        yearly: {
            standard: {
                price: '₱497',
                srp: '₱17,040',
                total: '₱11,928',
                discounted: '₱11,928',
                discount: '30%',
                duration: '2 years',
                period: '2 year subscription',
                savings: '₱5,112',
                description: 'You save ₱5,112 compared to SRP!'
            },
            deluxe: {
                price: '₱875',
                srp: '₱30,000',
                total: '₱21,000',
                discounted: '₱21,000',
                discount: '30%',
                duration: '2 years',
                period: '2 year subscription',
                savings: '₱9,000',
                description: 'You save ₱9,000 compared to SRP!'
            },
            business: {
                price: '₱1,407',
                srp: '₱48,240',
                total: '₱33,768',
                discounted: '₱33,768',
                discount: '30%',
                duration: '2 years',
                period: '2 year subscription',
                savings: '₱14,472',
                description: 'You save ₱14,472 compared to SRP!'
            }
        }
    };    // Plan toggle functionality
    const planToggle = document.getElementById('planToggle');
    const monthlyTab = planToggle.querySelector('[data-plan="monthly"]');
    const yearlyTab = planToggle.querySelector('[data-plan="yearly"]');

    function updatePricing(planType) {
        const packages = document.querySelectorAll('.package-card[data-package]');

        packages.forEach(packageCard => {
            const packageName = packageCard.getAttribute('data-package');
            const data = pricingData[planType][packageName];

            if (data) {
                // Update monthly price
                const priceElement = packageCard.querySelector('.price-amount');
                if (priceElement) {
                    priceElement.textContent = data.price;
                }

                // Update SRP (original price)
                const srpElement = packageCard.querySelector('.srp-amount');
                if (srpElement) {
                    srpElement.textContent = data.srp;
                }

                // Update discounted amount
                const discountedElement = packageCard.querySelector('.discounted-amount');
                if (discountedElement) {
                    discountedElement.textContent = data.discounted;
                }

                // Update discount percentage
                const discountElement = packageCard.querySelector('.discount-text');
                if (discountElement) {
                    discountElement.textContent = `SAVE ${data.discount}`;
                }

                // Update subscription period
                const periodElement = packageCard.querySelector('.period-text');
                if (periodElement) {
                    periodElement.textContent = data.period;
                }

                // Update total cost
                const totalElement = packageCard.querySelector('.total-amount');
                if (totalElement) {
                    totalElement.textContent = data.total;
                }

                // Update savings description
                const descriptionElement = packageCard.querySelector('.subscription-text');
                if (descriptionElement) {
                    descriptionElement.textContent = data.description;
                }
            }
        });
    }    function switchToMonthly() {
        planToggle.classList.remove('yearly');
        monthlyTab.classList.add('active');
        yearlyTab.classList.remove('active');
        updatePricing('monthly');
    }

    function switchToYearly() {
        planToggle.classList.add('yearly');
        yearlyTab.classList.add('active');
        monthlyTab.classList.remove('active');
        updatePricing('yearly');
    }

    monthlyTab.addEventListener('click', function(e) {
        e.preventDefault();
        if (!this.classList.contains('active')) {
            switchToMonthly();
        }
    });

    yearlyTab.addEventListener('click', function(e) {
        e.preventDefault();
        if (!this.classList.contains('active')) {
            switchToYearly();
        }
    });

    // Initialize with yearly pricing (default)
    updatePricing('yearly');
});
</script>
@endsection
