<x-layout>
    <x-page-heading>Results</x-page-heading>

    <div class="space-y-6">
        @foreach($jobs as $job)
            <x-job-card-wide :$job />
        @endforeach
    </div>

    @if(method_exists($jobs, 'hasPages') && $jobs->hasPages())
        <div class="mt-8">
            {{ $jobs->links('components.pagination') }}
        </div>
    @endif
</x-layout>
