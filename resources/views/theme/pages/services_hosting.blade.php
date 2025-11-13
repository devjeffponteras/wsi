
@extends('theme.main')

@section('pagecss')
<link rel="stylesheet" href="{{ asset('theme/css/newstyle.css') }}" type="text/css" />
<style>

    .text-center.mb-12 h2 {
    margin: 0;
    line-height: 1.3;
    }

    .text-center.mb-12 h2 + h2 {
    margin-top: 0.5rem;
    }

    .text-center.mb-12 {
    margin-bottom: 2rem;
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
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(43, 86, 211, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
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

    .hosting-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
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
    .packages-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(300px, 1fr));
        gap: 2rem;
        margin: 0 auto;
        max-width: 1300px;
        justify-content: center;
        padding: 0 1rem;
    }
    .package-card {
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
    #package_price{
         margin-bottom: 25.8rem;
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

    /* SRP Highlighting Styles */
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

    @keyframes srpPulse {
        0%, 100% {
            box-shadow: 0 4px 12px rgba(248, 113, 113, 0.2);
        }
        50% {
            box-shadow: 0 6px 16px rgba(248, 113, 113, 0.4);
        }
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
