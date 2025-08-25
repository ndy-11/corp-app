<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Create Task</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto">
<form method="POST" action="{{ route('tasks.store') }}" class="bg-white p-6 shadow rounded space-y-4">
@csrf
<div>
<label class="block">Title</label>
<input name="title" class="w-full border rounded px-3 py-2" required />
</div>
<div>
<label class="block">Description</label>
<textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
</div>
<div class="grid grid-cols-3 gap-4">
    <div>
        <label class="block">Assignee</label>
        <select name="assignee_id" class="w-full border rounded px-3 py-2">
            <option value="">-- Select --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2">
            <option value="open">Open</option>
            <option value="in_progress">In Progress</option>
            <option value="resolved">Resolved</option>
            <option value="closed">Closed</option>
        </select>
    </div>
    <div>
        <label class="block">Priority</label>
        <select name="priority" class="w-full border rounded px-3 py-2">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
            <option value="critical">Critical</option>
        </select>
    </div>
</div>
<div>
    <label class="block">Due Date</label>
    <input type="date" name="due_date" class="w-full border rounded px-3 py-2" />
</div>
<div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create Task</button>
</div>
</form>
</div>
</x-app-layout>
