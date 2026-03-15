{{-- Reusable admin table header --}}
{{-- Usage: @include('partials.admin-table', ['title'=>'', 'createRoute'=>'', 'createLabel'=>'']) --}}
<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-xl font-bold text-white">{{ $title ?? 'Items' }}</h2>
        <p class="text-sm text-slate-500 mt-0.5">Manage {{ strtolower($title ?? 'items') }}</p>
    </div>
    @if(isset($createRoute))
        <a href="{{ route($createRoute) }}"
           class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-medium transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            {{ $createLabel ?? 'Add New' }}
        </a>
    @endif
</div>
