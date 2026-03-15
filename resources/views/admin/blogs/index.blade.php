@extends('layouts.admin')
@section('title','Blog Posts')
@section('page_title','Blog Posts')
@section('content')
@include('partials.admin-table',['title'=>'Blog Posts','createRoute'=>'admin.blogs.create','createLabel'=>'New Post'])
<div class="rounded-2xl bg-slate-800 border border-slate-700/50 overflow-hidden">
    @if($blogs->isEmpty())
        <div class="p-12 text-center">
            <div class="text-5xl mb-4">✍️</div>
            <p class="text-slate-400 mb-2">No blog posts yet</p>
            <a href="{{ route('admin.blogs.create') }}" class="text-sm text-indigo-400">Write your first post →</a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="border-b border-slate-700 bg-slate-900/50">
                    <tr class="text-left text-slate-500">
                        <th class="px-6 py-4 font-medium">Title</th>
                        <th class="px-6 py-4 font-medium">Category</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium">Views</th>
                        <th class="px-6 py-4 font-medium">Date</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @foreach($blogs as $blog)
                        <tr class="hover:bg-slate-700/20">
                            <td class="px-6 py-4">
                                <p class="font-medium text-white">{{ $blog->title }}</p>
                                <p class="text-xs text-slate-500 mt-0.5">{{ Str::limit($blog->excerpt, 55) }}</p>
                            </td>
                            <td class="px-6 py-4">
                                @if($blog->category)
                                    <span class="px-2.5 py-1 rounded-full text-xs bg-indigo-950 text-indigo-400 border border-indigo-800">{{ $blog->category }}</span>
                                @else
                                    <span class="text-slate-500">—</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs {{ $blog->is_published ? 'bg-green-950 text-green-400 border border-green-800' : 'bg-slate-700 text-slate-400' }}">
                                    {{ $blog->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-400">{{ number_format($blog->views ?? 0) }}</td>
                            <td class="px-6 py-4 text-slate-400 text-xs">
                                {{ $blog->published_at ? $blog->published_at->format('d M Y') : $blog->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="px-3 py-1.5 rounded-lg bg-slate-700 hover:bg-slate-600 text-white text-xs">Edit</a>
                                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" onsubmit="return confirm('Delete this post?')">
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
        @if($blogs->hasPages())
            <div class="px-6 py-4 border-t border-slate-700">
                {{ $blogs->links() }}
            </div>
        @endif
    @endif
</div>
@endsection
