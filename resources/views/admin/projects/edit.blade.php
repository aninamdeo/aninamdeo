@extends('layouts.admin')
@section('title', 'Edit Project')
@section('page_title', 'Edit Project')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-2 text-sm text-slate-400 hover:text-white mb-6 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Back to Projects
    </a>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data"
          class="rounded-2xl bg-slate-800 border border-slate-700/50 p-8 space-y-6">
        @csrf @method('PUT')

        <div class="grid sm:grid-cols-2 gap-6">
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-slate-300 mb-2">Project Title *</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                @error('title')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-slate-300 mb-2">Short Description *</label>
                <textarea name="description" required rows="3"
                          class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 resize-none">{{ old('description', $project->description) }}</textarea>
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-slate-300 mb-2">Long Description</label>
                <textarea name="long_description" rows="5"
                          class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 resize-none">{{ old('long_description', $project->long_description) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Technology Stack *</label>
                <input type="text" name="technology" value="{{ old('technology', $project->technology) }}" required
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Client Country</label>
                <input type="text" name="client_country" value="{{ old('client_country', $project->client_country) }}"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Category *</label>
                <select name="category" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                    @foreach(['web'=>'Web Development','ai'=>'AI / Machine Learning','enterprise'=>'Enterprise','mobile'=>'Mobile','other'=>'Other'] as $v=>$l)
                        <option value="{{ $v }}" class="bg-slate-900" {{ old('category',$project->category)==$v ? 'selected':'' }}>{{ $l }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" min="0"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Live URL</label>
                <input type="url" name="project_url" value="{{ old('project_url', $project->project_url) }}"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-slate-300 mb-2">Project Image</label>
                @if($project->image)
                    <div class="mb-3 flex items-center gap-3">
                        <img src="{{ Storage::url($project->image) }}" class="w-16 h-16 rounded-lg object-cover">
                        <p class="text-xs text-slate-500">Current image. Upload a new one to replace it.</p>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-400 text-sm focus:outline-none focus:border-indigo-500 file:mr-3 file:px-3 file:py-1 file:rounded-lg file:bg-indigo-600 file:text-white file:text-xs file:border-0">
            </div>
            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ $project->is_featured ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-slate-600 bg-slate-900 text-indigo-600">
                    <span class="text-sm text-slate-300">Featured</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ $project->is_active ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-slate-600 bg-slate-900 text-indigo-600">
                    <span class="text-sm text-slate-300">Active</span>
                </label>
            </div>
        </div>
        <div class="flex items-center gap-4 pt-2 border-t border-slate-700">
            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm transition-colors">Update Project</button>
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-300 text-sm transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
