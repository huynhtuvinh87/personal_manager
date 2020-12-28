<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpendingMoney extends Model
{
    protected $table = 'spending_moneys';
    protected $fillable = ['user_id', 'title', 'day', 'month', 'year', 'date', 'price'];
}
