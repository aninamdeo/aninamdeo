@extends('layouts.app')

@section('title', 'Aniket Namdeo — AI Developer & IT Manager | Full Stack Expert')
@section('meta_description', 'Aniket Namdeo — 8+ Years AI Developer, IT Manager & Full Stack Developer. 50+ projects delivered for clients in India, USA, Malaysia & Singapore.')

@section('content')

{{-- NAVBAR --}}
<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
     x-data="{ scrolled: false, mobileMenu: false }"
     @scroll.window="scrolled = window.scrollY > 50"
     :class="scrolled ? 'bg-slate-900/95 backdrop-blur-md shadow-lg shadow-black/20' : 'bg-transparent'">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-xl">
            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-sm font-black">AN</span>
            <span class="gradient-text">Aniket Namdeo</span>
        </a>
        <div class="hidden md:flex items-center gap-8">
            <a href="#home"       class="text-sm text-slate-400 hover:text-white transition-colors relative group">Home<span class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-indigo-500 group-hover:w-full transition-all duration-300"></span></a>
            <a href="#about"      class="text-sm text-slate-400 hover:text-white transition-colors relative group">About<span class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-indigo-500 group-hover:w-full transition-all duration-300"></span></a>
            <a href="#skills"     class="text-sm text-slate-400 hover:text-white transition-colors relative group">Skills<span class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-indigo-500 group-hover:w-full transition-all duration-300"></span></a>
            <a href="#projects"   class="text-sm text-slate-400 hover:text-white transition-colors relative group">Projects<span class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-indigo-500 group-hover:w-full transition-all duration-300"></span></a>
            <a href="#services"   class="text-sm text-slate-400 hover:text-white transition-colors relative group">Services<span class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-indigo-500 group-hover:w-full transition-all duration-300"></span></a>
            <a href="{{ route('blog.index') }}" class="text-sm text-slate-400 hover:text-white transition-colors relative group">Blog<span class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-indigo-500 group-hover:w-full transition-all duration-300"></span></a>
            <a href="#contact"    class="text-sm text-slate-400 hover:text-white transition-colors relative group">Contact<span class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-indigo-500 group-hover:w-full transition-all duration-300"></span></a>
        </div>
        <a href="#contact" class="hidden md:flex px-5 py-2 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm font-medium hover:from-indigo-500 hover:to-purple-500 transition-all duration-300 shadow-lg shadow-indigo-500/25 hover:scale-105">
            Hire Me
        </a>
        <button @click="mobileMenu = !mobileMenu" class="md:hidden text-slate-400 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="mobileMenu"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    <div x-show="mobileMenu" x-transition class="md:hidden bg-slate-900/98 border-t border-slate-800 px-6 py-4 space-y-3">
        <a href="#home"     @click="mobileMenu=false" class="block text-sm text-slate-300 hover:text-white py-1.5">Home</a>
        <a href="#about"    @click="mobileMenu=false" class="block text-sm text-slate-300 hover:text-white py-1.5">About</a>
        <a href="#skills"   @click="mobileMenu=false" class="block text-sm text-slate-300 hover:text-white py-1.5">Skills</a>
        <a href="#projects" @click="mobileMenu=false" class="block text-sm text-slate-300 hover:text-white py-1.5">Projects</a>
        <a href="#services" @click="mobileMenu=false" class="block text-sm text-slate-300 hover:text-white py-1.5">Services</a>
        <a href="#contact"  @click="mobileMenu=false" class="block text-sm text-slate-300 hover:text-white py-1.5">Contact</a>
    </div>
</nav>

