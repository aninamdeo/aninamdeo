@extends('layouts.admin')
@section('title', 'Site Settings')
@section('page_title', 'Site Settings')

@section('content')
<div class="max-w-4xl">

    @if(session('success'))
        <div class="mb-6 flex items-center gap-3 px-4 py-3 rounded-xl bg-green-950 border border-green-700/50 text-green-300 text-sm">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        {{-- Profile / Hero --}}
        <div class="rounded-2xl bg-slate-800 border border-slate-700/50 p-8">
            <h2 class="text-lg font-semibold text-white mb-6 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-indigo-600/20 border border-indigo-500/30 flex items-center justify-center text-indigo-400 text-sm">👤</span>
                Profile & Hero Section
            </h2>
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Full Name</label>
                    <input type="text" name="name" value="{{ $settings['name'] ?? 'Aniket Namdeo' }}"
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Tagline / Role</label>
                    <input type="text" name="tagline" value="{{ $settings['tagline'] ?? 'AI Developer & IT Manager' }}"
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
                <div class="sm:col-span-2"
                     x-data="{
                        preview: '{{ addslashes($settings['profile_photo_url'] ?? '') }}',
                        dragging: false,
                        fileName: '',
                        processFile(file) {
                            if (!file) return;
                            const allowed = ['image/jpeg', 'image/jpg', 'image/webp'];
                            if (!allowed.includes(file.type)) { alert('Only JPG and WebP files are allowed.'); return; }
                            if (file.size > 2097152) { alert('File must be under 2 MB.'); return; }
                            this.fileName = file.name;
                            this.preview = URL.createObjectURL(file);
                            // inject file into hidden input
                            const dt = new DataTransfer();
                            dt.items.add(file);
                            document.getElementById('profile_photo_input').files = dt.files;
                        }
                     }">
                    <label class="block text-sm font-medium text-slate-300 mb-3">Profile Photo</label>
                    <div class="flex items-start gap-6">

                        {{-- Live preview circle --}}
                        <div class="shrink-0 text-center">
                            <div class="w-28 h-28 rounded-full overflow-hidden border-2 border-indigo-500/50 bg-white flex items-center justify-center shadow-lg shadow-indigo-500/20">
                                <template x-if="preview">
                                    <img :src="preview" alt="Profile" class="w-full h-full object-cover object-top">
                                </template>
                                <template x-if="!preview">
                                    <span class="text-3xl font-black text-indigo-400">AN</span>
                                </template>
                            </div>
                            <p class="text-xs text-slate-500 mt-2">Preview</p>
                        </div>

                        <div class="flex-1 space-y-4">
                            {{-- Drag & Drop Zone --}}
                            <div
                                class="relative rounded-2xl border-2 border-dashed transition-all duration-200 cursor-pointer"
                                :class="dragging
                                    ? 'border-indigo-400 bg-indigo-600/10 scale-[1.01]'
                                    : 'border-slate-600 hover:border-indigo-500 hover:bg-indigo-600/5'"
                                @dragover.prevent="dragging = true"
                                @dragleave.prevent="dragging = false"
                                @drop.prevent="dragging = false; processFile($event.dataTransfer.files[0])"
                                @click="$refs.fileInput.click()">

                                <input type="file" id="profile_photo_input" name="profile_photo"
                                       accept=".jpg,.jpeg,.webp" x-ref="fileInput" class="hidden"
                                       @change="processFile($event.target.files[0])">

                                <div class="py-8 px-6 text-center">
                                    {{-- Upload icon --}}
                                    <div class="mx-auto w-14 h-14 rounded-2xl flex items-center justify-center mb-4 transition-colors"
                                         :class="dragging ? 'bg-indigo-600/30' : 'bg-indigo-600/10'">
                                        <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                        </svg>
                                    </div>

                                    <template x-if="!fileName">
                                        <div>
                                            <p class="text-white font-semibold text-sm mb-1">Drop your photo here, or <span class="text-indigo-400 underline underline-offset-2">browse</span></p>
                                            <p class="text-slate-500 text-xs">JPG or WebP &nbsp;·&nbsp; Max 1 MB</p>
                                        </div>
                                    </template>
                                    <template x-if="fileName">
                                        <div class="flex items-center justify-center gap-2">
                                            <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            <span class="text-green-400 text-sm font-medium" x-text="fileName"></span>
                                        </div>
                                    </template>
                                </div>

                                {{-- Highlighted "Click to Upload" button --}}
                                <div class="absolute bottom-4 right-4">
                                    <span class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-linear-to-r from-indigo-600 to-purple-600 text-white text-xs font-semibold shadow-lg shadow-indigo-500/30 pointer-events-none">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                        Choose File
                                    </span>
                                </div>
                            </div>

                            @error('profile_photo')
                                <p class="text-red-400 text-xs flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror

                            {{-- OR: URL fallback --}}
                            <div class="flex items-center gap-3">
                                <div class="flex-1 h-px bg-slate-700"></div>
                                <span class="text-xs text-slate-500 font-medium">OR</span>
                                <div class="flex-1 h-px bg-slate-700"></div>
                            </div>
                            <div>
                                <label class="block text-xs text-slate-400 mb-1.5">Paste an image URL</label>
                                <input type="url" name="profile_photo_url" value="{{ $settings['profile_photo_url'] ?? '' }}"
                                       placeholder="https://example.com/photo.jpg"
                                       @input="preview = $event.target.value; fileName = ''"
                                       class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 transition-colors">
                                <p class="text-xs text-slate-500 mt-1">Leave both blank to show the default "AN" initials.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-300 mb-2">About / Bio Text</label>
                    <textarea name="about_text" rows="4"
                              class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 resize-none">{{ $settings['about_text'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Years of Experience</label>
                    <input type="text" name="years_exp" value="{{ $settings['years_exp'] ?? '8+' }}"
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Projects Count</label>
                    <input type="text" name="projects_count" value="{{ $settings['projects_count'] ?? '50+' }}"
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
            </div>
        </div>

        {{-- Contact Info --}}
        <div class="rounded-2xl bg-slate-800 border border-slate-700/50 p-8">
            <h2 class="text-lg font-semibold text-white mb-6 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-purple-600/20 border border-purple-500/30 flex items-center justify-center text-purple-400 text-sm">📬</span>
                Contact Information
            </h2>
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ $settings['email'] ?? 'aninamdeo@gmail.com' }}"
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Phone Number</label>
                    <input type="text" name="phone" value="{{ $settings['phone'] ?? '+91 8718841165' }}"
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Location</label>
                    <input type="text" name="location" value="{{ $settings['location'] ?? 'Bhopal, MP, India' }}"
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Availability Status</label>
                    <input type="text" name="availability" value="{{ $settings['availability'] ?? 'Available for new projects' }}"
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
            </div>
        </div>

        {{-- Social Links --}}
        <div class="rounded-2xl bg-slate-800 border border-slate-700/50 p-8">
            <h2 class="text-lg font-semibold text-white mb-6 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-cyan-600/20 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-sm">🔗</span>
                Social Links
            </h2>
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? 'https://www.linkedin.com/in/aniket-namdeo-84249580' }}"
                           placeholder="https://linkedin.com/in/..."
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">GitHub URL</label>
                    <input type="url" name="github_url" value="{{ $settings['github_url'] ?? 'https://github.com/aninamdeo' }}"
                           placeholder="https://github.com/..."
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Facebook URL</label>
                    <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] ?? 'https://www.facebook.com/ani.namdeo' }}"
                           placeholder="https://facebook.com/..."
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Twitter / X URL</label>
                    <input type="url" name="twitter_url" value="{{ $settings['twitter_url'] ?? '' }}"
                           placeholder="https://twitter.com/..."
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
            </div>
        </div>

        {{-- SEO --}}
        <div class="rounded-2xl bg-slate-800 border border-slate-700/50 p-8">
            <h2 class="text-lg font-semibold text-white mb-6 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-emerald-600/20 border border-emerald-500/30 flex items-center justify-center text-emerald-400 text-sm">🔍</span>
                SEO & Meta
            </h2>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Site Title</label>
                    <input type="text" name="site_title" value="{{ $settings['site_title'] ?? 'Aniket Namdeo — AI Developer & IT Manager' }}"
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Meta Description</label>
                    <textarea name="meta_description" rows="3"
                              class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 resize-none">{{ $settings['meta_description'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Google Analytics ID</label>
                    <input type="text" name="ga_id" value="{{ $settings['ga_id'] ?? '' }}"
                           placeholder="G-XXXXXXXXXX"
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500">
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="px-8 py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold hover:from-indigo-500 hover:to-purple-500 transition-all hover:scale-[1.02] shadow-xl shadow-indigo-500/20 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Save All Settings
            </button>
        </div>
    </form>
</div>
@endsection
