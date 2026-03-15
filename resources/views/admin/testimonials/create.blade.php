@extends('layouts.admin')
@section('title','Add Testimonial')
@section('page_title','Add Testimonial')
@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-2 text-sm text-slate-400 hover:text-white mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Testimonials
    </a>
    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="rounded-2xl bg-slate-800 border border-slate-700/50 p-8 space-y-5">
        @csrf

        {{-- Name --}}
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Full Name *</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Position & Company --}}
        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Position</label>
                <input type="text" name="position" value="{{ old('position') }}" placeholder="e.g. CEO"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                @error('position')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Company</label>
                <input type="text" name="company" value="{{ old('company') }}" placeholder="e.g. Acme Corp"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                @error('company')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Country --}}
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Country</label>
            <input type="text" name="country" value="{{ old('country') }}" placeholder="e.g. United Kingdom"
                   class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            @error('country')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Message --}}
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Testimonial Message *</label>
            <textarea name="message" rows="5" required
                      class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 resize-none">{{ old('message') }}</textarea>
            @error('message')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Rating --}}
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Rating</label>
            <select name="rating"
                    class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>
                        {{ $i }} Star{{ $i > 1 ? 's' : '' }} — {{ str_repeat('★', $i) }}{{ str_repeat('☆', 5 - $i) }}
                    </option>
                @endfor
            </select>
            @error('rating')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Avatar --}}
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Avatar / Photo</label>
            <input type="file" name="avatar" accept="image/*"
                   class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-400 text-sm focus:outline-none focus:border-indigo-500 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-slate-700 file:text-slate-300 file:text-xs cursor-pointer">
            @error('avatar')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Sort & Active --}}
        <div class="grid sm:grid-cols-2 gap-5 items-end">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}"
                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
            </div>
            <div class="flex items-center gap-3 pb-3">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded text-indigo-600">
                    <span class="text-sm text-slate-300">Active</span>
                </label>
            </div>
        </div>

        <div class="flex gap-4 pt-2 border-t border-slate-700">
            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm transition-colors">
                Add Testimonial
            </button>
            <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-300 text-sm transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
