<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'enrollment_id',
        'date',
        'time',
        'bid_amount',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
