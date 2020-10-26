<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UsesUUID;
use App\User;
use App\Models\Order;

class Customer extends Model
{
    protected $fillable =['phone','gender','address','user_id'];
    use SoftDeletes;
    use UsesUUID;



    public function users(){
      return  $this->belongsTo(User::class);
    }

    public function orders(){
      return  $this->hasMany(Order::class);
    }
}
