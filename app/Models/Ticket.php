<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['requester_id', 'assignee_id', 'title', 'description', 'priority', 'status', 'sla_due'];
    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }
    public function comments()
    {
        return $this->hasMany(TicketComment::class);
    }
}
