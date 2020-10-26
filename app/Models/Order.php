<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UsesUUID;
use App\Models\Customer;
use App\Models\OrderStatusHistory;
class Order extends Model
{
    use SoftDeletes;
    use UsesUUID;

    public function customers(){
        return  $this->belongsTo(Customer::class);
      }
    public function orderstatushistory(){
        return  $this->hasMany(OrderStatusHistory::class);
      }
}