{{-- 1. HERO --}}
<section id="home" class="relative min-h-screen flex items-center overflow-hidden bg-slate-950">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 -left-32 w-96 h-96 rounded-full bg-indigo-600/20 blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-1/4 -right-32 w-96 h-96 rounded-full bg-purple-600/20 blur-3xl animate-pulse-slow" style="animation-delay:1.5s"></div>
        <div class="absolute inset-0" style="background-image:linear-gradient(rgba(99,102,241,0.04) 1px,transparent 1px),linear-gradient(90deg,rgba(99,102,241,0.04) 1px,transparent 1px);background-size:50px 50px"></div>
    </div>
    <div class="max-w-7xl mx-auto px-6 py-24 pt-32 grid lg:grid-cols-2 gap-12 items-center relative z-10">
        <div class="space-y-8">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full glass border border-indigo-500/30 text-indigo-400 text-sm">
                <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                Available for new projects
            </div>
            <div>
                <h1 class="text-5xl lg:text-7xl font-black leading-tight">
                    <span class="text-white block">Hi, I'm</span>
                    <span class="gradient-text block">Aniket Namdeo</span>
                </h1>
                <div class="mt-4 h-10" x-data="{titles:['AI Developer & IT Manager','Full Stack Engineer','Team Lead & Architect','Laravel & React Expert'],i:0,t:''}" x-init="t=titles[0];setInterval(()=>{i=(i+1)%titles.length;t=titles[i]},3000)">
                    <p class="text-xl lg:text-2xl font-medium text-indigo-400 transition-all" x-text="t"></p>
                </div>
                <p class="mt-4 text-lg text-slate-400 leading-relaxed max-w-lg">
                    Building AI Solutions and Scalable Software Systems for global clients across
                    <span class="text-indigo-400 font-medium">India, USA, Malaysia & Singapore</span>.
                </p>
            </div>
            <div class="flex flex-wrap gap-6">
                <div class="text-center"><p class="text-3xl font-black gradient-text">8+</p><p class="text-sm text-slate-500">Years Exp.</p></div>
                <div class="text-center"><p class="text-3xl font-black gradient-text">50+</p><p class="text-sm text-slate-500">Projects</p></div>
                <div class="text-center"><p class="text-3xl font-black gradient-text">15+</p><p class="text-sm text-slate-500">Developers Led</p></div>
            </div>
            <div class="flex flex-wrap gap-4">
                <a href="#projects" class="group px-7 py-3.5 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold hover:from-indigo-500 hover:to-purple-500 transition-all duration-300 shadow-2xl shadow-indigo-500/30 hover:scale-105 flex items-center gap-2">
                    View Projects
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="#contact" class="px-7 py-3.5 rounded-full glass border border-indigo-500/50 text-white font-semibold hover:bg-indigo-600/20 transition-all duration-300 hover:scale-105">Hire Me</a>
            </div>
            <div class="flex flex-wrap gap-2">
                @foreach(['AI/ML','Laravel','React','Next.js','Node.js','MySQL','AWS'] as $tech)
                    <span class="px-3 py-1 rounded-full text-xs glass border border-slate-700 text-slate-400">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
        <div class="flex justify-center lg:justify-end">
            <div class="relative">
                <div class="absolute inset-0 rounded-full border-2 border-dashed border-indigo-500/30 animate-spin" style="animation-duration:20s"></div>
                <div class="w-72 h-72 lg:w-96 lg:h-96 rounded-full border-2 border-indigo-500/50 shadow-2xl shadow-indigo-500/20 relative z-10 flex items-center justify-center overflow-hidden
                    {{ !empty($settings['profile_photo_url']) ? 'bg-white' : 'bg-gradient-to-br from-indigo-900 via-purple-900 to-slate-900 glass' }}">
                    @if(!empty($settings['profile_photo_url']))
                        <img src="{{ $settings['profile_photo_url'] }}" alt="Aniket Namdeo"
                             class="w-full h-full object-cover object-top"
                             style="object-position: center 15%;">
                    @else
                        <div class="text-center"><div class="text-8xl lg:text-9xl font-black gradient-text">AN</div><p class="text-slate-400 text-sm mt-2">AI Developer & IT Manager</p></div>
                    @endif
                </div>
                <div class="absolute -top-4 -right-4 glass border border-indigo-500/30 rounded-2xl px-3 py-2 text-center animate-float z-20"><p class="text-2xl font-black gradient-text">50+</p><p class="text-xs text-slate-400">Projects</p></div>
                <div class="absolute -bottom-4 -left-4 glass border border-purple-500/30 rounded-2xl px-3 py-2 text-center animate-float z-20" style="animation-delay:2s"><p class="text-2xl font-black text-purple-400">8+</p><p class="text-xs text-slate-400">Years Exp.</p></div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1 text-slate-600">
        <span class="text-xs">Scroll</span>
        <div class="w-0.5 h-8 bg-gradient-to-b from-indigo-500 to-transparent animate-pulse"></div>
    </div>
</section>

