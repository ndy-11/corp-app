<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Meetings</h2></x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-4">
                <div class="flex items-center justify-between mb-4">
                    <form method="GET" class="flex gap-2">
                        <input name="search" value="{{ request('search') }}" class="border rounded px-2 py-1" placeholder="Search subject"/>
                        <button class="bg-blue-600 text-white px-3 py-1 rounded">Filter</button>
                    </form>
                    <a href="{{ route('meetings.create') }}" class="bg-green-600 text-white px-3 py-1 rounded">New Meeting</a>
                </div>
                <table class="table-auto w-full">
                    <thead>
                        <tr class="text-left">
                            <th class="py-2">Subject</th>
                            <th>Date</th>
                            <th>Organizer</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($meetings as $meeting)
                        <tr class="border-b">
                            <td class="py-2">{{ $meeting->subject }}</td>
                            <td>{{ $meeting->date }}</td>
                            <td>{{ $meeting->organizer->name ?? '-' }}</td>
                            <td>
                                <a class="text-blue-600" href="{{ route('meetings.show', $meeting) }}">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">{{ $meetings->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
