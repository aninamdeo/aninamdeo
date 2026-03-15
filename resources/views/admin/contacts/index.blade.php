@extends('layouts.admin')
@section('title','Contact Messages')
@section('page_title','Contact Messages')
@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-xl font-bold text-white">Contact Messages</h2>
        <p class="text-sm text-slate-500 mt-0.5">Enquiries from the portfolio contact form</p>
    </div>
</div>
<div class="rounded-2xl bg-slate-800 border border-slate-700/50 overflow-hidden">
    @if($contacts->isEmpty())
        <div class="p-12 text-center"><div class="text-5xl mb-4">📬</div><p class="text-slate-400">No messages yet</p></div>
    @else
        <div class="overflow-x-auto"><table class="w-full text-sm">
            <thead class="border-b border-slate-700 bg-slate-900/50"><tr class="text-left text-slate-500"><th class="px-6 py-4 font-medium">Name</th><th class="px-6 py-4 font-medium">Email</th><th class="px-6 py-4 font-medium">Budget</th><th class="px-6 py-4 font-medium">Status</th><th class="px-6 py-4 font-medium">Date</th><th class="px-6 py-4 font-medium text-right">Actions</th></tr></thead>
            <tbody class="divide-y divide-slate-700/50">
                @foreach($contacts as $c)
                    <tr class="hover:bg-slate-700/20 transition-colors {{ $c->status==='new' ? 'bg-indigo-950/20' : '' }}">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                @if($c->status==='new')<span class="w-2 h-2 rounded-full bg-indigo-400 shrink-0"></span>@endif
                                <p class="font-medium text-white">{{ $c->name }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-slate-400">{{ $c->email }}</td>
                        <td class="px-6 py-4 text-slate-400">{{ $c->budget ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium
                                {{ $c->status==='new' ? 'bg-indigo-950 text-indigo-400 border border-indigo-800' :
                                   ($c->status==='replied' ? 'bg-green-950 text-green-400 border border-green-800' :
                                   'bg-slate-700 text-slate-400') }}">
                                {{ ucfirst($c->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">{{ $c->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-right"><div class="flex items-center justify-end gap-2"><a href="{{ route('admin.contacts.show',$c) }}" class="px-3 py-1.5 rounded-lg bg-indigo-700 hover:bg-indigo-600 text-white text-xs">View</a><form action="{{ route('admin.contacts.destroy',$c) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="px-3 py-1.5 rounded-lg bg-red-900/50 hover:bg-red-800 text-red-400 hover:text-white text-xs">Delete</button></form></div></td>
                    </tr>
                @endforeach
            </tbody>
        </table></div>
        <div class="p-4">{{ $contacts->links() }}</div>
    @endif
</div>
@endsection
