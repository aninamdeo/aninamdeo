@extends('layouts.admin')
@section('title','Services')
@section('page_title','Services')
@section('content')
@include('partials.admin-table',['title'=>'Services','createRoute'=>'admin.services.create','createLabel'=>'Add Service'])
<div class="rounded-2xl bg-slate-800 border border-slate-700/50 overflow-hidden">
    @if($services->isEmpty())
        <div class="p-12 text-center">
            <div class="text-5xl mb-4">⚡</div>
            <p class="text-slate-400 mb-2">No services yet</p>
            <a href="{{ route('admin.services.create') }}" class="text-sm text-indigo-400">Add your first service →</a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="border-b border-slate-700 bg-slate-900/50">
                    <tr class="text-left text-slate-500">
                        <th class="px-6 py-4 font-medium">Service</th>
                        <th class="px-6 py-4 font-medium">Icon</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @foreach($services as $s)
                        <tr class="hover:bg-slate-700/20">
                            <td class="px-6 py-4">
                                <p class="font-medium text-white">{{ $s->title }}</p>
                                <p class="text-xs text-slate-500 mt-0.5">{{ Str::limit($s->description, 60) }}</p>
                            </td>
                            <td class="px-6 py-4 text-2xl">{{ $s->icon ?? '⚡' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs {{ $s->is_active ? 'bg-green-950 text-green-400 border border-green-800' : 'bg-slate-700 text-slate-400' }}">
                                    {{ $s->is_active ? 'Active' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.services.edit', $s) }}" class="px-3 py-1.5 rounded-lg bg-slate-700 hover:bg-slate-600 text-white text-xs">Edit</a>
                                    <form action="{{ route('admin.services.destroy', $s) }}" method="POST" onsubmit="return confirm('Delete this service?')">
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
