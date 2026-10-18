<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <x-page-heading>Salary Insights</x-page-heading>
            <p class="text-gray-400 max-w-xl mx-auto">Explore salary ranges across roles and levels in the tech industry. Data updated regularly.</p>
        </section>

        {{-- Salary Ranges --}}
        <section>
            <x-section-heading>Salary By Level</x-section-heading>

            <div class="grid lg:grid-cols-5 gap-6 mt-6">
                @foreach($salaryRanges as $range)
                    <x-panel class="text-center flex flex-col gap-y-3">
                        <p class="text-sm text-gray-400 font-medium">{{ $range['label'] }}</p>
                        <p class="font-bold text-lg">{{ $range['range'] }}</p>
                        <p class="text-sm text-gray-400">{{ $range['count'] }} jobs</p>
                    </x-panel>
                @endforeach
            </div>
        </section>

        {{-- Top Job Titles with Salary --}}
        <section>
            <x-section-heading>Average Salary by Role</x-section-heading>

            <div class="mt-6 space-y-4">
                @foreach($topJobTitles as $item)
                    <x-panel class="flex items-center justify-between gap-x-6">
                        <div class="flex-1">
                            <h3 class="font-bold text-lg group-hover:text-blue-800 transition-colors duration-300">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-sm text-gray-400 mt-1">Range: {{ $item['low'] }} – {{ $item['high'] }}</p>
                        </div>

                        <div class="text-right shrink-0">
                            <p class="text-2xl font-bold">{{ $item['avg'] }}</p>
                            <p class="text-xs text-gray-400">avg / year</p>
                        </div>
                    </x-panel>
                @endforeach
            </div>
        </section>

        {{-- Browse by Tag --}}
        <section>
            <x-section-heading>Browse by Skill</x-section-heading>
            <div class="mt-6 space-x-1">
                @foreach($tags as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
