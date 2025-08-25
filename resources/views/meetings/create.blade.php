<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Create Meeting</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto">
<form method="POST" action="{{ route('meetings.store') }}" class="bg-white p-6 shadow rounded space-y-4">
@csrf
<div>
    <label class="block">Subject</label>
    <input name="subject" class="w-full border rounded px-3 py-2" required />
</div>
<div>
    <label class="block">Description</label>
    <textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
</div>
<div>
    <label class="block">Date</label>
    <input type="date" name="date" class="w-full border rounded px-3 py-2" required />
</div>
<div>
    <label class="block">Organizer</label>
    <select name="organizer_id" class="w-full border rounded px-3 py-2">
        <option value="">-- Select --</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>
<div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create Meeting</button>
</div>
</form>
</div>
</x-app-layout>
