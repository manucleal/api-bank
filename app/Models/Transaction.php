<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id',
        'account_id_from',
        'account_id_to',
        'amount',
        'date',
        'description'
    ];
}