{{-- 2. ABOUT --}}
<section id="about" class="py-24 bg-slate-900">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="grid grid-cols-2 gap-6">
                @php $aboutStats=[['n'=>'8+','l'=>'Years of Experience','c'=>'from-indigo-600 to-purple-600','e'=>'🚀'],['n'=>'50+','l'=>'Projects Delivered','c'=>'from-purple-600 to-pink-600','e'=>'💻'],['n'=>'15+','l'=>'Developers Mentored','c'=>'from-cyan-600 to-blue-600','e'=>'👥'],['n'=>'4+','l'=>'Countries Served','c'=>'from-emerald-600 to-teal-600','e'=>'🌍']]; @endphp
                @foreach($aboutStats as $s)
                    <div class="glass rounded-2xl p-6 border border-slate-700/50 hover:border-indigo-500/50 transition-colors">
                        <div class="text-3xl mb-2">{{ $s['e'] }}</div>
                        <div class="text-4xl font-black bg-gradient-to-r {{ $s['c'] }} bg-clip-text text-transparent">{{ $s['n'] }}</div>
                        <p class="text-sm text-slate-400 mt-1">{{ $s['l'] }}</p>
                    </div>
                @endforeach
                <div class="col-span-2 glass rounded-2xl p-6 border border-slate-700/50">
                    <p class="text-xs text-slate-500 mb-3 uppercase tracking-widest">Clients Worldwide</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['🇮🇳 India','🇲🇾 Malaysia','🇺🇸 USA','🇸🇬 Singapore','🌐 International'] as $c)
                            <span class="px-3 py-1.5 rounded-full bg-slate-800 border border-slate-700 text-sm text-slate-300">{{ $c }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <div>
                    <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-2">About Me</p>
                    <h2 class="text-4xl lg:text-5xl font-black text-white">Turning Ideas Into<br><span class="gradient-text">Digital Reality</span></h2>
                </div>
                <p class="text-slate-400 leading-relaxed">I'm <strong class="text-white">Aniket Namdeo</strong>, a seasoned <strong class="text-indigo-400">AI Developer & IT Manager</strong> with over 8 years of hands-on experience building enterprise-grade software. I specialize in AI solutions, full-stack development, and leading high-performance engineering teams.</p>
                <p class="text-slate-400 leading-relaxed">From architecting scalable microservices to delivering AI-powered applications, I bring deep technical expertise combined with strong project management skills. I've led teams of 15+ developers for international clients across <strong class="text-white">India, Malaysia, USA, and Singapore</strong>.</p>
                @php $highlights=['Expert in AI/ML, Laravel, React.js & Next.js development','Proven track record managing remote teams of 15+ developers','Delivered 50+ projects across web, mobile & enterprise systems','International client experience across 4+ countries']; @endphp
                <div class="space-y-3">
                    @foreach($highlights as $item)
                        <div class="flex items-start gap-3">
                            <div class="w-5 h-5 rounded-full bg-indigo-600/20 border border-indigo-500/50 flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-3 h-3 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <p class="text-slate-300 text-sm">{{ $item }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#contact" class="px-6 py-3 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold text-sm hover:from-indigo-500 hover:to-purple-500 transition-all hover:scale-105">Let's Work Together</a>
                    <a href="#projects" class="px-6 py-3 rounded-full glass border border-slate-600 text-slate-300 font-semibold text-sm hover:border-indigo-500/50 hover:text-white transition-all">See My Work</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 3. SKILLS --}}
