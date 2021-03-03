<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Account;

class User extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];
    
    public function accounts() {
        return $this->hasMany(Account::class);
    }
}
