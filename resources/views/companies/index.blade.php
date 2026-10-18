<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <x-page-heading>Companies</x-page-heading>
            <p class="text-gray-400 max-w-xl mx-auto">Discover top companies hiring right now. Browse their open positions and learn more about them.</p>
        </section>

        @if($companies->isEmpty())
            <x-panel class="text-center py-16">
                <p class="text-gray-400 text-lg">No companies found yet. Check back soon!</p>
            </x-panel>
        @else
            <section>
                <x-section-heading>All Companies ({{ $companies->count() }})</x-section-heading>

                <div class="mt-6 space-y-6">
                    @foreach($companies as $company)
                        <x-panel class="flex gap-x-6 items-start">
                            {{-- Logo --}}
                            <div class="shrink-0">
                                <x-employer-logo :employer="$company" />
                            </div>

                            {{-- Company Info --}}
                            <div class="flex-1">
                                <div class="flex items-center justify-between gap-x-4">
                                    <h2 class="font-bold text-2xl group-hover:text-blue-800 transition-colors duration-300">
                                        {{ $company->name }}
                                    </h2>
                                    <span class="text-sm text-gray-400 shrink-0">
                                        {{ $company->jobs_count }} {{ Str::plural('job', $company->jobs_count) }} open
                                    </span>
                                </div>

                                {{-- Recent Jobs --}}
                                @if($company->jobs->isNotEmpty())
                                    <div class="mt-4 space-y-2">
                                        @foreach($company->jobs as $job)
                                            <div class="flex items-center justify-between text-sm">
                                                <a href="{{ $job->url }}" target="_blank"
                                                   class="text-white hover:text-blue-400 transition-colors duration-200 font-medium">
                                                    {{ $job->title }}
                                                </a>
                                                <div class="flex items-center gap-x-4 text-gray-400">
                                                    <span>{{ $job->salary }}</span>
                                                    <span>{{ $job->schedule }}</span>
                                                    <span>{{ $job->location }}</span>
                                                </div>
                                            </div>
                                        @endforeach

                                        @if($company->jobs_count > 3)
                                            <p class="text-sm text-gray-500 mt-2">
                                                +{{ $company->jobs_count - 3 }} more {{ Str::plural('position', $company->jobs_count - 3) }}
                                            </p>
                                        @endif
                                    </div>
                                @else
                                    <p class="text-sm text-gray-500 mt-2">No open positions at the moment.</p>
                                @endif
                            </div>
                        </x-panel>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</x-layout>