<section id="skills" class="py-24 bg-slate-950">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-2">Expertise</p>
            <h2 class="text-4xl lg:text-5xl font-black text-white">My <span class="gradient-text">Skills</span></h2>
            <p class="mt-4 text-slate-400 max-w-2xl mx-auto">A diverse skill set spanning AI development, modern web frameworks, and technical leadership.</p>
        </div>
        @php
        $displaySkills = $skills->isNotEmpty() ? $skills->map(fn($s)=>['name'=>$s->name,'pct'=>$s->percentage,'color'=>$s->color??'#6366f1'])->toArray()
            : [['name'=>'AI Development','pct'=>92,'color'=>'#6366f1'],['name'=>'Laravel / PHP','pct'=>95,'color'=>'#f43f5e'],['name'=>'React.js','pct'=>88,'color'=>'#06b6d4'],['name'=>'Next.js','pct'=>85,'color'=>'#64748b'],['name'=>'System Architecture','pct'=>90,'color'=>'#8b5cf6'],['name'=>'IT Management','pct'=>93,'color'=>'#10b981'],['name'=>'Team Leadership','pct'=>95,'color'=>'#f59e0b'],['name'=>'Full Stack Dev','pct'=>91,'color'=>'#3b82f6']];
        @endphp
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto"
             x-data="{animated:false}"
             x-intersect.once="if(!animated){animated=true;$el.querySelectorAll('.skill-bar').forEach(b=>{setTimeout(()=>{b.style.width=b.dataset.target+'%'},100)})}">
            @foreach($displaySkills as $skill)
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-medium text-white text-sm">{{ $skill['name'] }}</span>
                        <span class="text-sm font-bold" style="color:{{ $skill['color'] }}">{{ $skill['pct'] }}%</span>
                    </div>
                    <div class="h-2 bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full rounded-full skill-bar w-0" style="background:linear-gradient(90deg,{{ $skill['color'] }},{{ $skill['color'] }}80)" data-target="{{ $skill['pct'] }}"></div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-20">
            <p class="text-center text-slate-500 text-sm mb-8 uppercase tracking-widest">Technologies I Work With</p>
            <div class="flex flex-wrap justify-center gap-4">
                @php $techs=[['n'=>'Laravel','c'=>'text-red-400'],['n'=>'React','c'=>'text-cyan-400'],['n'=>'Next.js','c'=>'text-white'],['n'=>'Python','c'=>'text-blue-400'],['n'=>'OpenAI','c'=>'text-emerald-400'],['n'=>'MySQL','c'=>'text-orange-400'],['n'=>'Docker','c'=>'text-blue-400'],['n'=>'AWS','c'=>'text-amber-400'],['n'=>'TailwindCSS','c'=>'text-teal-400'],['n'=>'Node.js','c'=>'text-green-400']]; @endphp
                @foreach($techs as $t)
                    <div class="px-5 py-3 rounded-xl glass border border-slate-700/50 hover:border-indigo-500/50 transition-all duration-300 hover:scale-105">
                        <span class="{{ $t['c'] }} font-medium text-sm">{{ $t['n'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- 4. PROJECTS --}}
<section id="projects" class="py-24 bg-slate-900">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-2">Portfolio</p>
            <h2 class="text-4xl lg:text-5xl font-black text-white">Featured <span class="gradient-text">Projects</span></h2>
            <p class="mt-4 text-slate-400 max-w-2xl mx-auto">A selection of projects I've built — from AI-powered applications to enterprise systems.</p>
        </div>
        <div x-data="{active:'all'}">
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                @foreach(['all'=>'All Projects','ai'=>'AI','web'=>'Web Dev','enterprise'=>'Enterprise'] as $k=>$l)
                    <button @click="active='{{ $k }}'"
                            :class="active==='{{ $k }}' ? 'bg-indigo-600 text-white border-indigo-600' : 'glass border-slate-700 text-slate-400 hover:border-indigo-500/50 hover:text-white'"
                            class="px-5 py-2.5 rounded-full text-sm font-medium border transition-all duration-300">{{ $l }}</button>
                @endforeach
            </div>
            @if($projects->isNotEmpty())
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($projects as $project)
                        <div class="group glass rounded-2xl overflow-hidden border border-slate-700/50 hover:border-indigo-500/50 transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-indigo-500/10"
                             x-show="active==='all' || active==='{{ $project->category }}'">
                            <div class="relative h-48 bg-gradient-to-br from-indigo-900/50 to-purple-900/50 overflow-hidden">
                                @if($project->image)
                                    <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy">
                                @else
                                    <div class="w-full h-full flex items-center justify-center"><span class="text-6xl opacity-30">{{ $project->category==='ai'?'🤖':($project->category==='enterprise'?'🏢':'💻') }}</span></div>
                                @endif
                                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-900/80 text-indigo-400 border border-indigo-500/30">{{ ucfirst($project->category) }}</span>
                                @if($project->client_country)<span class="absolute top-3 right-3 px-2.5 py-1 rounded-full text-xs bg-slate-900/80 text-slate-400 border border-slate-700/50">{{ $project->client_country }}</span>@endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-white group-hover:text-indigo-400 transition-colors">{{ $project->title }}</h3>
                                <p class="mt-2 text-sm text-slate-400 leading-relaxed line-clamp-2">{{ $project->description }}</p>
                                <div class="mt-4 flex flex-wrap gap-1.5">
                                    @foreach(array_slice(explode(',',$project->technology),0,4) as $tech)
                                        <span class="px-2.5 py-1 rounded-full text-xs bg-indigo-950 border border-indigo-800 text-indigo-400">{{ trim($tech) }}</span>
                                    @endforeach
                                </div>
                                <div class="mt-5 flex items-center gap-3">
                                    @if($project->project_url)<a href="{{ $project->project_url }}" target="_blank" class="flex items-center gap-1.5 text-sm text-indigo-400 hover:text-indigo-300 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>Live Demo</a>@endif
                                    @if($project->github_url)<a href="{{ $project->github_url }}" target="_blank" class="flex items-center gap-1.5 text-sm text-slate-500 hover:text-slate-300 transition-colors"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.2 11.37.6.11.82-.26.82-.57v-2c-3.34.72-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.74-1.33-1.74-1.09-.74.08-.73.08-.73 1.2.09 1.84 1.24 1.84 1.24 1.07 1.83 2.8 1.3 3.49 1 .1-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.12-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 016 0c2.3-1.55 3.3-1.23 3.3-1.23.66 1.66.24 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.8 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.69.83.57C20.56 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg>GitHub</a>@endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 text-slate-600"><div class="text-6xl mb-4">🚀</div><p class="text-lg">Projects coming soon!</p></div>
            @endif
        </div>
    </div>
</section>

{{-- 5. CLIENT COUNTRIES --}}
<section id="clients-globe" class="py-24 bg-slate-950">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-2">Global Reach</p>
            <h2 class="text-4xl lg:text-5xl font-black text-white">Clients <span class="gradient-text">Worldwide</span></h2>
        </div>
        @php $countries=[['flag'=>'🇮🇳','name'=>'India','projects'=>'20+','border'=>'border-orange-500/30'],['flag'=>'🇲🇾','name'=>'Malaysia','projects'=>'10+','border'=>'border-blue-500/30'],['flag'=>'🇺🇸','name'=>'USA','projects'=>'8+','border'=>'border-red-500/30'],['flag'=>'🇸🇬','name'=>'Singapore','projects'=>'7+','border'=>'border-red-500/30'],['flag'=>'🌐','name'=>'International','projects'=>'5+','border'=>'border-indigo-500/30']]; @endphp
        <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-6">
            @foreach($countries as $c)
                <div class="glass rounded-2xl p-6 text-center border {{ $c['border'] }} hover:scale-105 transition-all duration-300 hover:shadow-xl group">
                    <div class="text-5xl mb-3 group-hover:scale-110 transition-transform">{{ $c['flag'] }}</div>
                    <h3 class="font-bold text-white text-lg">{{ $c['name'] }}</h3>
                    <p class="text-indigo-400 font-bold text-xl mt-1">{{ $c['projects'] }}</p>
                    <p class="text-slate-500 text-xs mt-0.5">Projects</p>
                </div>
            @endforeach
        </div>
        @if($clients->isNotEmpty())
            <div class="mt-16 text-center">
                <p class="text-slate-500 text-sm uppercase tracking-widest mb-8">Partner Companies</p>
                <div class="flex flex-wrap justify-center gap-4">
                    @foreach($clients as $client)
                        <div class="glass border border-slate-700/50 hover:border-indigo-500/50 rounded-xl px-5 py-3 transition-all hover:scale-105">
                            <span class="text-slate-300 text-sm font-medium">{{ $client->flag_emoji ?? '🏢' }} {{ $client->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

{{-- 6. SERVICES --}}
<section id="services" class="py-24 bg-slate-900">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-2">What I Do</p>
            <h2 class="text-4xl lg:text-5xl font-black text-white">My <span class="gradient-text">Services</span></h2>
        </div>
        @php
        $displayServices = $services->isNotEmpty() ? $services : collect([
            (object)['icon'=>'🤖','title'=>'AI Solutions Development','description'=>'Custom AI/ML models, chatbots, LLM integrations and automation systems for forward-thinking businesses.'],
            (object)['icon'=>'🌐','title'=>'Custom Web Applications','description'=>'Full-stack web apps using Laravel, React & Next.js with modern UI and optimized database architecture.'],
            (object)['icon'=>'🏢','title'=>'Enterprise Software','description'=>'Scalable enterprise systems: ERP, CRM, and custom business platforms for medium to large teams.'],
            (object)['icon'=>'👥','title'=>'IT Team Management','description'=>'Building and leading high-performance dev teams — sprint planning, code reviews, and delivery management.'],
            (object)['icon'=>'🚀','title'=>'Startup MVP Development','description'=>'Rapid MVP development to validate ideas fast — from concept to launch-ready product in weeks.'],
            (object)['icon'=>'🔒','title'=>'Architecture & Consulting','description'=>'Expert consulting on tech stack, scalable architecture design, security best practices, and code audits.'],
        ]);
        @endphp
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($displayServices as $s)
                <div class="group glass rounded-2xl p-8 border border-slate-700/50 hover:border-indigo-500/50 transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-indigo-500/10">
                    <div class="text-3xl mb-5 group-hover:scale-110 transition-transform">{{ $s->icon ?? '⚡' }}</div>
                    <h3 class="text-xl font-bold text-white group-hover:text-indigo-400 transition-colors">{{ $s->title }}</h3>
                    <p class="mt-3 text-slate-400 leading-relaxed text-sm">{{ $s->description }}</p>
                    <div class="mt-6 flex items-center gap-2 text-indigo-400 text-sm font-medium group-hover:gap-3 transition-all">
                        <span>Learn More</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 7. TESTIMONIALS --}}
@if($testimonials->isNotEmpty())
<section id="testimonials" class="py-24 bg-slate-950">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-2">Social Proof</p>
            <h2 class="text-4xl lg:text-5xl font-black text-white">Client <span class="gradient-text">Reviews</span></h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials as $t)
                <div class="glass rounded-2xl p-6 border border-slate-700/50 hover:border-indigo-500/30 transition-all duration-300">
                    <div class="flex gap-1 mb-4">
                        @for($s=1;$s<=5;$s++)<svg class="w-4 h-4 {{ $s<=$t->rating?'text-yellow-400':'text-slate-700' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor
                    </div>
                    <p class="text-slate-300 text-sm leading-relaxed italic">"{{ $t->message }}"</p>
                    <div class="mt-5 flex items-center gap-3">
                        @if($t->avatar)
                            <img src="{{ Storage::url($t->avatar) }}" alt="{{ $t->name }}" class="w-10 h-10 rounded-full object-cover">
                        @else
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center text-white font-bold text-sm">{{ substr($t->name,0,1) }}</div>
                        @endif
                        <div>
                            <p class="font-semibold text-white text-sm">{{ $t->name }}</p>
                            <p class="text-xs text-slate-500">{{ $t->position }}{{ $t->company?', '.$t->company:'' }}{{ $t->country?' — '.$t->country:'' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- 8. BLOG --}}
