<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'currency_id',
        'balance',
        'currency'
    ];

    public function getId() {
        return $this->attributes['id'];
    }

    public function getBalance() {
        return $this->attributes['balance'];
    }

    public function getCurrency() {
        return $this->attributes['currency'];
    }
}
