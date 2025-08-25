<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Edit Meeting</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto">
<form method="POST" action="{{ route('meetings.update', $meeting) }}" class="bg-white p-6 shadow rounded space-y-4">
@csrf
@method('PUT')
<div>
    <label class="block">Subject</label>
    <input name="subject" class="w-full border rounded px-3 py-2" required value="{{ old('subject', $meeting->subject) }}" />
</div>
<div>
    <label class="block">Description</label>
    <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $meeting->description) }}</textarea>
</div>
<div>
    <label class="block">Date</label>
    <input type="date" name="date" class="w-full border rounded px-3 py-2" required value="{{ old('date', $meeting->date) }}" />
</div>
<div>
    <label class="block">Organizer</label>
    <select name="organizer_id" class="w-full border rounded px-3 py-2">
        <option value="">-- Select --</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" @selected(old('organizer_id', $meeting->organizer_id) == $user->id)>{{ $user->name }}</option>
        @endforeach
    </select>
</div>
<div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Meeting</button>
</div>
</form>
</div>
</x-app-layout>