@if($blogs->isNotEmpty())
<section id="blog" class="py-24 bg-slate-900">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12">
            <div>
                <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-2">Thoughts</p>
                <h2 class="text-4xl lg:text-5xl font-black text-white">Latest <span class="gradient-text">Articles</span></h2>
            </div>
            <a href="{{ route('blog.index') }}" class="flex items-center gap-2 text-sm text-indigo-400 hover:text-indigo-300 transition-colors shrink-0">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($blogs as $blog)
                <article class="group glass rounded-2xl overflow-hidden border border-slate-700/50 hover:border-indigo-500/50 transition-all duration-300 hover:scale-[1.02]">
                    <div class="h-48 {{ $blog->image ? 'overflow-hidden' : 'bg-gradient-to-br from-indigo-900/50 to-purple-900/50 flex items-center justify-center' }}">
                        @if($blog->image)
                            <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy">
                        @else
                            <span class="text-5xl opacity-30">📝</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-slate-500 mb-3">
                            <span class="px-2.5 py-1 rounded-full bg-indigo-950 border border-indigo-800 text-indigo-400">{{ ucfirst($blog->category??'Tech') }}</span>
                            <span>{{ $blog->reading_time }}</span>
                            @if($blog->published_at)<span>{{ $blog->published_at->format('M d, Y') }}</span>@endif
                        </div>
                        <h3 class="font-bold text-white text-lg group-hover:text-indigo-400 transition-colors line-clamp-2">{{ $blog->title }}</h3>
                        <p class="mt-2 text-slate-400 text-sm line-clamp-2">{{ $blog->excerpt }}</p>
                        <a href="{{ route('blog.show',$blog->slug) }}" class="mt-4 inline-flex items-center gap-2 text-sm text-indigo-400 hover:text-indigo-300 font-medium group-hover:gap-3 transition-all">
                            Read More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- 9. CONTACT --}}
