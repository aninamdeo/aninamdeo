@extends('layouts.admin')
@section('title','Edit Skill')
@section('page_title','Edit Skill')
@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.skills.index') }}" class="flex items-center gap-2 text-sm text-slate-400 hover:text-white mb-6"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>Back</a>
    <form action="{{ route('admin.skills.update',$skill) }}" method="POST" class="rounded-2xl bg-slate-800 border border-slate-700/50 p-8 space-y-5">
        @csrf @method('PUT')
        <div class="grid sm:grid-cols-2 gap-5">
            <div><label class="block text-sm font-medium text-slate-300 mb-2">Skill Name *</label><input type="text" name="name" value="{{ old('name',$skill->name) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500"></div>
            <div><label class="block text-sm font-medium text-slate-300 mb-2">Percentage *</label><input type="number" name="percentage" value="{{ old('percentage',$skill->percentage) }}" min="0" max="100" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500"></div>
            <div><label class="block text-sm font-medium text-slate-300 mb-2">Category</label><input type="text" name="category" value="{{ old('category',$skill->category) }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500"></div>
            <div><label class="block text-sm font-medium text-slate-300 mb-2">Bar Color</label><div class="flex gap-2"><input type="color" name="color" value="{{ old('color',$skill->color??'#6366f1') }}" class="h-11 w-16 rounded-xl bg-slate-900 border border-slate-700 cursor-pointer"><input type="text" value="{{ old('color',$skill->color??'#6366f1') }}" class="flex-1 px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500"></div></div>
            <div><label class="block text-sm font-medium text-slate-300 mb-2">Sort Order</label><input type="number" name="sort_order" value="{{ old('sort_order',$skill->sort_order) }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500"></div>
            <div class="flex items-center gap-3 pt-6"><label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" name="is_active" value="1" {{ $skill->is_active?'checked':'' }} class="w-4 h-4 rounded text-indigo-600"><span class="text-sm text-slate-300">Active</span></label></div>
        </div>
        <div class="flex gap-4 pt-2 border-t border-slate-700">
            <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm transition-colors">Update Skill</button>
            <a href="{{ route('admin.skills.index') }}" class="px-6 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-300 text-sm transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
