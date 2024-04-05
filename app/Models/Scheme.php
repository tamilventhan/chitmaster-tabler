<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'chit_value',
        'chit_month',
        'created_by',
        'updated_by',
    ];

    /*** Get the user who created the scheme. */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    /*** Get the user who last updated the scheme. */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /*** Get the user who deleted by the scheme. */
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