<section id="contact" class="py-24 bg-slate-950 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute bottom-0 left-1/4 w-96 h-96 rounded-full bg-indigo-600/10 blur-3xl"></div>
        <div class="absolute top-0 right-1/4 w-96 h-96 rounded-full bg-purple-600/10 blur-3xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <p class="text-indigo-400 text-sm font-semibold uppercase tracking-widest mb-2">Get In Touch</p>
            <h2 class="text-4xl lg:text-5xl font-black text-white">Let's <span class="gradient-text">Work Together</span></h2>
            <p class="mt-4 text-slate-400 max-w-xl mx-auto">Ready to build something amazing? I'm currently available for new projects.</p>
        </div>
        <div class="grid lg:grid-cols-5 gap-12 max-w-5xl mx-auto">
            <div class="lg:col-span-2 space-y-4">
                @php
                $contactItems = [
                    ['icon'=>'📧','label'=>'Email','value'=>$settings['email'] ?? 'aninamdeo@gmail.com','href'=>'mailto:'.($settings['email'] ?? 'aninamdeo@gmail.com')],
                    ['icon'=>'📞','label'=>'Phone','value'=>$settings['phone'] ?? '','href'=>'tel:'.($settings['phone'] ?? '')],
                    ['icon'=>'💼','label'=>'LinkedIn','value'=>'linkedin.com/in/aniket-namdeo-84249580','href'=>$settings['linkedin_url'] ?? 'https://www.linkedin.com/in/aniket-namdeo-84249580'],
                    ['icon'=>'🐙','label'=>'GitHub','value'=>'github.com/aninamdeo','href'=>$settings['github_url'] ?? 'https://github.com/aninamdeo'],
                    ['icon'=>'👤','label'=>'Facebook','value'=>'facebook.com/ani.namdeo','href'=>$settings['facebook_url'] ?? 'https://www.facebook.com/ani.namdeo'],
                    ['icon'=>'📍','label'=>'Location','value'=>$settings['location'] ?? 'Bhopal, MP, India','href'=>null],
                ];
                @endphp
                @foreach($contactItems as $info)
                    @if($info['value'])
                    <div class="flex items-start gap-4 glass rounded-xl p-4 border border-slate-700/50 hover:border-indigo-500/30 transition-colors">
                        <span class="text-2xl mt-0.5">{{ $info['icon'] }}</span>
                        <div>
                            <p class="text-xs text-slate-500 uppercase tracking-wide">{{ $info['label'] }}</p>
                            @if($info['href'])<a href="{{ $info['href'] }}" target="{{ str_starts_with($info['href'],'http') ? '_blank' : '_self' }}" class="text-slate-300 hover:text-indigo-400 transition-colors text-sm break-all">{{ $info['value'] }}</a>@else<p class="text-slate-300 text-sm">{{ $info['value'] }}</p>@endif
                        </div>
                    </div>
                    @endif
                @endforeach
                <div class="glass rounded-xl p-5 border border-indigo-500/30 bg-indigo-950/30">
                    <p class="text-sm text-indigo-300 font-medium">⚡ Quick Response</p>
                    <p class="text-xs text-slate-400 mt-1">I typically respond within 24 hours on business days.</p>
                </div>
            </div>
            <div class="lg:col-span-3">
                @if(session('success'))
                    <div class="mb-6 flex items-center gap-3 p-4 rounded-xl bg-green-950 border border-green-700/50 text-green-300 text-sm">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('contact.store') }}" method="POST" class="glass rounded-2xl p-8 border border-slate-700/50 space-y-5">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm text-slate-400 mb-1.5">Your Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="John Doe" class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white text-sm placeholder-slate-600 focus:outline-none focus:border-indigo-500 transition-colors">
                            @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm text-slate-400 mb-1.5">Email Address *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="john@example.com" class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white text-sm placeholder-slate-600 focus:outline-none focus:border-indigo-500 transition-colors">
                            @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm text-slate-400 mb-1.5">Budget Range</label>
                            <select name="budget" class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white text-sm focus:outline-none focus:border-indigo-500 transition-colors">
                                <option value="" class="bg-slate-800">Select budget...</option>
                                <option value="Under $1K" class="bg-slate-800">Under $1,000</option>
                                <option value="$1K-$5K"   class="bg-slate-800">$1,000 – $5,000</option>
                                <option value="$5K-$15K"  class="bg-slate-800">$5,000 – $15,000</option>
                                <option value="$15K+"     class="bg-slate-800">$15,000+</option>
                                <option value="Discuss"   class="bg-slate-800">Let's Discuss</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm text-slate-400 mb-1.5">Subject</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Project inquiry" class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white text-sm placeholder-slate-600 focus:outline-none focus:border-indigo-500 transition-colors">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-slate-400 mb-1.5">Your Message *</label>
                        <textarea name="message" rows="5" required placeholder="Tell me about your project..." class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white text-sm placeholder-slate-600 focus:outline-none focus:border-indigo-500 transition-colors resize-none">{{ old('message') }}</textarea>
                        @error('message')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold hover:from-indigo-500 hover:to-purple-500 transition-all duration-300 hover:scale-[1.02] shadow-2xl shadow-indigo-500/30 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer class="bg-slate-900 border-t border-slate-800 py-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-600 to-purple-600 flex items-center justify-center text-white font-black text-xs">AN</span>
                <span class="font-bold text-white">Aniket Namdeo</span>
            </div>
            {{-- Social Links --}}
            <div class="flex items-center gap-4">
                @if(!empty($settings['linkedin_url']))
                <a href="{{ $settings['linkedin_url'] }}" target="_blank" title="LinkedIn"
                   class="w-9 h-9 rounded-lg bg-slate-800 border border-slate-700 hover:border-indigo-500/50 hover:bg-indigo-600/20 flex items-center justify-center text-slate-400 hover:text-indigo-400 transition-all">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
                @endif
                @if(!empty($settings['github_url']))
                <a href="{{ $settings['github_url'] }}" target="_blank" title="GitHub"
                   class="w-9 h-9 rounded-lg bg-slate-800 border border-slate-700 hover:border-indigo-500/50 hover:bg-indigo-600/20 flex items-center justify-center text-slate-400 hover:text-indigo-400 transition-all">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.2 11.37.6.11.82-.26.82-.57v-2c-3.34.72-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.74-1.33-1.74-1.09-.74.08-.73.08-.73 1.2.09 1.84 1.24 1.84 1.24 1.07 1.83 2.8 1.3 3.49 1 .1-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.12-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 016 0c2.3-1.55 3.3-1.23 3.3-1.23.66 1.66.24 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.8 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.69.83.57C20.56 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg>
                </a>
                @endif
                @if(!empty($settings['facebook_url']))
                <a href="{{ $settings['facebook_url'] }}" target="_blank" title="Facebook"
                   class="w-9 h-9 rounded-lg bg-slate-800 border border-slate-700 hover:border-blue-500/50 hover:bg-blue-600/20 flex items-center justify-center text-slate-400 hover:text-blue-400 transition-all">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                @endif
            </div>
            <div class="flex items-center gap-4 text-slate-500 text-sm">
                <a href="{{ route('blog.index') }}" class="hover:text-indigo-400 transition-colors">Blog</a>
                <a href="#contact" class="hover:text-indigo-400 transition-colors">Contact</a>
            </div>
        </div>
        <p class="text-center text-xs text-slate-600 mt-6">© {{ date('Y') }} Aniket Namdeo. Built with Laravel & TailwindCSS.</p>
    </div>
