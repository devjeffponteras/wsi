-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2025 at 01:30 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teaser` text COLLATE utf8mb4_unicode_ci,
  `date` date NOT NULL,
  `status` enum('Published','Private') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Private',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `banner_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `meta_title` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `json` json DEFAULT NULL,
  `styles` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `slug`, `contents`, `teaser`, `date`, `status`, `is_featured`, `banner_image`, `thumbnail_image`, `category_id`, `user_id`, `meta_title`, `meta_description`, `meta_keyword`, `json`, `styles`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'WebFocus Launches Enhanced Hosting Plans with FocusCare+', 'webfocus-launches-enhanced-hosting-plans-focuscare', '<p>WebFocus Solutions, Inc. is excited to announce the launch of our enhanced hosting plans, all backed by our premium FocusCare+ support service. These new plans offer unparalleled performance, security, and reliability for businesses of all sizes.</p>\r\n\r\n<h3>What\'s New</h3>\r\n<ul>\r\n<li>Enhanced cloud hosting with 99.9% uptime guarantee</li>\r\n<li>Advanced security features including DDoS protection</li>\r\n<li>24/7 FocusCare+ premium support</li>\r\n<li>Scalable resources for growing businesses</li>\r\n<li>Free SSL certificates and daily backups</li>\r\n</ul>\r\n\r\n<p>Our new hosting infrastructure is designed to meet the demanding needs of modern businesses while providing the exceptional support that WebFocus is known for.</p>', 'WebFocus Solutions introduces new cloud, shared, dedicated, and bare-metal hosting plans, all backed by our premium FocusCare+ support for seamless performance and reliability.', '2025-10-27', 'Published', 1, 'http://127.0.0.1:8000/storage/news_image/sleepy-tired.gif', 'http://127.0.0.1:8000/storage/news_image/news_thumbnail/award.png', 2, 1, 'New WebFocus Hosting Plans with FocusCare+ Support', 'Discover WebFocus\'s enhanced hosting plans featuring premium FocusCare+ support, advanced security, and guaranteed uptime.', 'hosting, webfocus, focuscare, cloud hosting, premium support', NULL, NULL, '2025-10-27 05:53:06', '2025-10-28 06:17:24', NULL),
