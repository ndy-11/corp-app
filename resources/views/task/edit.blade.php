<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Edit Task</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto">
<form method="POST" action="{{ route('tasks.update', $task) }}" class="bg-white p-6 shadow rounded space-y-4">
@csrf
@method('PUT')
<div>
    <label class="block">Title</label>
    <input name="title" class="w-full border rounded px-3 py-2" required value="{{ old('title', $task->title) }}" />
</div>
<div>
    <label class="block">Description</label>
    <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $task->description) }}</textarea>
</div>
<div class="grid grid-cols-3 gap-4">
    <div>
        <label class="block">Assignee</label>
        <select name="assignee_id" class="w-full border rounded px-3 py-2">
            <option value="">-- Select --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" @selected(old('assignee_id', $task->assignee_id) == $user->id)>{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2">
            @foreach(['open','in_progress','resolved','closed'] as $s)
                <option value="{{ $s }}" @selected(old('status', $task->status) == $s)>{{ ucfirst(str_replace('_',' ',$s)) }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block">Priority</label>
        <select name="priority" class="w-full border rounded px-3 py-2">
            @foreach(['low','medium','high','critical'] as $p)
                <option value="{{ $p }}" @selected(old('priority', $task->priority) == $p)>{{ ucfirst($p) }}</option>
            @endforeach
        </select>
    </div>
</div>
<div>
    <label class="block">Due Date</label>
    <input type="date" name="due_date" class="w-full border rounded px-3 py-2" value="{{ old('due_date', $task->due_date) }}" />
</div>
<div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Task</button>
</div>
</form>
</div>
</x-app-layout>
