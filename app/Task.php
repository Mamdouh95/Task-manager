<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'priority', 'status', 'created_by'];
    const PRIORITIES_ARRAY = [self::HIGH_PRIORITY, self::HIGH_PRIORITY, self::LOW_PRIORITY];
    const HIGH_PRIORITY = 'high';
    const MEDIUM_PRIORITY = 'medium';
    const LOW_PRIORITY = 'low';
    const TODO = 'todo';
    const IN_PROGRESS = 'in-progress';
    const REVIEW = 'review';
    const DONE = 'done';
    // <-- Accessors and Mutators -->

    // <-- Scopes -->
    public function scopeTodos($query)
    {
        $query->where('status', Task::TODO);
    }
    public function scopeInProgress($query)
    {
        $query->where('status', Task::IN_PROGRESS);
    }
    public function scopeReview($query)
    {
        $query->where('status', Task::REVIEW);
    }
    public function scopeDone($query)
    {
        $query->where('status', Task::DONE);
    }

    // <-- Functions -->

    // <-- Relations -->
}
