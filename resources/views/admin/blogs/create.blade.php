@extends('layouts.admin')
@section('title','New Blog Post')
@section('page_title','New Blog Post')
@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.blogs.index') }}" class="flex items-center gap-2 text-sm text-slate-400 hover:text-white mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Blog Posts
    </a>
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="rounded-2xl bg-slate-800 border border-slate-700/50 p-8 space-y-5">
        @csrf

        {{-- Title --}}
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Title *</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                   class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            @error('title')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Excerpt --}}
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Excerpt</label>
            <textarea name="excerpt" rows="3"
                      class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 resize-none">{{ old('excerpt') }}</textarea>
            @error('excerpt')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Content --}}
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Content *</label>
            <textarea name="content" rows="10" required
                      class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 resize-y">{{ old('content') }}</textarea>
            @error('content')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Category & Tags --}}
        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Category</label>
                <input type="text" name="category" value="{{ old('category') }}" placeholder="e.g. Laravel, AI, Tips"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                @error('category')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Tags</label>
                <input type="text" name="tags" value="{{ old('tags') }}" placeholder="Comma-separated tags"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                @error('tags')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Featured Image --}}
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Featured Image</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-400 text-sm focus:outline-none focus:border-indigo-500 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-slate-700 file:text-slate-300 file:text-xs cursor-pointer">
            @error('image')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- SEO --}}
        <div class="rounded-xl bg-slate-900/50 border border-slate-700 p-5 space-y-4">
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-widest">SEO</p>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Meta Title</label>
                <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Meta Description</label>
                <textarea name="meta_description" rows="2"
                          class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 resize-none">{{ old('meta_description') }}</textarea>
            </div>
        </div>

        {{-- Publish Settings --}}
        <div class="grid sm:grid-cols-2 gap-5 items-end">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Publish Date</label>
                <input type="date" name="published_at" value="{{ old('published_at') }}"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>
            <div class="flex items-center gap-3 pb-3">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="w-4 h-4 rounded text-indigo-600">
                    <span class="text-sm text-slate-300">Publish immediately</span>
                </label>
            </div>
        </div>

        <div class="flex gap-4 pt-2 border-t border-slate-700">
            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm transition-colors">
                Create Post
            </button>
            <a href="{{ route('admin.blogs.index') }}" class="px-6 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-300 text-sm transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
