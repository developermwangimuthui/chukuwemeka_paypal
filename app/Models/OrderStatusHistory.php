<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UsesUUID;
use App\Models\Order;
class OrderStatusHistory extends Model
{   use SoftDeletes;
    // use UsesUUID;
    public function orders(){
        return  $this->hasMany(Order::class);
      }
}
