<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'title',                //Mr. or Mrs. or Miss
        'first_name',           //for name
        'last_name',            //for intial or last name
        'gender',
        'date_of_birth',
        'primary_mobile',
        'secondary_mobile',
        'aadhaar_number',
        'pan_number',
        'family_card',
        'spouse',
        'father',
        'mother',
        'nominee_name',
        'relation_with_nominee',
        'status',                   // active or inactive
        'employment_type',          //private or govt or self employed
        'organization',
        'designation',
        'monthly_income',
        'application_form',         //to upload application form
        'branch_id',                //to know subscriber's branch
        'created_by',               //to know who created the subscriber
        'updated_by',               //to know who updated the subscriber
    ];


        /*** Get the branch associated with the agent. */
        public function branch()
        {
            return $this->belongsTo(Branch::class);
        }

        /*** Get the user who created the agent. */
        public function createdBy()
        {
            return $this->belongsTo(User::class, 'created_by');
        }
    
        /*** Get the user who last updated the agent. */
        public function updatedBy()
        {
            return $this->belongsTo(User::class, 'updated_by');
        }
}
