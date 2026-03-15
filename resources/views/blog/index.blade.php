@extends('layouts.app')

@section('title', 'Blog — Aniket Namdeo | AI Development Insights')
@section('meta_description', 'Read Aniket Namdeo\'s articles on AI development, Laravel, React, system architecture, and tech leadership.')

@section('content')

{{-- NAVBAR --}}
<nav class="fixed top-0 left-0 right-0 z-50 bg-slate-900/95 backdrop-blur-md shadow-lg shadow-black/20">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-xl">
            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-sm font-black">AN</span>
            <span class="gradient-text">Aniket Namdeo</span>
        </a>
        <div class="hidden md:flex items-center gap-8">
            <a href="{{ route('home') }}"          class="text-sm text-slate-400 hover:text-white transition-colors">Home</a>
            <a href="{{ route('home') }}#about"    class="text-sm text-slate-400 hover:text-white transition-colors">About</a>
            <a href="{{ route('home') }}#skills"   class="text-sm text-slate-400 hover:text-white transition-colors">Skills</a>
            <a href="{{ route('home') }}#projects" class="text-sm text-slate-400 hover:text-white transition-colors">Projects</a>
            <a href="{{ route('home') }}#services" class="text-sm text-slate-400 hover:text-white transition-colors">Services</a>
            <a href="{{ route('blog.index') }}"    class="text-sm text-white font-semibold transition-colors">Blog</a>
            <a href="{{ route('home') }}#contact"  class="text-sm text-slate-400 hover:text-white transition-colors">Contact</a>
        </div>
        <a href="{{ route('home') }}#contact" class="hidden md:flex px-5 py-2 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm font-medium hover:from-indigo-500 hover:to-purple-500 transition-all shadow-lg shadow-indigo-500/25 hover:scale-105">
            Hire Me
        </a>
    </div>
</nav>

{{-- HERO --}}
<section class="pt-32 pb-16 bg-slate-950">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-3">Blog & Articles</p>
        <h1 class="text-4xl lg:text-6xl font-black text-white">Insights & <span class="gradient-text">Ideas</span></h1>
        <p class="mt-4 text-slate-400 text-lg max-w-2xl mx-auto">Thoughts on AI development, software architecture, team leadership, and building scalable systems.</p>
    </div>
</section>

{{-- BLOG GRID --}}
<section class="py-16 bg-slate-950">
    <div class="max-w-7xl mx-auto px-6">

        @if($blogs->isEmpty())
            <div class="text-center py-24">
                <div class="text-7xl mb-4">📝</div>
                <h3 class="text-xl font-bold text-white mb-2">No posts yet</h3>
                <p class="text-slate-400 mb-6">Check back soon for articles and insights.</p>
                <a href="{{ route('home') }}" class="inline-flex px-6 py-3 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold text-sm hover:scale-105 transition-transform">Back to Home</a>
            </div>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($blogs as $blog)
                    <article class="group glass rounded-2xl border border-slate-700/50 hover:border-indigo-500/50 overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-500/10 flex flex-col">
                        @if($blog->image)
                            <div class="aspect-video overflow-hidden">
                                <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                        @else
                            <div class="aspect-video bg-gradient-to-br from-indigo-900/50 via-purple-900/50 to-slate-900 flex items-center justify-center">
                                <span class="text-5xl opacity-30">✍️</span>
                            </div>
                        @endif

                        <div class="p-6 flex flex-col flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                @if($blog->category)
                                    <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-indigo-600/20 border border-indigo-500/30 text-indigo-400">{{ $blog->category }}</span>
                                @endif
                                <span class="text-xs text-slate-500">{{ $blog->reading_time }}</span>
                            </div>

                            <h2 class="text-lg font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors line-clamp-2 flex-1">
                                <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                            </h2>

                            @if($blog->excerpt)
                                <p class="text-slate-400 text-sm leading-relaxed line-clamp-3 mb-4">{{ $blog->excerpt }}</p>
                            @endif

                            <div class="flex items-center justify-between pt-4 border-t border-slate-700/50 mt-auto">
                                <span class="text-xs text-slate-500">
                                    {{ optional($blog->published_at ?? $blog->created_at)->format('M d, Y') }}
                                </span>
                                <a href="{{ route('blog.show', $blog->slug) }}"
                                   class="flex items-center gap-1.5 text-sm text-indigo-400 hover:text-indigo-300 font-medium transition-colors group/link">
                                    Read More
                                    <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @if($blogs->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $blogs->links() }}
                </div>
            @endif
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="py-24 bg-slate-900">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h2 class="text-3xl lg:text-4xl font-black text-white mb-4">Have a project in mind?</h2>
        <p class="text-slate-400 mb-8">Let's talk about how I can help bring your ideas to life.</p>
        <a href="{{ route('home') }}#contact"
           class="inline-flex px-8 py-4 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold hover:from-indigo-500 hover:to-purple-500 transition-all duration-300 shadow-2xl shadow-indigo-500/30 hover:scale-105">
            Get In Touch
        </a>
    </div>
</section>

{{-- FOOTER --}}
<footer class="bg-slate-950 border-t border-slate-800 py-8">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
        <p class="text-slate-500 text-sm">© {{ date('Y') }} Aniket Namdeo. All rights reserved.</p>
        <div class="flex items-center gap-6">
            <a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-white transition-colors">Home</a>
            <a href="{{ route('blog.index') }}" class="text-sm text-slate-500 hover:text-white transition-colors">Blog</a>
            <a href="{{ route('home') }}#contact" class="text-sm text-slate-500 hover:text-white transition-colors">Contact</a>
        </div>
    </div>
</footer>

@endsection
