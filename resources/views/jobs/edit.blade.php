<x-layout>
    <x-page-heading>Edit Job</x-page-heading>

    <x-forms.form method="PATCH" action="/jobs/{{ $job->id }}">
        <x-forms.input
            label="Title"
            name="title"
            placeholder="CEO"
            :value="old('title', $job->title)"
        />

        <x-forms.input
            label="Salary"
            name="salary"
            placeholder="$90,000 USD"
            :value="old('salary', $job->salary)"
        />

        <x-forms.input
            label="Location"
            name="location"
            placeholder="Winter Park, Florida"
            :value="old('location', $job->location)"
        />

        <x-forms.select label="Schedule" name="schedule">
            <option value="Part Time" @selected(old('schedule', $job->schedule) === 'Part Time')>Part Time</option>
            <option value="Full Time" @selected(old('schedule', $job->schedule) === 'Full Time')>Full Time</option>
        </x-forms.select>

        <x-forms.input
            label="URL"
            name="url"
            placeholder="https://acme.com/jobs/ceo-wanted"
            :value="old('url', $job->url)"
        />

        <x-forms.checkbox
            label="Feature (Costs Extra)"
            name="featured"
            :checked="old('featured', $job->featured)"
        />

        <x-forms.divider />

        <x-forms.input
            label="Tags (comma separated)"
            name="tags"
            placeholder="laravel, php, remote"
            :value="old('tags', $job->tags->pluck('name')->join(', '))"
        />

        <div class="flex items-center justify-between">
            <x-forms.button>Save Changes</x-forms.button>

            <a href="/jobs/{{ $job->id }}"
               class="text-sm text-gray-400 hover:text-white transition-colors">
                Cancel
            </a>
        </div>
    </x-forms.form>
</x-layout>
