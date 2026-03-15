@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
{{-- Stats Grid --}}
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    @php
    $cards = [
        ['label'=>'Total Projects', 'value'=>$stats['projects'], 'color'=>'from-indigo-600 to-purple-600', 'icon'=>'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
        ['label'=>'Blog Posts',     'value'=>$stats['blogs'],    'color'=>'from-purple-600 to-pink-600',   'icon'=>'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
        ['label'=>'Total Leads',    'value'=>$stats['leads'],    'color'=>'from-cyan-600 to-blue-600',     'icon'=>'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
        ['label'=>'New Messages',   'value'=>$stats['new_leads'],'color'=>'from-emerald-600 to-teal-600',  'icon'=>'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9'],
    ];
    @endphp

    @foreach($cards as $card)
        <div class="rounded-2xl bg-slate-800 border border-slate-700/50 p-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 rounded-full bg-gradient-to-br {{ $card['color'] }} opacity-10 -translate-y-4 translate-x-4"></div>
            <div class="relative">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $card['color'] }} flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $card['icon'] }}"/>
                    </svg>
                </div>
                <p class="text-3xl font-black text-white">{{ $card['value'] }}</p>
                <p class="text-sm text-slate-400 mt-0.5">{{ $card['label'] }}</p>
            </div>
        </div>
    @endforeach
</div>

{{-- Chart + Recent Leads --}}
<div class="grid lg:grid-cols-3 gap-6">

    {{-- Leads Chart --}}
    <div class="lg:col-span-2 rounded-2xl bg-slate-800 border border-slate-700/50 p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-semibold text-white">Monthly Leads — {{ date('Y') }}</h2>
        </div>
        <canvas id="leadsChart" height="80"></canvas>
    </div>

    {{-- Quick Actions --}}
    <div class="rounded-2xl bg-slate-800 border border-slate-700/50 p-6">
        <h2 class="font-semibold text-white mb-4">Quick Actions</h2>
        <div class="space-y-2">
            @php
            $actions=[
                ['label'=>'Add Project',    'route'=>'admin.projects.create',     'color'=>'bg-indigo-600/20 hover:bg-indigo-600/40 text-indigo-400'],
                ['label'=>'New Blog Post',  'route'=>'admin.blogs.create',        'color'=>'bg-purple-600/20 hover:bg-purple-600/40 text-purple-400'],
                ['label'=>'Add Skill',      'route'=>'admin.skills.create',       'color'=>'bg-cyan-600/20 hover:bg-cyan-600/40 text-cyan-400'],
                ['label'=>'Add Service',    'route'=>'admin.services.create',     'color'=>'bg-emerald-600/20 hover:bg-emerald-600/40 text-emerald-400'],
                ['label'=>'Add Testimonial','route'=>'admin.testimonials.create', 'color'=>'bg-pink-600/20 hover:bg-pink-600/40 text-pink-400'],
                ['label'=>'View Messages',  'route'=>'admin.contacts.index',      'color'=>'bg-amber-600/20 hover:bg-amber-600/40 text-amber-400'],
            ];
            @endphp
            @foreach($actions as $a)
                <a href="{{ route($a['route']) }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl {{ $a['color'] }} transition-colors text-sm font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    {{ $a['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</div>

{{-- Recent Contact Messages --}}
@if($recentContacts->isNotEmpty())
<div class="mt-6 rounded-2xl bg-slate-800 border border-slate-700/50 p-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="font-semibold text-white">Recent Messages</h2>
        <a href="{{ route('admin.contacts.index') }}" class="text-sm text-indigo-400 hover:text-indigo-300">View All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-slate-500 border-b border-slate-700">
                    <th class="pb-3 font-medium">Name</th>
                    <th class="pb-3 font-medium">Email</th>
                    <th class="pb-3 font-medium">Subject</th>
                    <th class="pb-3 font-medium">Status</th>
                    <th class="pb-3 font-medium">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/50">
                @foreach($recentContacts as $c)
                    <tr class="hover:bg-slate-700/30 transition-colors">
                        <td class="py-3 text-white font-medium">{{ $c->name }}</td>
                        <td class="py-3 text-slate-400">{{ $c->email }}</td>
                        <td class="py-3 text-slate-400">{{ $c->subject ?? Str::limit($c->message, 40) }}</td>
                        <td class="py-3">
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium
                                {{ $c->status==='new' ? 'bg-green-950 text-green-400 border border-green-700/50' : 'bg-slate-700 text-slate-400' }}">
                                {{ ucfirst($c->status) }}
                            </span>
                        </td>
                        <td class="py-3 text-slate-500">{{ $c->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('leadsChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets: [{
            label: 'Leads',
            data: @json($leadsChart),
            backgroundColor: 'rgba(99, 102, 241, 0.5)',
            borderColor: 'rgba(99, 102, 241, 1)',
            borderWidth: 1,
            borderRadius: 6,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            y: { grid: { color: 'rgba(255,255,255,0.05)' }, ticks: { color: '#94a3b8' }, beginAtZero: true },
            x: { grid: { display: false }, ticks: { color: '#94a3b8' } }
        }
    }
});
</script>
@endpush
@endsection
