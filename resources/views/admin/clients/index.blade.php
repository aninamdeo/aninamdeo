@extends('layouts.admin')
@section('title','Clients')
@section('page_title','Clients')
@section('content')
@include('partials.admin-table',['title'=>'Clients','createRoute'=>'admin.clients.create','createLabel'=>'Add Client'])
<div class="rounded-2xl bg-slate-800 border border-slate-700/50 overflow-hidden">
    @if($clients->isEmpty())
        <div class="p-12 text-center"><div class="text-5xl mb-4">🌍</div><p class="text-slate-400 mb-2">No clients yet</p><a href="{{ route('admin.clients.create') }}" class="text-sm text-indigo-400">Add your first client →</a></div>
    @else
        <div class="overflow-x-auto"><table class="w-full text-sm">
            <thead class="border-b border-slate-700 bg-slate-900/50"><tr class="text-left text-slate-500"><th class="px-6 py-4 font-medium">Client</th><th class="px-6 py-4 font-medium">Country</th><th class="px-6 py-4 font-medium">Website</th><th class="px-6 py-4 font-medium">Status</th><th class="px-6 py-4 font-medium text-right">Actions</th></tr></thead>
            <tbody class="divide-y divide-slate-700/50">
                @foreach($clients as $c)
                    <tr class="hover:bg-slate-700/20 transition-colors">
                        <td class="px-6 py-4"><p class="font-medium text-white">{{ $c->flag_emoji ?? '' }} {{ $c->name }}</p></td>
                        <td class="px-6 py-4 text-slate-400">{{ $c->country }}</td>
                        <td class="px-6 py-4">@if($c->website)<a href="{{ $c->website }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 text-xs">{{ $c->website }}</a>@else<span class="text-slate-600">—</span>@endif</td>
                        <td class="px-6 py-4"><span class="px-2.5 py-1 rounded-full text-xs {{ $c->is_active ? 'bg-green-950 text-green-400 border border-green-800' : 'bg-slate-700 text-slate-400' }}">{{ $c->is_active?'Active':'Hidden' }}</span></td>
                        <td class="px-6 py-4 text-right"><div class="flex items-center justify-end gap-2"><a href="{{ route('admin.clients.edit',$c) }}" class="px-3 py-1.5 rounded-lg bg-slate-700 hover:bg-slate-600 text-white text-xs">Edit</a><form action="{{ route('admin.clients.destroy',$c) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="px-3 py-1.5 rounded-lg bg-red-900/50 hover:bg-red-800 text-red-400 hover:text-white text-xs">Delete</button></form></div></td>
                    </tr>
                @endforeach
            </tbody>
        </table></div>
    @endif
</div>
@endsection