(2, 'FileHold 2.0: Revolutionizing Document Management', 'filehold-2-revolutionizing-document-management', '<p>We\'re thrilled to announce the release of FileHold 2.0, our most advanced document management system yet. This major update brings cutting-edge features and improvements that will transform how your organization handles documentsa.</p>\r\n\r\n<h3>Key Features in FileHold 2.0</h3>\r\n<ul>\r\n<li>AI-powered document categorization</li>\r\n<li>Advanced workflow automation</li>\r\n<li>Enhanced security with blockchain verification</li>\r\n<li>Mobile-first responsive design</li>\r\n<li>Integration with popular cloud services</li>\r\n<li>Real-time collaboration tools</li>\r\n</ul>\r\n\r\n<p>FileHold 2.0 represents a significant leap forward in document management technology, offering unprecedented efficiency and security for businesses worldwide.</p>', 'The latest FileHold update brings advanced workflow automation, AI-powered features, and enhanced security to revolutionize your document management experience.', '2025-10-26', 'Published', 0, 'http://127.0.0.1:8000/storage/news_image/award2.jpg', 'http://127.0.0.1:8000/storage/news_image/news_thumbnail/customer1.jpg', 1, 1, 'FileHold 2.0 - Advanced Document Management System', 'Explore FileHold 2.0\'s revolutionary features including AI-powered categorization and advanced workflow automation.', 'filehold, document management, AI, workflow, automation', NULL, NULL, '2025-10-27 05:53:07', '2025-10-28 06:27:43', NULL),
(3, 'Cybersecurity Best Practices for 2025', 'cybersecurity-best-practices-2025', '<p>As cyber threats continue to evolve, it\'s crucial for businesses to stay ahead with the latest cybersecurity best practices. Our security experts have compiled essential guidelines for protecting your digital assets in 2025.</p>\n\n<h3>Essential Security Measures</h3>\n<ul>\n<li>Multi-factor authentication (MFA) for all accounts</li>\n<li>Regular security audits and penetration testing</li>\n<li>Employee cybersecurity training programs</li>\n<li>Zero-trust network architecture</li>\n<li>Automated threat detection and response</li>\n<li>Regular backup and disaster recovery testing</li>\n</ul>\n\n<p>Implementing these practices will significantly strengthen your organization\'s security posture and protect against emerging threats.</p>', 'Stay protected with our comprehensive guide to cybersecurity best practices for 2025, featuring expert recommendations and actionable security measures.', '2025-10-25', 'Published', 0, NULL, NULL, 4, 1, 'Cybersecurity Best Practices Guide 2025', 'Learn essential cybersecurity practices to protect your business in 2025 with expert recommendations and actionable tips.', 'cybersecurity, security practices, 2025, data protection, threat prevention', NULL, NULL, '2025-10-27 05:53:07', '2025-10-27 05:53:07', NULL),
(4, 'WebFocus Achieves SOC 2 Type II Certification', 'webfocus-achieves-soc-2-type-ii-certification', 'Hi', 'WebFocus Solutions achieves SOC 2 Type II certification, validating our commitment to security excellence and data protection standards.', '2025-10-24', 'Published', 0, 'http://127.0.0.1:8000/storage/news_image/ecommerce.jpg', 'http://127.0.0.1:8000/storage/news_image/news_thumbnail/cv111.jpg', 2, 1, 'WebFocus SOC 2 Type II Certification Achievement', 'WebFocus Solutions achieves SOC 2 Type II certification, demonstrating our commitment to security and data protection.', 'SOC 2, certification, security, compliance, data protection', NULL, NULL, '2025-10-27 05:53:07', '2025-10-28 07:34:25', NULL),
(5, '24 Years Strong: WebFocus Solutions Inc. Honors a Legacy of Innovation and Teamworks', '24-years-strong-webfocus-solutions-inc-honors-a-legacy-of-innovation-and-teamworks', '<p>For more than two decades, WebFocus Solutions Inc. has been at the forefront of delivering cutting-edge IT solutions to businesses in the Philippines and beyond. This 2025 marks the company’s 24th year in the industry, a milestone that reflects not only longevity but also a steadfast commitment to innovation, reliability, and customer success.</p>\r\n\r\n<h3>A Journey of Growth and Transformation</h3>\r\n<p>Founded in 2001, WebFocus Solutions Inc. started with a vision: to help organizations thrive in the fast-evolving digital landscape. What began as a web development company has grown into a full-service IT solutions provider, offering services such as:</p>\r\n<ul>\r\n<li>Web Development & Design – creating fast, responsive, and SEO-ready websites.</li>\r\n<li>Domain & Hosting Services – delivering secure, stable, and scalable hosting trusted by businesses for years.</li>\r\n<li>Document Management Systems (DMS) – providing smarter, paperless solutions for modern workplaces.</li>\r\n<li>Cybersecurity Solutions – ensuring client data is protected against evolving threats</li>\r\n</ul>\r\n\r\n<p>Through these services, WebFocus has empowered thousands of businesses—ranging from SMEs to large enterprises—to streamline operations, strengthen their digital presence, and secure their growth.</p>\r\n\r\n<h3>Built on Trust and Expertise</h3>\r\n\r\n<p>What makes WebFocus stand out is not just its technical expertise but also the trust it has built with clients over the years. The company’s “client-first” approach ensures that every solution is tailored to meet the unique needs of each business. This dedication has led to long-standing partnerships and a reputation for reliability in the IT industry.</p>\r\n\r\n<p>With a talented team of professionals, WebFocus continuously evolves its services to adapt to the demands of the digital era. The company’s 24 years serve as proof of its resilience and unwavering commitment to excellence.</p>\r\n\r\n<h3>A Celebration of Partnership</h3>\r\n<p>The 24th anniversary is not just a celebration of WebFocus’ success but also of the strong partnerships it has built with clients, employees, and industry peers. To mark this special milestone, the WebFocus team gathered for a buffet lunch at NIU by Vikings last September 5, celebrating 24 years of teamwork, innovation, and shared achievements.</p>\r\n\r\n<p> It was a moment to reflect on the company’s journey, honor the people who have contributed to its growth, and look ahead to an even brighter future. The celebration embodied the same values that have guided WebFocus since 2001—collaboration, excellence, and dedication to client success.</p>', 'WebFocus Solutions opens a new Seattle office to provide enhanced support and services for our expanding West Coast client base.', '2025-10-22', 'Published', 1, 'http://127.0.0.1:8000/storage/news_image/business.jpg', 'http://127.0.0.1:8000/storage/news_image/news_thumbnail/Picture2.jpg', 3, 1, 'WebFocus Opens New Seattle Office', 'WebFocus Solutions expands with a new Seattle office to better serve West Coast clients with local support and services.', 'west coast, webfocus', NULL, NULL, '2025-10-27 05:53:07', '2025-10-29 01:06:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_status_date_index` (`status`,`date`),
  ADD KEY `news_category_id_index` (`category_id`),
  ADD KEY `news_user_id_index` (`user_id`),
  ADD KEY `news_is_featured_index` (`is_featured`),
  ADD KEY `news_slug_index` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
