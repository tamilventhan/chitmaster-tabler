<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    /*** Get the user who created the designation. */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /*** Get the user who last updated the designation. */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
