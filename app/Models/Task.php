<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'description', 'assignee_id', 'status', 'priority', 'due_date'];
    // protected $table = 'tasks';
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }
    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }
}
