<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\User;
use App\Http\Requests\MeetingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MeetingController extends Controller
{
    public function index(Request $req)
    {
        $q = Meeting::with('organizer:id,name');
        if ($req->from) $q->where('start_time', '>=', $req->from);
        if ($req->to) $q->where('end_time', '<=', $req->to);
        $meetings = $q->orderBy('start_time', 'desc')->paginate(10)->withQueryString();
        return view('meetings.index', compact('meetings'));
    }
    public function create()
    {
        $users = User::orderBy('name')->get(['id', 'name']);
        return view('meetings.create', compact('users'));
    }
    public function store(MeetingRequest $req)
    {
        DB::transaction(function () use ($req, &$meeting) {
            $data = $req->validated();
            $data['organizer_id'] = $req->user()->id;
            $meeting = Meeting::create($data);
            if ($req->participants) {
                $meeting->participants()->sync([]);
                $meeting->participants()->attach($req->participants, ['is_required' => true, 'response' => 'pending']);
            }
        });
        return redirect()->route('meetings.show', $meeting)->with('success', 'Meeting created');
    }
    public function show(Meeting $meeting)
    {
        $meeting->load('organizer:id,name', 'participants:id,name');
        return view('meetings.show', compact('meeting'));
    }
    public function edit(Meeting $meeting)
    {
        $users = User::orderBy('name')->get(['id', 'name']);
        $meeting->load('participants:id');
        return view('meetings.edit', compact('meeting', 'users'));
    }
    public function update(MeetingRequest $req, Meeting $meeting)
    {
        DB::transaction(function () use ($req, $meeting) {
            $meeting->update($req->validated());
            $meeting->participants()->sync($req->participants ?? []);
        });
        return redirect()->route('meetings.show', $meeting)->with('success', 'Meeting updated');
    }
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()->route('meetings.index')->with('success', 'Meeting deleted');
    }
}
