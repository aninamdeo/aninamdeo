@extends('layouts.admin')
@section('title','Add Service')
@section('page_title','Add Service')
@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.services.index') }}" class="flex items-center gap-2 text-sm text-slate-400 hover:text-white mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Services
    </a>
    <form action="{{ route('admin.services.store') }}" method="POST" class="rounded-2xl bg-slate-800 border border-slate-700/50 p-8 space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Service Title *</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                   class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            @error('title')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Description *</label>
            <textarea name="description" rows="4" required
                      class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 resize-none">{{ old('description') }}</textarea>
            @error('description')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="grid sm:grid-cols-3 gap-5">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Icon (emoji)</label>
                <input type="text" name="icon" value="{{ old('icon') }}" placeholder="🤖"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>
            <div class="flex items-center gap-3 pt-7">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded text-indigo-600">
                    <span class="text-sm text-slate-300">Active</span>
                </label>
            </div>
        </div>
        <div class="flex gap-4 pt-2 border-t border-slate-700">
            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm transition-colors">
                Create Service
            </button>
            <a href="{{ route('admin.services.index') }}" class="px-6 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-300 text-sm transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
