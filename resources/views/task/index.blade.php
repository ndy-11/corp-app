<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Tasks</h2></x-slot>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg p-4">
                    <div class="flex items-center justify-between mb-4">
                        <form method="GET" class="flex gap-2">
                            <input name="search" value="{{ request('search') }}" class="border rounded px-2 py-1" placeholder="Search title"/>
<select name="status" class="border rounded px-2 py-1">
<option value="">All Status</option>
@foreach(['todo','in_progress','review','done'] as $s)
<option value="{{ $s }}" @selected(request('status')==$s)>{{ ucfirst(str_replace('_',' ',$s)) }}</option>
@endforeach
</select>
<select name="priority" class="border rounded px-2 py-1">
<option value="">All Priority</option>
@foreach(['low','medium','high'] as $p)
<option value="{{ $p }}" @selected(request('priority')==$p)>{{ ucfirst($p) }}</option>
@endforeach
</select>
<button class="bg-blue-600 text-white px-3 py-1 rounded">Filter</button>
</form>
<a href="{{ route('tasks.create') }}" class="bg-green-600 text-white px-3 py-1 rounded">New Task</a>
</div>
<table class="table-auto w-full">
<thead><tr class="text-left">
<th class="py-2">Title</th><th>Assignee</th><th>Status</th><th>Priority</th><th>Due</th><th></th>
</tr></thead>
<tbody>
@foreach($tasks as $t)
<tr class="border-b">
<td class="py-2">{{ $t->title }}</td>
<td>{{ $t->assignee->name ?? '-' }}</td>
<td>{{ ucfirst(str_replace('_',' ',$t->status)) }}</td>
<td>{{ ucfirst($t->priority) }}</td>
<td>{{ $t->due_date ?? '-' }}</td>
<td>
<a class="text-blue-600" href="{{ route('tasks.show',$t) }}">View</a>
</td>
</tr>
@endforeach
</tbody>
</table>
<div class="mt-4">{{ $tasks->links() }}</div>
</div>
</div>
</div>
</x-app-layout>
