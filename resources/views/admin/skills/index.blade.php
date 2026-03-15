@extends('layouts.admin')
@section('title','Skills')
@section('page_title','Skills')
@section('content')
@include('partials.admin-table',['title'=>'Skills','createRoute'=>'admin.skills.create','createLabel'=>'Add Skill'])
<div class="rounded-2xl bg-slate-800 border border-slate-700/50 overflow-hidden">
    @if($skills->isEmpty())
        <div class="p-12 text-center text-slate-500"><div class="text-5xl mb-4">📊</div><p class="text-lg text-slate-400 mb-2">No skills yet</p><a href="{{ route('admin.skills.create') }}" class="text-sm text-indigo-400 hover:text-indigo-300">Add your first skill →</a></div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="border-b border-slate-700 bg-slate-900/50">
                    <tr class="text-left text-slate-500"><th class="px-6 py-4 font-medium">Skill</th><th class="px-6 py-4 font-medium">Category</th><th class="px-6 py-4 font-medium">Level</th><th class="px-6 py-4 font-medium">Status</th><th class="px-6 py-4 font-medium text-right">Actions</th></tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @foreach($skills as $skill)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="px-6 py-4"><p class="font-medium text-white">{{ $skill->name }}</p></td>
                            <td class="px-6 py-4 text-slate-400">{{ $skill->category ?? '—' }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex-1 h-1.5 bg-slate-700 rounded-full overflow-hidden max-w-24">
                                        <div class="h-full rounded-full" style="width:{{ $skill->percentage }}%;background:{{ $skill->color??'#6366f1' }}"></div>
                                    </div>
                                    <span class="text-xs font-bold" style="color:{{ $skill->color??'#6366f1' }}">{{ $skill->percentage }}%</span>
                                </div>
                            </td>
                            <td class="px-6 py-4"><span class="px-2.5 py-1 rounded-full text-xs {{ $skill->is_active ? 'bg-green-950 text-green-400 border border-green-800':'bg-slate-700 text-slate-400' }}">{{ $skill->is_active?'Active':'Hidden' }}</span></td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.skills.edit',$skill) }}" class="px-3 py-1.5 rounded-lg bg-slate-700 hover:bg-slate-600 text-white text-xs transition-colors">Edit</a>
                                    <form action="{{ route('admin.skills.destroy',$skill) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="px-3 py-1.5 rounded-lg bg-red-900/50 hover:bg-red-800 text-red-400 hover:text-white text-xs transition-colors">Delete</button></form>
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
