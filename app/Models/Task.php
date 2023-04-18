<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{   
    use SoftDeletes; // Add SoftDeletes trait

    protected $dates = ['deleted_at']; // Add 'delete
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'due_date',
        'status_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tasks', 'task_id', 'user_id')
            ->withPivot('due_date', 'start_time', 'end_time', 'remarks', 'status_id')
            ->withTimestamps();
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
