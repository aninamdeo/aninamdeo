<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Project, Blog, Contact, Testimonial, Skill, Service, SiteSetting};
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects'  => Project::count(),
            'blogs'     => Blog::where('is_published', true)->count(),
            'leads'     => Contact::count(),
            'new_leads' => Contact::where('status', 'new')->count(),
        ];

        $monthlyLeads = Contact::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $leadsChart = [];
        for ($i = 1; $i <= 12; $i++) {
            $leadsChart[] = $monthlyLeads[$i] ?? 0;
        }

        $recentContacts = Contact::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'leadsChart', 'recentContacts'));
    }
}
