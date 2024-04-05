<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'bonus',
        'penalty_ps',
        'penalty_nps',
        'penalty_days_limit',
        'bonus_days_limit',
        'company_commission',
        'agent_commission',
        'subscriber_commission',
        'employee_commission',
        'enrollment_fees',
        'document_charges',
        'no_of_full_due_month',
        'tds_with_pan',
        'tds_without_pan',
        'gst',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

        /*** Get the user who created the policy. */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    /*** Get the user who last updated the policy. */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /*** Get the user who deleted by the policy. */
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
