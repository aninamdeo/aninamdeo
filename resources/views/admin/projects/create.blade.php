@extends('layouts.admin')
@section('title', 'Add Project')
@section('page_title', 'Add New Project')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-2 text-sm text-slate-400 hover:text-white mb-6 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Back to Projects
    </a>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
          class="rounded-2xl bg-slate-800 border border-slate-700/50 p-8 space-y-6">
        @csrf

        <div class="grid sm:grid-cols-2 gap-6">
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-slate-300 mb-2">Project Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g., AI Customer Support Bot"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                @error('title')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-slate-300 mb-2">Short Description *</label>
                <textarea name="description" required rows="3" placeholder="Brief project description..."
                          class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 resize-none">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-slate-300 mb-2">Long Description</label>
                <textarea name="long_description" rows="5" placeholder="Detailed project description (optional)..."
                          class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 resize-none">{{ old('long_description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Technology Stack *</label>
                <input type="text" name="technology" value="{{ old('technology') }}" required placeholder="Laravel, React, MySQL, AWS"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                @error('technology')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Client Country</label>
                <input type="text" name="client_country" value="{{ old('client_country') }}" placeholder="India, USA, Malaysia..."
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Category *</label>
                <select name="category" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                    <option value="web"        class="bg-slate-900" {{ old('category')=='web' ? 'selected':'' }}>Web Development</option>
                    <option value="ai"         class="bg-slate-900" {{ old('category')=='ai' ? 'selected':'' }}>AI / Machine Learning</option>
                    <option value="enterprise" class="bg-slate-900" {{ old('category')=='enterprise' ? 'selected':'' }}>Enterprise</option>
                    <option value="mobile"     class="bg-slate-900" {{ old('category')=='mobile' ? 'selected':'' }}>Mobile</option>
                    <option value="other"      class="bg-slate-900" {{ old('category')=='other' ? 'selected':'' }}>Other</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Live URL</label>
                <input type="url" name="project_url" value="{{ old('project_url') }}" placeholder="https://..."
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url') }}" placeholder="https://github.com/..."
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-slate-300 mb-2">Project Image</label>
                <input type="file" name="image" accept="image/*"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-400 text-sm focus:outline-none focus:border-indigo-500 file:mr-3 file:px-3 file:py-1 file:rounded-lg file:bg-indigo-600 file:text-white file:text-xs file:border-0">
            </div>

            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-slate-600 bg-slate-900 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-slate-300">Featured Project</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked
                           class="w-4 h-4 rounded border-slate-600 bg-slate-900 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-slate-300">Active (Visible)</span>
                </label>
            </div>
        </div>

        <div class="flex items-center gap-4 pt-2 border-t border-slate-700">
            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm transition-colors">
                Create Project
            </button>
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-300 text-sm transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
