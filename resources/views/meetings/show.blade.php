<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Meeting Detail</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto">
    <div class="bg-white p-6 shadow rounded space-y-4">
        <div>
            <strong>Subject:</strong> {{ $meeting->subject }}
        </div>
        <div>
            <strong>Description:</strong> {{ $meeting->description }}
        </div>
        <div>
            <strong>Date:</strong> {{ $meeting->date }}
        </div>
        <div>
            <strong>Organizer:</strong> {{ $meeting->organizer->name ?? '-' }}
        </div>
        <div class="flex gap-2 mt-4">
            <a href="{{ route('meetings.edit', $meeting) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
            <form method="POST" action="{{ route('meetings.destroy', $meeting) }}" onsubmit="return confirm('Delete this meeting?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Delete</button>
            </form>
            <a href="{{ route('meetings.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
        </div>
    </div>
</div>
</x-app-layout>
