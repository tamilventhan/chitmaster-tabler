<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'group_id',
        'ticket',
        'subscriber_id',
        'agent_id',
        'employee_id',
        'nominee',
        'relationship_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function relationship()
    {
        return $this->belongsTo(Relationship::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
