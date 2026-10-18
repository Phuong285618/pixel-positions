@props(['method' => 'GET'])

<form {{ $attributes->except('method') }} method="{{ strtoupper($method) === 'GET' ? 'GET' : 'POST' }}" class="max-w-2xl mx-auto space-y-6">
    @if (strtoupper($method) !== 'GET')
        @csrf
        @if (strtoupper($method) !== 'POST')
            @method($method)
        @endif
    @endif

    {{ $slot }}
</form>
