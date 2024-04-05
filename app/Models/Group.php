<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'auction_date',
        'auction_time',
        'commencement',
        'termination',
        'scheme_id',
        'policy_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'auction_date' => 'date',
        'auction_time' => 'datetime',
        'commencement' => 'date',
        'termination' => 'date',
    ];

        public function scheme()
    {
        return $this->belongsTo(Scheme::class);
    }

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }

    /*** Get the user who created the group. */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    /*** Get the user who last updated the group. */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /*** Get the user who deleted by the group. */
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
