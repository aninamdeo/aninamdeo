<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Aniket Portfolio CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-slate-900 text-slate-100 antialiased" x-data="{ sidebarOpen: true }">
<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="bg-slate-800 border-r border-slate-700 flex flex-col shrink-0 transition-all duration-300"
           :class="sidebarOpen ? 'w-64' : 'w-16'">

        <div class="flex items-center gap-3 p-4 border-b border-slate-700 h-16">
            <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center shrink-0">
                <span class="text-white font-bold text-sm">AN</span>
            </div>
            <span class="font-semibold text-white truncate" x-show="sidebarOpen">Portfolio CMS</span>
        </div>

        <nav class="flex-1 py-4 overflow-y-auto space-y-0.5 px-2">
            @php
            $nav = [
                ['url' => route('admin.dashboard'),          'label' => 'Dashboard',    'match' => 'admin.dashboard'],
                ['url' => route('admin.projects.index'),     'label' => 'Projects',     'match' => 'admin.projects*'],
                ['url' => route('admin.skills.index'),       'label' => 'Skills',       'match' => 'admin.skills*'],
                ['url' => route('admin.services.index'),     'label' => 'Services',     'match' => 'admin.services*'],
                ['url' => route('admin.blogs.index'),        'label' => 'Blog Posts',   'match' => 'admin.blogs*'],
                ['url' => route('admin.testimonials.index'), 'label' => 'Testimonials', 'match' => 'admin.testimonials*'],
                ['url' => route('admin.clients.index'),      'label' => 'Clients',      'match' => 'admin.clients*'],
                ['url' => route('admin.contacts.index'),     'label' => 'Messages',     'match' => 'admin.contacts*'],
                ['url' => route('admin.settings.index'),     'label' => 'Settings',     'match' => 'admin.settings*'],
            ];
            @endphp

            @foreach($nav as $item)
                <a href="{{ $item['url'] }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                          {{ request()->routeIs($item['match']) ? 'bg-indigo-600 text-white font-medium' : 'text-slate-400 hover:bg-slate-700 hover:text-white' }}">
                    <span class="w-2 h-2 rounded-full shrink-0
                                 {{ request()->routeIs($item['match']) ? 'bg-white' : 'bg-slate-600' }}"></span>
                    <span class="truncate" x-show="sidebarOpen">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

        <div class="p-4 border-t border-slate-700">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shrink-0">
                    <span class="text-xs font-bold text-white">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                </div>
                <div x-show="sidebarOpen">
                    <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-xs text-slate-400 hover:text-red-400 transition-colors">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-slate-800 border-b border-slate-700 flex items-center justify-between px-6 shrink-0">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = !sidebarOpen"
                        class="p-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <h1 class="text-base font-semibold text-white">@yield('page_title', 'Dashboard')</h1>
            </div>
            <a href="{{ route('home') }}" target="_blank"
               class="flex items-center gap-1.5 text-sm text-slate-400 hover:text-indigo-400 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                View Site
            </a>
        </header>

        <main class="flex-1 overflow-y-auto p-6 bg-slate-900">
            @if(session('success'))
                <div class="mb-6 flex items-center gap-2 px-4 py-3 rounded-xl bg-green-950 border border-green-700/50 text-green-300 text-sm">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 flex items-center gap-2 px-4 py-3 rounded-xl bg-red-950 border border-red-700/50 text-red-300 text-sm">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
@stack('scripts')
</body>
</html>
