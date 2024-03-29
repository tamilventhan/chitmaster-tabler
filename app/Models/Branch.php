<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'active',
        'branch_id',
        'created_by',
        'updated_by',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    /*** Get the company associated with the branch. */
    public function company()
    {
        return $this->belongsTo(Company::class, 'branch_id');
    }

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
