<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard</h2>
    </x-slot>
    <div class="py-6 max-w-5xl mx-auto">
        <div class="grid grid-cols-2 gap-6">
            <div class="bg-white shadow rounded p-6 flex flex-col items-center">
                <div class="text-3xl font-bold text-blue-600">{{ $tasksCount }}</div>
                <div class="mt-2 text-lg">Total Tasks</div>
                <a href="{{ route('tasks.index') }}" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">View Tasks</a>
            </div>
            <div class="bg-white shadow rounded p-6 flex flex-col items-center">
                <div class="text-3xl font-bold text-green-600">{{ $meetingsCount }}</div>
                <div class="mt-2 text-lg">Total Meetings</div>
                <a href="{{ route('meetings.index') }}" class="mt-4 bg-green-600 text-white px-4 py-2 rounded">View Meetings</a>
            </div>
        </div>
    </div>
</x-app-layout>
