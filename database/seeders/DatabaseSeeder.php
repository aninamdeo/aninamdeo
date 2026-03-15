<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name'     => 'Aniket Namdeo',
            'email'    => 'admin@aniketnamdeo.com',
            'password' => Hash::make('password'),
        ]);

        // ── Site Settings ──────────────────────────────────────────────
        $settings = [
            ['key' => 'site_name',           'value' => 'Aniket Namdeo',                  'group' => 'general'],
            ['key' => 'tagline',             'value' => 'AI Developer & IT Manager',       'group' => 'general'],
            ['key' => 'about_text',          'value' => 'I\'m Aniket Namdeo, an AI Developer, IT Manager & Full Stack Developer with 8+ years of experience building scalable software systems and leading cross-functional teams. I have delivered 50+ projects for clients across India, USA, Malaysia, and Singapore.', 'group' => 'general'],
            ['key' => 'email',               'value' => 'aniket@aniketnamdeo.com',         'group' => 'contact'],
            ['key' => 'phone',               'value' => '+91 98765 43210',                 'group' => 'contact'],
            ['key' => 'location',            'value' => 'Nagpur, Maharashtra, India',      'group' => 'contact'],
            ['key' => 'github_url',          'value' => 'https://github.com/aniketnamdeo','group' => 'social'],
            ['key' => 'linkedin_url',        'value' => 'https://linkedin.com/in/aniketnamdeo', 'group' => 'social'],
            ['key' => 'twitter_url',         'value' => 'https://twitter.com/aniketnamdeo','group' => 'social'],
            ['key' => 'years_experience',    'value' => '8',                               'group' => 'stats'],
            ['key' => 'projects_delivered',  'value' => '50',                              'group' => 'stats'],
            ['key' => 'team_size',           'value' => '15',                              'group' => 'stats'],
            ['key' => 'happy_clients',       'value' => '40',                              'group' => 'stats'],
        ];
        foreach ($settings as $s) {
            SiteSetting::create($s);
        }

        // ── Projects ───────────────────────────────────────────────────
        $projects = [
            [
                'title'          => 'AI-Powered CRM Platform',
                'slug'           => 'ai-crm-platform',
                'description'    => 'Enterprise CRM with AI-driven lead scoring, sentiment analysis, and automated follow-ups.',
                'long_description' => 'Built a comprehensive CRM platform integrated with AI capabilities including lead scoring using ML models, customer sentiment analysis from emails, automated follow-up suggestions, and predictive sales forecasting. The platform serves 200+ sales reps and handles 10k+ daily interactions.',
                'technology'     => 'Laravel, React.js, Python, OpenAI API, MySQL',
                'client_country' => 'USA',
                'category'       => 'ai',
                'is_featured'    => true,
                'is_active'      => true,
                'sort_order'     => 1,
            ],
            [
                'title'          => 'Multi-Vendor E-Commerce Suite',
                'slug'           => 'multi-vendor-ecommerce',
                'description'    => 'Scalable multi-vendor marketplace with real-time inventory, payment gateway, and vendor analytics.',
                'long_description' => 'Developed a full-featured multi-vendor e-commerce platform supporting 500+ vendors, real-time inventory sync, Stripe & Razorpay payment integration, and a comprehensive vendor analytics dashboard.',
                'technology'     => 'Laravel, Vue.js, Redis, MySQL, Stripe',
                'client_country' => 'Malaysia',
                'category'       => 'web',
                'is_featured'    => true,
                'is_active'      => true,
                'sort_order'     => 2,
            ],
            [
                'title'          => 'Hospital Management System',
                'slug'           => 'hospital-management-system',
                'description'    => 'Complete HMS with OPD, IPD, pharmacy, lab, billing, and doctor scheduling modules.',
                'long_description' => 'End-to-end hospital management system covering patient registration, appointment scheduling, OPD/IPD management, pharmacy inventory, pathology lab integration, insurance billing, and real-time reporting dashboards for hospital administrators.',
                'technology'     => 'Laravel, jQuery, MySQL, AJAX',
                'client_country' => 'India',
                'category'       => 'enterprise',
                'is_featured'    => true,
                'is_active'      => true,
                'sort_order'     => 3,
            ],
            [
                'title'          => 'AI Document Summariser',
                'slug'           => 'ai-document-summariser',
                'description'    => 'SaaS tool that uses GPT-4 to summarise legal documents, contracts, and reports in seconds.',
                'long_description' => 'A SaaS application allowing law firms and enterprises to upload PDFs and get intelligent AI-generated summaries, key clause extraction, risk flags, and comparison between document versions. Integrated with OpenAI GPT-4 and supports 15+ languages.',
                'technology'     => 'Next.js, OpenAI GPT-4, Python FastAPI, PostgreSQL',
                'client_country' => 'Singapore',
                'category'       => 'ai',
                'is_featured'    => true,
                'is_active'      => true,
                'sort_order'     => 4,
            ],
            [
                'title'          => 'Real Estate Portal',
                'slug'           => 'real-estate-portal',
                'description'    => 'Property listing portal with AI-based property recommendations, virtual tours, and mortgage calculator.',
                'long_description' => 'A full-stack real estate platform featuring AI-powered property recommendations based on user preferences, integrated Google Maps, 360° virtual tours, EMI/mortgage calculator, and an agent management dashboard.',
                'technology'     => 'Laravel, React.js, Google Maps API, MySQL',
                'client_country' => 'India',
                'category'       => 'web',
                'is_featured'    => false,
                'is_active'      => true,
                'sort_order'     => 5,
            ],
            [
                'title'          => 'Fleet Management App',
                'slug'           => 'fleet-management-app',
                'description'    => 'Mobile-first fleet tracking app with GPS, driver scoring, fuel management, and maintenance alerts.',
                'long_description' => 'Developed a cross-platform mobile application for a logistics company to track 300+ vehicles in real-time using GPS, monitor driver behaviour scoring, manage fuel logs, schedule preventive maintenance, and generate operational reports.',
                'technology'     => 'React Native, Laravel, Google Maps, MySQL',
                'client_country' => 'Malaysia',
                'category'       => 'mobile',
                'is_featured'    => false,
                'is_active'      => true,
                'sort_order'     => 6,
            ],
        ];
        foreach ($projects as $p) {
            Project::create($p);
        }

        // ── Skills ─────────────────────────────────────────────────────
        $skills = [
            ['name' => 'Laravel / PHP',   'percentage' => 95, 'category' => 'backend',  'sort_order' => 1, 'is_active' => true],
            ['name' => 'React.js',        'percentage' => 88, 'category' => 'frontend', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'Next.js',         'percentage' => 82, 'category' => 'frontend', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'AI / OpenAI API', 'percentage' => 85, 'category' => 'ai',       'sort_order' => 4, 'is_active' => true],
            ['name' => 'MySQL / PostgreSQL','percentage' => 90,'category' => 'backend', 'sort_order' => 5, 'is_active' => true],
            ['name' => 'Python',          'percentage' => 75, 'category' => 'backend',  'sort_order' => 6, 'is_active' => true],
            ['name' => 'Vue.js',          'percentage' => 78, 'category' => 'frontend', 'sort_order' => 7, 'is_active' => true],
            ['name' => 'React Native',    'percentage' => 72, 'category' => 'mobile',   'sort_order' => 8, 'is_active' => true],
            ['name' => 'Docker / DevOps', 'percentage' => 70, 'category' => 'devops',   'sort_order' => 9, 'is_active' => true],
            ['name' => 'Team Leadership', 'percentage' => 92, 'category' => 'soft',     'sort_order' => 10,'is_active' => true],
        ];
        foreach ($skills as $s) {
            Skill::create($s);
        }

        // ── Services ───────────────────────────────────────────────────
        $services = [
            [
                'title'       => 'AI Solutions Development',
                'description' => 'Custom AI integrations including chatbots, document processing, recommendation engines, and predictive analytics using GPT-4, LangChain, and custom ML models.',
                'icon'        => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                'sort_order'  => 1,
                'is_active'   => true,
            ],
            [
                'title'       => 'Full Stack Web Development',
                'description' => 'End-to-end web application development using Laravel, React.js, Next.js and Vue.js — from MVP to enterprise-grade scalable systems.',
                'icon'        => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'sort_order'  => 2,
                'is_active'   => true,
            ],
            [
                'title'       => 'Enterprise Software',
                'description' => 'Custom ERP, CRM, HMS, and business process automation solutions tailored to your industry. Built for reliability, scalability, and long-term maintainability.',
                'icon'        => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                'sort_order'  => 3,
                'is_active'   => true,
            ],
            [
                'title'       => 'IT Team Management',
                'description' => 'Fractional CTO and IT Manager services — team hiring, sprint planning, code reviews, architecture decisions, and stakeholder communication for growing tech teams.',
                'icon'        => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
                'sort_order'  => 4,
                'is_active'   => true,
            ],
            [
                'title'       => 'Startup MVP Development',
                'description' => 'Rapid MVP development for startups — idea validation, architecture planning, and delivery of a functional product in weeks, not months.',
                'icon'        => 'M13 10V3L4 14h7v7l9-11h-7z',
                'sort_order'  => 5,
                'is_active'   => true,
            ],
            [
                'title'       => 'API Development & Integration',
                'description' => 'RESTful and GraphQL API design, third-party API integrations (payment gateways, CRMs, ERPs), and microservices architecture.',
                'icon'        => 'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                'sort_order'  => 6,
                'is_active'   => true,
            ],
        ];
        foreach ($services as $s) {
            Service::create($s);
        }

        // ── Testimonials ───────────────────────────────────────────────
        $testimonials = [
            [
                'name'       => 'James Carter',
                'position'   => 'CEO, TechVentures USA',
                'country'    => 'USA',
                'message'    => 'Aniket delivered our AI-powered CRM platform on time and exceeded our expectations. His depth in both AI integration and enterprise software is rare. Highly recommend for any complex tech project.',
                'rating'     => 5,
                'is_active'  => true,
                'sort_order' => 1,
            ],
            [
                'name'       => 'Priya Sharma',
                'position'   => 'Founder, ShopBridge',
                'country'    => 'India',
                'message'    => 'Working with Aniket was a fantastic experience. He built our multi-vendor platform from scratch within 3 months, handled our scale-up seamlessly, and his code quality is top-notch.',
                'rating'     => 5,
                'is_active'  => true,
                'sort_order' => 2,
            ],
            [
                'name'       => 'Ahmad Farouk',
                'position'   => 'CTO, LogiTrack Malaysia',
                'country'    => 'Malaysia',
                'message'    => 'The fleet management app Aniket built for us tracks 300+ vehicles flawlessly. His attention to real-world business problems and clean architecture made the project a great success.',
                'rating'     => 5,
                'is_active'  => true,
                'sort_order' => 3,
            ],
            [
                'name'       => 'Rachel Tan',
                'position'   => 'Legal Director, LexCorp Singapore',
                'country'    => 'Singapore',
                'message'    => 'Our AI Document Summariser has saved our legal team 20+ hours per week. Aniket understood our domain-specific needs perfectly and delivered a polished, reliable product.',
                'rating'     => 5,
                'is_active'  => true,
                'sort_order' => 4,
            ],
        ];
        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }

        // ── Clients ────────────────────────────────────────────────────
        $clients = [
            ['name' => 'TechVentures',  'logo' => null, 'country' => 'USA',       'is_active' => true, 'sort_order' => 1],
            ['name' => 'ShopBridge',    'logo' => null, 'country' => 'India',     'is_active' => true, 'sort_order' => 2],
            ['name' => 'LogiTrack',     'logo' => null, 'country' => 'Malaysia',  'is_active' => true, 'sort_order' => 3],
            ['name' => 'LexCorp',       'logo' => null, 'country' => 'Singapore', 'is_active' => true, 'sort_order' => 4],
            ['name' => 'MediCare HMS',  'logo' => null, 'country' => 'India',     'is_active' => true, 'sort_order' => 5],
            ['name' => 'PropNest',      'logo' => null, 'country' => 'India',     'is_active' => true, 'sort_order' => 6],
        ];
        foreach ($clients as $c) {
            Client::create($c);
        }

        // ── Blog Posts ─────────────────────────────────────────────────
        $blogs = [
            [
                'title'        => 'How I Built an AI-Powered CRM with Laravel and GPT-4',
                'slug'         => 'ai-crm-laravel-gpt4',
                'excerpt'      => 'A behind-the-scenes look at architecting an enterprise CRM that uses GPT-4 for lead scoring, sentiment analysis, and automated follow-ups.',
                'content'      => '<p>Building an AI-powered CRM was one of the most challenging and rewarding projects of my career. In this post, I\'ll walk you through the architecture decisions, the AI integration strategy, and the key lessons learned.</p><h2>Architecture Overview</h2><p>The system is built on Laravel as the backbone with a React.js frontend. We use a Python FastAPI microservice to handle all AI operations, keeping the AI logic decoupled from the main application.</p><h2>AI Integration with GPT-4</h2><p>We use OpenAI\'s GPT-4 API for three core features: lead scoring based on email content, customer sentiment analysis, and generating follow-up email suggestions for sales reps.</p><h2>Key Lessons Learned</h2><p>1. Always add a human review step for AI-generated content. 2. Cache AI responses where possible to reduce API costs. 3. Build robust fallbacks for when the AI API is unavailable.</p>',
                'category'     => 'ai',
                'tags'         => json_encode(['AI', 'Laravel', 'GPT-4', 'CRM']),
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'views'        => 342,
            ],
            [
                'title'        => 'Laravel Architecture Patterns for Scalable Enterprise Apps',
                'slug'         => 'laravel-architecture-patterns-enterprise',
                'excerpt'      => 'After 8 years and 50+ projects, here are the Laravel architecture patterns I use in every enterprise application.',
                'content'      => '<p>Laravel is incredibly flexible, but that flexibility can lead to messy codebases if you don\'t establish clear patterns early. Here are the patterns I\'ve settled on after years of enterprise development.</p><h2>Service Layer Pattern</h2><p>Controllers should be thin. Business logic belongs in dedicated Service classes. This makes your code testable and reusable.</p><h2>Repository Pattern</h2><p>Abstracting database queries into Repository classes gives you flexibility to swap data sources and keeps controllers clean.</p><h2>Action Classes</h2><p>For complex operations, I use single-responsibility Action classes. Each action does one thing and does it well.</p>',
                'category'     => 'web',
                'tags'         => json_encode(['Laravel', 'PHP', 'Architecture', 'Enterprise']),
                'is_published' => true,
                'published_at' => now()->subDays(25),
                'views'        => 215,
            ],
            [
                'title'        => 'Managing a Remote Dev Team of 15: What Actually Works',
                'slug'         => 'managing-remote-dev-team',
                'excerpt'      => 'Real-world strategies for managing a distributed software development team — from sprint planning to code reviews to keeping morale high.',
                'content'      => '<p>Managing a remote team of 15 developers across different time zones is both challenging and incredibly rewarding. Here\'s what I\'ve learned after 3+ years of doing it.</p><h2>Communication is Everything</h2><p>Daily async standups, weekly video syncs, and clear written documentation are non-negotiable. Never assume — always document.</p><h2>Code Review Culture</h2><p>Establish a culture where code reviews are learning opportunities, not criticism sessions. Positive reinforcement goes a long way.</p><h2>Trust Over Micromanagement</h2><p>Set clear goals, provide the right tools, and trust your team. Micromanagement kills creativity and morale in remote teams.</p>',
                'category'     => 'management',
                'tags'         => json_encode(['Team Management', 'Remote Work', 'Leadership']),
                'is_published' => true,
                'published_at' => now()->subDays(40),
                'views'        => 189,
            ],
        ];
        foreach ($blogs as $b) {
            Blog::create($b);
        }
    }
}
