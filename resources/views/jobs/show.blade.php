<x-layout>
    <div class="space-y-6">
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-x-2 text-sm text-gray-400">
            <a href="/" class="hover:text-white transition-colors">Jobs</a>
            <span>/</span>
            <span class="text-white">{{ $job->title }}</span>
        </div>

        {{-- Job Header --}}
        <x-panel class="flex gap-x-6 items-start">
            <div class="shrink-0">
                <x-employer-logo :employer="$job->employer" />
            </div>

            <div class="flex-1">
                <div class="flex items-start justify-between gap-x-4">
                    <div>
                        <a href="#" class="text-sm text-gray-400 hover:text-white transition-colors">
                            {{ $job->employer->name }}
                        </a>
                        <h1 class="font-bold text-3xl mt-1">{{ $job->title }}</h1>
                    </div>

                    @auth
                        @can('update', $job)
                            <div class="flex items-center gap-x-3 shrink-0">
                                <a href="/jobs/{{ $job->id }}/edit"
                                   class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20 text-sm font-bold transition-colors duration-200">
                                    ✏️ Edit Job
                                </a>

                                <form method="POST" action="/jobs/{{ $job->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-4 py-2 rounded-xl bg-red-600/30 hover:bg-red-600/60 text-sm font-bold text-red-300 hover:text-white transition-colors duration-200">
                                        🗑 Delete
                                    </button>
                                </form>
                            </div>
                        @endcan
                    @endauth
                </div>

                {{-- Meta Info --}}
                <div class="flex flex-wrap gap-x-6 gap-y-2 mt-4 text-sm text-gray-400">
                    <span>💰 {{ $job->salary }}</span>
                    <span>📍 {{ $job->location }}</span>
                    <span>🕐 {{ $job->schedule }}</span>
                    <span>🗓 Posted {{ $job->created_at->diffForHumans() }}</span>
                </div>

                {{-- Tags --}}
                @if($job->tags->isNotEmpty())
                    <div class="mt-5 space-x-1">
                        @foreach($job->tags as $tag)
                            <x-tag :$tag />
                        @endforeach
                    </div>
                @endif
            </div>
        </x-panel>

        {{-- Apply Button --}}
        <div class="text-center">
            <a href="{{ $job->url }}" target="_blank"
               class="inline-block px-10 py-4 bg-blue-700 hover:bg-blue-600 font-bold rounded-xl transition-colors duration-200">
                Apply for This Job →
            </a>
        </div>
    </div>
</x-layout>
