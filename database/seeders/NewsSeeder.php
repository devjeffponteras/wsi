<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\ArticleCategory;
use App\Models\User;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Get first user and categories
        $user = User::first();
        $categories = ArticleCategory::all();

        if (!$user) {
            $this->command->error('No users found. Please create a user first.');
            return;
        }

        $newsArticles = [
            [
                'name' => 'WebFocus Launches Enhanced Hosting Plans with FocusCare+',
                'slug' => 'webfocus-launches-enhanced-hosting-plans-focuscare',
                'contents' => '<p>WebFocus Solutions, Inc. is excited to announce the launch of our enhanced hosting plans, all backed by our premium FocusCare+ support service. These new plans offer unparalleled performance, security, and reliability for businesses of all sizes.</p>

<h3>What\'s New</h3>
<ul>
<li>Enhanced cloud hosting with 99.9% uptime guarantee</li>
<li>Advanced security features including DDoS protection</li>
<li>24/7 FocusCare+ premium support</li>
<li>Scalable resources for growing businesses</li>
<li>Free SSL certificates and daily backups</li>
</ul>

<p>Our new hosting infrastructure is designed to meet the demanding needs of modern businesses while providing the exceptional support that WebFocus is known for.</p>',
                'teaser' => 'WebFocus Solutions introduces new cloud, shared, dedicated, and bare-metal hosting plans, all backed by our premium FocusCare+ support for seamless performance and reliability.',
                'date' => Carbon::now(),
                'status' => 'Published',
                'is_featured' => true,
                'category_id' => $categories->where('name', 'Announcements')->first()?->id,
                'user_id' => $user->id,
                'meta_title' => 'New WebFocus Hosting Plans with FocusCare+ Support',
                'meta_description' => 'Discover WebFocus\'s enhanced hosting plans featuring premium FocusCare+ support, advanced security, and guaranteed uptime.',
                'meta_keyword' => 'hosting, webfocus, focuscare, cloud hosting, premium support'
            ],
            [
                'name' => 'FileHold 2.0: Revolutionizing Document Management',
                'slug' => 'filehold-2-revolutionizing-document-management',
                'contents' => '<p>We\'re thrilled to announce the release of FileHold 2.0, our most advanced document management system yet. This major update brings cutting-edge features and improvements that will transform how your organization handles documents.</p>

<h3>Key Features in FileHold 2.0</h3>
<ul>
<li>AI-powered document categorization</li>
<li>Advanced workflow automation</li>
<li>Enhanced security with blockchain verification</li>
<li>Mobile-first responsive design</li>
<li>Integration with popular cloud services</li>
<li>Real-time collaboration tools</li>
</ul>

<p>FileHold 2.0 represents a significant leap forward in document management technology, offering unprecedented efficiency and security for businesses worldwide.</p>',
                'teaser' => 'The latest FileHold update brings advanced workflow automation, AI-powered features, and enhanced security to revolutionize your document management experience.',
                'date' => Carbon::now()->subDays(1),
                'status' => 'Published',
                'is_featured' => false,
                'category_id' => $categories->where('name', 'General')->first()?->id,
                'user_id' => $user->id,
                'meta_title' => 'FileHold 2.0 - Advanced Document Management System',
                'meta_description' => 'Explore FileHold 2.0\'s revolutionary features including AI-powered categorization and advanced workflow automation.',
                'meta_keyword' => 'filehold, document management, AI, workflow, automation'
            ],
            [
                'name' => 'Cybersecurity Best Practices for 2025',
                'slug' => 'cybersecurity-best-practices-2025',
                'contents' => '<p>As cyber threats continue to evolve, it\'s crucial for businesses to stay ahead with the latest cybersecurity best practices. Our security experts have compiled essential guidelines for protecting your digital assets in 2025.</p>

<h3>Essential Security Measures</h3>
<ul>
<li>Multi-factor authentication (MFA) for all accounts</li>
<li>Regular security audits and penetration testing</li>
<li>Employee cybersecurity training programs</li>
<li>Zero-trust network architecture</li>
<li>Automated threat detection and response</li>
<li>Regular backup and disaster recovery testing</li>
</ul>

<p>Implementing these practices will significantly strengthen your organization\'s security posture and protect against emerging threats.</p>',
                'teaser' => 'Stay protected with our comprehensive guide to cybersecurity best practices for 2025, featuring expert recommendations and actionable security measures.',
                'date' => Carbon::now()->subDays(2),
                'status' => 'Published',
                'is_featured' => false,
                'category_id' => $categories->where('name', 'Informative')->first()?->id,
                'user_id' => $user->id,
                'meta_title' => 'Cybersecurity Best Practices Guide 2025',
                'meta_description' => 'Learn essential cybersecurity practices to protect your business in 2025 with expert recommendations and actionable tips.',
                'meta_keyword' => 'cybersecurity, security practices, 2025, data protection, threat prevention'
            ],
            [
                'name' => 'WebFocus Achieves SOC 2 Type II Certification',
                'slug' => 'webfocus-achieves-soc-2-type-ii-certification',
                'contents' => '<p>We are proud to announce that WebFocus Solutions has successfully achieved SOC 2 Type II certification, demonstrating our commitment to maintaining the highest standards of security, availability, and confidentiality.</p>

<h3>What This Means for Our Clients</h3>
<ul>
<li>Verified security controls and procedures</li>
<li>Enhanced data protection standards</li>
<li>Compliance with industry regulations</li>
<li>Continuous monitoring and improvement</li>
<li>Third-party validated security measures</li>
</ul>

<p>This certification reinforces our dedication to providing secure, reliable services that our clients can trust with their most important data and applications.</p>',
                'teaser' => 'WebFocus Solutions achieves SOC 2 Type II certification, validating our commitment to security excellence and data protection standards.',
                'date' => Carbon::now()->subDays(3),
                'status' => 'Published',
                'is_featured' => false,
                'category_id' => $categories->where('name', 'Announcements')->first()?->id,
                'user_id' => $user->id,
                'meta_title' => 'WebFocus SOC 2 Type II Certification Achievement',
                'meta_description' => 'WebFocus Solutions achieves SOC 2 Type II certification, demonstrating our commitment to security and data protection.',
                'meta_keyword' => 'SOC 2, certification, security, compliance, data protection'
            ],
            [
                'name' => 'New Seattle Office Opens to Serve West Coast Clients',
                'slug' => 'new-seattle-office-opens-west-coast-clients',
                'contents' => '<p>WebFocus Solutions is expanding its reach with the opening of our new Seattle office, strategically located to better serve our growing West Coast client base. This expansion reflects our commitment to providing localized support and services.</p>

<h3>Seattle Office Highlights</h3>
<ul>
<li>Dedicated customer support team</li>
<li>Local technical consulting services</li>
<li>Faster response times for West Coast clients</li>
<li>Regional partnership opportunities</li>
<li>Community engagement initiatives</li>
</ul>

<p>Our Seattle team is ready to provide the same exceptional service and support that WebFocus clients have come to expect, now with the added benefit of local presence.</p>',
                'teaser' => 'WebFocus Solutions opens a new Seattle office to provide enhanced support and services for our expanding West Coast client base.',
                'date' => Carbon::now()->subDays(5),
                'status' => 'Published',
                'is_featured' => false,
                'category_id' => $categories->where('name', 'Events')->first()?->id,
                'user_id' => $user->id,
                'meta_title' => 'WebFocus Opens New Seattle Office',
                'meta_description' => 'WebFocus Solutions expands with a new Seattle office to better serve West Coast clients with local support and services.',
                'meta_keyword' => 'seattle office, expansion, west coast, local support, webfocus'
            ]
        ];

        foreach ($newsArticles as $article) {
            News::create($article);
        }

        $this->command->info('News seeder completed successfully!');
        $this->command->info('Created ' . count($newsArticles) . ' news articles.');
    }
}
