<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectMoney extends Model
{
    protected $fillable = ['user_id', 'title', 'day', 'month', 'year', 'date', 'price'];
}
