<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    /*** Get the user who created the relationship. */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    /*** Get the user who last updated the relationship. */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /*** Get the user who deleted by the relationship. */
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
