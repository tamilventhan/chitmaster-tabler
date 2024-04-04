<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
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
        'email',
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
        'agent_id',                 //for Introducer mapping purpose
        'branch_id',                //to know subscriber's branch
        'created_by',               //to know who created the subscriber
        'updated_by',               //to know who updated the subscriber
    ];

        /*** Get the agent associated with the subscriber. */
        public function agent()
        {
            return $this->belongsTo(Agent::class);
        }

        /*** Get the branch associated with the subscriber. */
        public function branch()
        {
            return $this->belongsTo(Branch::class);
        }
        
        /*** Get the user who created the subscriber. */
        public function createdBy()
        {
            return $this->belongsTo(User::class, 'created_by');
        }
    
        /*** Get the user who last updated the subscriber. */
        public function updatedBy()
        {
            return $this->belongsTo(User::class, 'updated_by');
        }
}
