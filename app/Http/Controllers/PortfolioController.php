<?php

namespace App\Http\Controllers;

use App\Models\{Project, Skill, Service, Blog, Testimonial, Client, SiteSetting};
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::active()->orderBy('sort_order')->orderBy('is_featured', 'desc')->get();
        $skills = Skill::active()->get();
        $services = Service::active()->get();
        $blogs = Blog::published()->limit(3)->get();
        $testimonials = Testimonial::active()->get();
        $clients = Client::active()->get();
        $settings = SiteSetting::pluck('value', 'key');

        return view('welcome', compact('projects', 'skills', 'services', 'blogs', 'testimonials', 'clients', 'settings'));
    }
}
