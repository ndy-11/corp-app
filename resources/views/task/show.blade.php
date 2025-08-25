<x-app-layout>
<x-slot name="header"><h2 class="font-semibold text-xl">Task Detail</h2></x-slot>
<div class="py-6 max-w-3xl mx-auto">
    <div class="bg-white p-6 shadow rounded space-y-4">
        <div>
            <strong>Title:</strong> {{ $task->title }}
        </div>
        <div>
            <strong>Description:</strong> {{ $task->description }}
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <strong>Assignee:</strong> {{ $task->assignee->name ?? '-' }}
            </div>
            <div>
                <strong>Status:</strong> {{ ucfirst(str_replace('_',' ',$task->status)) }}
            </div>
            <div>
                <strong>Priority:</strong> {{ ucfirst($task->priority) }}
            </div>
            <div>
                <strong>Due Date:</strong> {{ $task->due_date ?? '-' }}
            </div>
        </div>
        <div class="flex gap-2 mt-4">
            <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
            <form method="POST" action="{{ route('tasks.destroy', $task) }}" onsubmit="return confirm('Delete this task?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Delete</button>
            </form>
            <a href="{{ route('tasks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
        </div>
    </div>
</div>
</x-app-layout>
