@extends('layouts.admin')
@section('title', 'Contact Message')
@section('page_title', 'Contact Message')

@section('content')
<div class="max-w-3xl">

    <a href="{{ route('admin.contacts.index') }}"
       class="flex items-center gap-2 text-sm text-slate-400 hover:text-white mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Messages
    </a>

    <div class="rounded-2xl bg-slate-800 border border-slate-700/50 overflow-hidden">

        {{-- Header --}}
        <div class="px-8 py-6 border-b border-slate-700 flex items-start justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-white">{{ $contact->name }}</h2>
                <p class="text-sm text-slate-400 mt-1">{{ $contact->email }}
                    @if($contact->phone)
                        · {{ $contact->phone }}
                    @endif
                </p>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <span class="px-3 py-1.5 rounded-full text-xs font-medium
                    {{ $contact->status === 'new'      ? 'bg-blue-950 text-blue-300 border border-blue-700'   :
                       ($contact->status === 'read'    ? 'bg-yellow-950 text-yellow-300 border border-yellow-700' :
                       ($contact->status === 'replied' ? 'bg-green-950 text-green-300 border border-green-700'   :
                                                         'bg-slate-700 text-slate-400 border border-slate-600')) }}">
                    {{ ucfirst($contact->status) }}
                </span>
            </div>
        </div>

        {{-- Details --}}
        <div class="px-8 py-6 space-y-6">

            @if($contact->subject)
                <div>
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-widest mb-1">Subject</p>
                    <p class="text-white font-medium">{{ $contact->subject }}</p>
                </div>
            @endif

            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-widest mb-2">Message</p>
                <div class="p-5 rounded-xl bg-slate-900 border border-slate-700">
                    <p class="text-slate-300 leading-relaxed whitespace-pre-line">{{ $contact->message }}</p>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-widest mb-1">Received</p>
                    <p class="text-slate-300">{{ $contact->created_at->format('F d, Y \a\t h:i A') }}</p>
                </div>
                @if($contact->ip_address)
                    <div>
                        <p class="text-xs font-medium text-slate-500 uppercase tracking-widest mb-1">IP Address</p>
                        <p class="text-slate-300">{{ $contact->ip_address }}</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Actions --}}
        <div class="px-8 py-6 border-t border-slate-700 flex flex-wrap items-center gap-4">

            {{-- Update Status --}}
            <form action="{{ route('admin.contacts.update', $contact) }}" method="POST" class="flex items-center gap-3">
                @csrf @method('PATCH')
                <select name="status"
                        class="px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                    <option value="new"      {{ $contact->status === 'new'      ? 'selected' : '' }} class="bg-slate-900">New</option>
                    <option value="read"     {{ $contact->status === 'read'     ? 'selected' : '' }} class="bg-slate-900">Read</option>
                    <option value="replied"  {{ $contact->status === 'replied'  ? 'selected' : '' }} class="bg-slate-900">Replied</option>
                    <option value="archived" {{ $contact->status === 'archived' ? 'selected' : '' }} class="bg-slate-900">Archived</option>
                </select>
                <button type="submit"
                        class="px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-medium transition-colors">
                    Update Status
                </button>
            </form>

            {{-- Reply via Email --}}
            <a href="mailto:{{ $contact->email }}?subject=Re: {{ urlencode($contact->subject ?? 'Your message') }}"
               class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Reply via Email
            </a>

            {{-- Delete --}}
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
                  onsubmit="return confirm('Delete this message permanently?')" class="ml-auto">
                @csrf @method('DELETE')
                <button type="submit"
                        class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-red-900/40 hover:bg-red-800 text-red-400 hover:text-white text-sm font-medium transition-colors border border-red-800/50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Delete
                </button>
            </form>

        </div>
    </div>
</div>
@endsection