@extends('layouts.admin')
@section('title','Edit Testimonial')
@section('page_title','Edit Testimonial')
@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-2 text-sm text-slate-400 hover:text-white mb-6"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>Back</a>
    <form action="{{ route('admin.testimonials.update',$testimonial) }}" method="POST" enctype="multipart/form-data" class="rounded-2xl bg-slate-800 border border-slate-700/50 p-8 space-y-5">
        @csrf @method('PUT')
        <div class="grid sm:grid-cols-2 gap-5">
            <div><label class="block text-sm font-medium text-slate-300 mb-2">Name *</label><input type="text" name="name" value="{{ old('name',$testimonial->name) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500"></div>
            <div><label class="block text-sm font-medium text-slate-300 mb-2">Position</label><input type="text" name="position" value="{{ old('position',$testimonial->position) }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500"></div>
            <div><label class="block text-sm font-medium text-slate-300 mb-2">Company</label><input type="text" name="company" value="{{ old('company',$testimonial->company) }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500"></div>
            <div><label class="block text-sm font-medium text-slate-300 mb-2">Country</label><input type="text" name="country" value="{{ old('country',$testimonial->country) }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500"></div>
            <div class="sm:col-span-2"><label class="block text-sm font-medium text-slate-300 mb-2">Message *</label><textarea name="message" rows="4" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 resize-none">{{ old('message',$testimonial->message) }}</textarea></div>
            <div><label class="block text-sm font-medium text-slate-300 mb-2">Rating</label><select name="rating" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">@for($r=5;$r>=1;$r--)<option value="{{ $r }}" class="bg-slate-900" {{ old('rating',$testimonial->rating)==$r?'selected':'' }}>{{ $r }} Stars</option>@endfor</select></div>
            <div><label class="block text-sm font-medium text-slate-300 mb-2">Sort Order</label><input type="number" name="sort_order" value="{{ old('sort_order',$testimonial->sort_order) }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500"></div>
            <div class="sm:col-span-2"><label class="block text-sm font-medium text-slate-300 mb-2">Avatar</label>
                @if($testimonial->avatar)<div class="mb-2 flex items-center gap-3"><img src="{{ Storage::url($testimonial->avatar) }}" class="w-12 h-12 rounded-full object-cover"><p class="text-xs text-slate-500">Upload new to replace.</p></div>@endif
                <input type="file" name="avatar" accept="image/*" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-400 text-sm file:mr-3 file:px-3 file:py-1 file:rounded-lg file:bg-indigo-600 file:text-white file:text-xs file:border-0">
            </div>
            <div class="flex items-center gap-3 pt-2"><label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" name="is_active" value="1" {{ $testimonial->is_active?'checked':'' }} class="w-4 h-4 rounded text-indigo-600"><span class="text-sm text-slate-300">Active</span></label></div>
        </div>
        <div class="flex gap-4 pt-2 border-t border-slate-700">
            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm transition-colors">Update Testimonial</button>
            <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-300 text-sm transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
