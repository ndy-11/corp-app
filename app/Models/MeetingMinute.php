<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingMinute extends Model
{
    use HasFactory;

    public $fillable = [
        'meeting_id',
        'content',
        'created_by',
    ];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function getContentAttribute($value)
    {
        return nl2br(e($value));
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = strip_tags($value, '<p><a><br><b><i><strong><em><ul><ol><li>');
    }
}
