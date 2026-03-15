@extends('layouts.admin')
@section('title', 'Projects')
@section('page_title', 'Projects')

@section('content')
@include('partials.admin-table', ['title'=>'Projects', 'createRoute'=>'admin.projects.create', 'createLabel'=>'Add Project'])

<div class="rounded-2xl bg-slate-800 border border-slate-700/50 overflow-hidden">
    @if($projects->isEmpty())
        <div class="p-12 text-center text-slate-500">
            <div class="text-5xl mb-4">📂</div>
            <p class="text-lg font-medium text-slate-400 mb-2">No projects yet</p>
            <a href="{{ route('admin.projects.create') }}" class="text-sm text-indigo-400 hover:text-indigo-300">Add your first project →</a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="border-b border-slate-700 bg-slate-900/50">
                    <tr class="text-left text-slate-500">
                        <th class="px-6 py-4 font-medium">Project</th>
                        <th class="px-6 py-4 font-medium">Category</th>
                        <th class="px-6 py-4 font-medium">Country</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium">Featured</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @foreach($projects as $project)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($project->image)
                                        <img src="{{ Storage::url($project->image) }}" class="w-10 h-10 rounded-lg object-cover" alt="">
                                    @else
                                        <div class="w-10 h-10 rounded-lg bg-indigo-950 border border-indigo-800 flex items-center justify-center text-xl">💻</div>
                                    @endif
                                    <div>
                                        <p class="font-medium text-white">{{ $project->title }}</p>
                                        <p class="text-xs text-slate-500 mt-0.5">{{ Str::limit($project->technology, 40) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4"><span class="px-2.5 py-1 rounded-full text-xs bg-indigo-950 border border-indigo-800 text-indigo-400">{{ ucfirst($project->category) }}</span></td>
                            <td class="px-6 py-4 text-slate-400">{{ $project->client_country ?? '—' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $project->is_active ? 'bg-green-950 text-green-400 border border-green-800' : 'bg-slate-700 text-slate-400' }}">
                                    {{ $project->is_active ? 'Active' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($project->is_featured)<span class="text-yellow-400 text-lg">⭐</span>@else<span class="text-slate-600">—</span>@endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="px-3 py-1.5 rounded-lg bg-slate-700 hover:bg-slate-600 text-white text-xs transition-colors">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-900/50 hover:bg-red-800 text-red-400 hover:text-white text-xs transition-colors">Delete</button>
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
