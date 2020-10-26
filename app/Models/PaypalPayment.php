<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UsesUUID;
class PaypalPayment extends Model
{   use SoftDeletes;
    use UsesUUID;
    protected $table ='payments';
}
