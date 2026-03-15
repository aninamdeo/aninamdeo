@extends('layouts.admin')
@section('title','Testimonials')
@section('page_title','Testimonials')
@section('content')
@include('partials.admin-table',['title'=>'Testimonials','createRoute'=>'admin.testimonials.create','createLabel'=>'Add Testimonial'])
<div class="rounded-2xl bg-slate-800 border border-slate-700/50 overflow-hidden">
    @if($testimonials->isEmpty())
        <div class="p-12 text-center">
            <div class="text-5xl mb-4">💬</div>
            <p class="text-slate-400 mb-2">No testimonials yet</p>
            <a href="{{ route('admin.testimonials.create') }}" class="text-sm text-indigo-400">Add your first testimonial →</a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="border-b border-slate-700 bg-slate-900/50">
                    <tr class="text-left text-slate-500">
                        <th class="px-6 py-4 font-medium">Name</th>
                        <th class="px-6 py-4 font-medium">Position / Company</th>
                        <th class="px-6 py-4 font-medium">Country</th>
                        <th class="px-6 py-4 font-medium">Rating</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @foreach($testimonials as $t)
                        <tr class="hover:bg-slate-700/20">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($t->avatar)
                                        <img src="{{ asset('storage/' . $t->avatar) }}" alt="{{ $t->name }}" class="w-8 h-8 rounded-full object-cover">
                                    @else
                                        <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-white text-xs font-bold">
                                            {{ strtoupper(substr($t->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <p class="font-medium text-white">{{ $t->name }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-400">
                                <p>{{ $t->position }}</p>
                                @if($t->company)<p class="text-xs text-slate-500 mt-0.5">{{ $t->company }}</p>@endif
                            </td>
                            <td class="px-6 py-4 text-slate-400">{{ $t->country ?? '—' }}</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-0.5">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= ($t->rating ?? 5) ? 'text-yellow-400' : 'text-slate-600' }} text-sm">★</span>
                                    @endfor
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs {{ $t->is_active ? 'bg-green-950 text-green-400 border border-green-800' : 'bg-slate-700 text-slate-400' }}">
                                    {{ $t->is_active ? 'Active' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.testimonials.edit', $t) }}" class="px-3 py-1.5 rounded-lg bg-slate-700 hover:bg-slate-600 text-white text-xs">Edit</a>
                                    <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" onsubmit="return confirm('Delete this testimonial?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1.5 rounded-lg bg-red-900/50 hover:bg-red-800 text-red-400 hover:text-white text-xs">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
