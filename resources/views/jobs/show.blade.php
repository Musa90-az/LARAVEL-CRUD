<x-layout>
    <x-slot:heading>Job</x-slot:heading>

    @if (!$job)
        {{ abort(404) }}
    @endif

    <h1  class="font-bold text-lg">{{ $job['title'] }}</h1>
    <p>{{ $job['salary'] }}</p>
    @can('edit', $job)
    <p class="mt-6">
    <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    </p>
        
    @endcan

</x-layout>


 