<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function account(){
        return $this->belongsTo(Account::class);
    }
}
