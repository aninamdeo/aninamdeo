@extends('layouts.app')

@section('title', $blog->meta_title ?: $blog->title . ' — Aniket Namdeo')
@section('meta_description', $blog->meta_description ?: $blog->excerpt)
@section('og_title', $blog->title)
@section('og_description', $blog->excerpt)
@if($blog->image)
    @section('og_image', Storage::url($blog->image))
@endif

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

{{-- ARTICLE HERO --}}
<section class="pt-32 pb-12 bg-slate-950">
    <div class="max-w-4xl mx-auto px-6">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-8">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <a href="{{ route('blog.index') }}" class="hover:text-white transition-colors">Blog</a>
            <span>/</span>
            <span class="text-slate-400 truncate max-w-xs">{{ $blog->title }}</span>
        </nav>

        {{-- Category & Meta --}}
        <div class="flex flex-wrap items-center gap-3 mb-6">
            @if($blog->category)
                <span class="px-3 py-1 rounded-full text-xs font-medium bg-indigo-600/20 border border-indigo-500/30 text-indigo-400">{{ $blog->category }}</span>
            @endif
            <span class="text-xs text-slate-500">{{ $blog->reading_time }}</span>
            <span class="text-xs text-slate-500">{{ $blog->views }} views</span>
        </div>

        <h1 class="text-3xl lg:text-5xl font-black text-white leading-tight mb-6">{{ $blog->title }}</h1>

        @if($blog->excerpt)
            <p class="text-lg text-slate-400 leading-relaxed mb-8 border-l-4 border-indigo-500/50 pl-4">{{ $blog->excerpt }}</p>
        @endif

        {{-- Author & Date --}}
        <div class="flex items-center gap-4 py-6 border-t border-b border-slate-800">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shrink-0">
                <span class="text-sm font-bold text-white">AN</span>
            </div>
            <div>
                <p class="text-sm font-semibold text-white">Aniket Namdeo</p>
                <p class="text-xs text-slate-500">
                    {{ optional($blog->published_at ?? $blog->created_at)->format('F d, Y') }}
                </p>
            </div>
        </div>
    </div>
</section>

{{-- FEATURED IMAGE --}}
@if($blog->image)
    <div class="max-w-4xl mx-auto px-6 mt-8">
        <div class="rounded-2xl overflow-hidden">
            <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="w-full object-cover max-h-96">
        </div>
    </div>
@endif

{{-- ARTICLE CONTENT --}}
<section class="py-12 bg-slate-950">
    <div class="max-w-4xl mx-auto px-6">
        <div class="prose prose-invert prose-lg max-w-none
                    prose-headings:font-black prose-headings:text-white
                    prose-p:text-slate-300 prose-p:leading-relaxed
                    prose-a:text-indigo-400 prose-a:no-underline hover:prose-a:text-indigo-300
                    prose-strong:text-white
                    prose-code:text-indigo-300 prose-code:bg-slate-800 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded prose-code:text-sm prose-code:before:content-none prose-code:after:content-none
                    prose-pre:bg-slate-800 prose-pre:border prose-pre:border-slate-700 prose-pre:rounded-2xl
                    prose-blockquote:border-indigo-500 prose-blockquote:text-slate-400
                    prose-img:rounded-2xl
                    prose-hr:border-slate-700
                    prose-li:text-slate-300">
            {!! $blog->content !!}
        </div>

        {{-- Tags --}}
        @if($blog->tags)
            @php $tags = is_array($blog->tags) ? $blog->tags : explode(',', $blog->tags); @endphp
            <div class="mt-10 pt-8 border-t border-slate-800">
                <p class="text-xs text-slate-500 uppercase tracking-widest mb-3">Tags</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($tags as $tag)
                        <span class="px-3 py-1.5 rounded-full text-xs bg-slate-800 border border-slate-700 text-slate-400">{{ trim($tag) }}</span>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Share --}}
        <div class="mt-8 pt-8 border-t border-slate-800">
            <p class="text-sm text-slate-400 mb-3">Share this article</p>
            <div class="flex gap-3">
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(url()->current()) }}"
                   target="_blank" rel="noopener noreferrer"
                   class="px-4 py-2 rounded-xl glass border border-slate-700 hover:border-indigo-500/50 text-slate-400 hover:text-white text-sm transition-all">
                    Twitter / X
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                   target="_blank" rel="noopener noreferrer"
                   class="px-4 py-2 rounded-xl glass border border-slate-700 hover:border-indigo-500/50 text-slate-400 hover:text-white text-sm transition-all">
                    LinkedIn
                </a>
            </div>
        </div>
    </div>
</section>

{{-- RELATED POSTS --}}
@if($related->isNotEmpty())
    <section class="py-16 bg-slate-900">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-2xl font-black text-white mb-8">Related <span class="gradient-text">Articles</span></h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($related as $post)
                    <article class="group glass rounded-2xl border border-slate-700/50 hover:border-indigo-500/50 overflow-hidden transition-all duration-300 hover:-translate-y-1">
                        @if($post->image)
                            <div class="aspect-video overflow-hidden">
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                        @else
                            <div class="aspect-video bg-gradient-to-br from-indigo-900/30 to-slate-900 flex items-center justify-center">
                                <span class="text-4xl opacity-20">✍️</span>
                            </div>
                        @endif
                        <div class="p-5">
                            @if($post->category)
                                <span class="text-xs text-indigo-400 font-medium">{{ $post->category }}</span>
                            @endif
                            <h3 class="mt-1 text-base font-bold text-white group-hover:text-indigo-400 transition-colors line-clamp-2">
                                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="mt-2 text-xs text-slate-500">{{ optional($post->published_at ?? $post->created_at)->format('M d, Y') }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

{{-- BACK TO BLOG --}}
<section class="py-12 bg-slate-900 border-t border-slate-800">
    <div class="max-w-4xl mx-auto px-6 flex items-center justify-between">
        <a href="{{ route('blog.index') }}"
           class="flex items-center gap-2 text-slate-400 hover:text-white transition-colors group">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
            </svg>
            All Articles
        </a>
        <a href="{{ route('home') }}#contact"
           class="px-6 py-2.5 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm font-semibold hover:scale-105 transition-transform">
            Hire Me
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

@push('styles')
<style>
.prose pre { overflow-x: auto; }
</style>
@endpush