</footer>

{{-- AI CHATBOT WIDGET --}}
<div x-data="{open:false,input:'',loading:false,mid:0,msgs:[{id:0,role:'assistant',text:'Hi! I am Aniket\'s virtual assistant. Ask me about his services, experience, or how to get in touch!'}]}" class="fixed bottom-6 right-6 z-50">
    <div x-show="open" x-transition class="absolute bottom-16 right-0 w-80 glass rounded-2xl border border-indigo-500/30 overflow-hidden shadow-2xl shadow-indigo-500/20">
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-4 flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center"><span class="text-sm">🤖</span></div>
            <div>
                <p class="text-white font-semibold text-sm">Aniket's Assistant</p>
                <p class="text-indigo-200 text-xs flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>Online</p>
            </div>
            <button @click="open=false" class="ml-auto text-white/60 hover:text-white"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
        <div class="h-72 overflow-y-auto p-4 space-y-3 bg-slate-900/90" x-ref="chatbox">
            <template x-for="m in msgs" :key="m.id">
                <div :class="m.role==='user'?'flex justify-end':'flex justify-start'">
                    <div :class="m.role==='user'?'bg-indigo-600 text-white rounded-2xl rounded-br-none max-w-xs px-3 py-2 text-sm':'bg-slate-800 text-slate-200 rounded-2xl rounded-bl-none max-w-xs px-3 py-2 text-sm'" x-text="m.text"></div>
                </div>
            </template>
            <div x-show="loading" class="flex justify-start"><div class="bg-slate-800 rounded-2xl rounded-bl-none px-4 py-3 flex gap-1.5"><span class="w-2 h-2 rounded-full bg-indigo-400 animate-bounce" style="animation-delay:0ms"></span><span class="w-2 h-2 rounded-full bg-indigo-400 animate-bounce" style="animation-delay:150ms"></span><span class="w-2 h-2 rounded-full bg-indigo-400 animate-bounce" style="animation-delay:300ms"></span></div></div>
        </div>
        <div class="p-3 bg-slate-900/90 border-t border-slate-800 flex gap-2">
            <input x-model="input" @keydown.enter="
                if(!input.trim()||loading) return;
                const t=input.trim(); msgs.push({id:++mid,role:'user',text:t}); input=''; loading=true;
                $nextTick(()=>{ $refs.chatbox.scrollTop=$refs.chatbox.scrollHeight });
                fetch('{{ route('chatbot.chat') }}',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':document.querySelector('[name=csrf-token]').content},body:JSON.stringify({message:t})})
                    .then(r=>r.json()).then(d=>{msgs.push({id:++mid,role:'assistant',text:d.response});loading=false;$nextTick(()=>{ $refs.chatbox.scrollTop=$refs.chatbox.scrollHeight })})
                    .catch(()=>{msgs.push({id:++mid,role:'assistant',text:'Sorry, please try again.'});loading=false})
            " type="text" placeholder="Ask anything..." class="flex-1 px-3 py-2 rounded-lg bg-slate-800 border border-slate-700 text-white text-sm placeholder-slate-500 focus:outline-none focus:border-indigo-500">
            <button @click="
                if(!input.trim()||loading) return;
                const t=input.trim(); msgs.push({id:++mid,role:'user',text:t}); input=''; loading=true;
                $nextTick(()=>{ $refs.chatbox.scrollTop=$refs.chatbox.scrollHeight });
                fetch('{{ route('chatbot.chat') }}',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':document.querySelector('[name=csrf-token]').content},body:JSON.stringify({message:t})})
                    .then(r=>r.json()).then(d=>{msgs.push({id:++mid,role:'assistant',text:d.response});loading=false;$nextTick(()=>{ $refs.chatbox.scrollTop=$refs.chatbox.scrollHeight })})
                    .catch(()=>{msgs.push({id:++mid,role:'assistant',text:'Sorry, please try again.'});loading=false})
            " class="px-3 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-500 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
            </button>
        </div>
    </div>
    <button @click="open=!open" class="w-14 h-14 rounded-full bg-gradient-to-br from-indigo-600 to-purple-600 shadow-2xl shadow-indigo-500/40 hover:scale-110 transition-all duration-300 flex items-center justify-center relative">
        <span x-show="!open" class="text-2xl">🤖</span>
        <svg x-show="open" class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        <span class="absolute -top-0.5 -right-0.5 w-3.5 h-3.5 rounded-full bg-green-400 border-2 border-slate-950 animate-pulse"></span>
    </button>
</div>

@endsection
